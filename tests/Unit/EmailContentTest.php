<?php

namespace Tests\Unit;

use App\Mail\AdminEmail;
use App\Mail\AppMail;
use App\Support\EmailContent;
use Tests\TestCase;

class EmailContentTest extends TestCase
{
    public function test_email_content_keeps_formatting_and_removes_unsafe_markup(): void
    {
        $safe = EmailContent::sanitize(
            '<p onclick="run()">Hello <strong>there</strong> <a href="javascript:alert(1)" style="color:red">link</a></p><script>alert(1)</script>'
        );

        $this->assertStringContainsString('<strong>there</strong>', $safe);
        $this->assertStringContainsString('>link</a>', $safe);
        $this->assertStringNotContainsString('onclick', $safe);
        $this->assertStringNotContainsString('javascript:', $safe);
        $this->assertStringNotContainsString('<script', $safe);
        $this->assertStringNotContainsString('style=', $safe);
    }

    public function test_admin_email_uses_branded_html_and_plain_text_content(): void
    {
        $mail = new AdminEmail(
            'Important update',
            '<p>Review <strong>your account</strong>.</p>',
            'A new update'
        );

        $html = $mail->render();
        $plainText = EmailContent::plainText($mail->safeMessage);

        $this->assertStringContainsString('Important update', $html);
        $this->assertStringContainsString(config('email_branding.logo_url'), $html);
        $this->assertStringContainsString('Review your account.', $plainText);
        $this->assertSame('A new update', $mail->subject);

        config(['email_branding.social' => ['LinkedIn' => 'https://social.example.test/company']]);
        $brandedHtml = $mail->render();
        $this->assertStringContainsString('href="https://social.example.test/company"', $brandedHtml);
        $this->assertStringContainsString('>in</span>', $brandedHtml);
        $plainText = view('mail.admin_email_text', [
            'heading' => $mail->heading,
            'safeMessage' => $mail->safeMessage,
        ])->render();
        $this->assertStringContainsString('LinkedIn: https://social.example.test/company', $plainText);
    }

    public function test_existing_app_mail_uses_the_shared_brand_and_plain_text_fallback(): void
    {
        $mail = new AppMail('Password Reset Notification', [
            'name' => 'Avery User',
            'title' => 'Password Reset Notification',
            'message' => 'Reset your password <br><a href="https://example.test/reset">here</a>',
        ]);

        $html = $mail->render();

        $this->assertStringContainsString(config('email_branding.logo_url'), $html);
        $this->assertStringContainsString('Avery User', $html);
        $this->assertStringContainsString('https://example.test/reset', $html);
        $this->assertStringContainsString('Password Reset Notification', $mail->subject);

        $plainText = view('mail.app_mail_text', ['body' => $mail->body])->render();
        $this->assertStringContainsString('https://example.test/reset', $plainText);
        $this->assertStringNotContainsString('<a ', $plainText);
    }

}
