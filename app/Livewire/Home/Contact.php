<?php

namespace App\Livewire\Home;

use App\Mail\AppMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public string $name = '';

    public string $email = '';

    public string $topic = 'General question';

    public string $message = '';

    public bool $sent = false;

    /**
     * Clear the success state as soon as the visitor starts a new message.
     */
    public function updated(string $property): void
    {
        if ($this->sent && in_array($property, ['name', 'email', 'topic', 'message'], true)) {
            $this->sent = false;
        }
    }

    public function send(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'min:2', 'max:80'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'topic' => ['required', 'string', 'max:60'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'name.required' => 'Please tell us your name.',
            'name.min' => 'Please use at least two characters for your name.',
            'email.required' => 'Please add an email address so we can reply.',
            'email.email' => 'Please check the email address format.',
            'message.required' => 'Please write a short message.',
            'message.min' => 'Please add a little more detail (at least 10 characters).',
            'message.max' => 'Please keep the message under 2,000 characters.',
        ]);

        $body = [
            'name' => $validated['name'],
            'title' => 'New contact enquiry',
            'message' => 'Reply to: ' . e($validated['name']) . ' &lt;' . e($validated['email']) . '&gt;<br>'
                . 'Topic: ' . e($validated['topic']) . '<br><br>'
                . nl2br(e($validated['message'])),
        ];

        try {
            Mail::to(config('app.Admin_email'))
                ->send((new AppMail('Contact enquiry: ' . $validated['topic'], $body))
                    ->replyTo($validated['email'], $validated['name']));
        } catch (\Throwable $exception) {
            $this->addError('send', 'Your message could not be sent right now. Please email '
                . config('app.Admin_email') . ' directly.');

            return;
        }

        $this->reset(['name', 'email', 'message']);
        $this->topic = 'General question';
        $this->resetValidation();
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.home.contact');
    }
}
