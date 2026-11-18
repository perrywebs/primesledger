<?php

namespace App\Support;

use DOMDocument;
use DOMNode;
use DOMText;

class EmailContent
{
    private const ALLOWED_ELEMENTS = [
        'a', 'b', 'blockquote', 'br', 'em', 'h1', 'h2', 'h3', 'i', 'li', 'ol', 'p', 'strong', 'u', 'ul',
    ];

    public static function sanitize(string $html): string
    {
        $document = new DOMDocument('1.0', 'UTF-8');
        $previousErrorSetting = libxml_use_internal_errors(true);
        $document->loadHTML(
            '<!doctype html><html><body><div id="email-content">' . $html . '</div></body></html>',
            LIBXML_HTML_NODEFDTD
        );
        libxml_clear_errors();
        libxml_use_internal_errors($previousErrorSetting);

        $root = $document->getElementById('email-content');

        if (!$root) {
            return '';
        }

        self::sanitizeChildren($root);

        $content = '';
        foreach ($root->childNodes as $child) {
            $content .= $document->saveHTML($child);
        }

        return $content;
    }

    public static function plainText(string $html): string
    {
        $html = preg_replace_callback(
            '/<a\b[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is',
            function (array $match): string {
                $label = trim(strip_tags($match[2]));
                $url = html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');

                return $label === $url ? $label : $label . ' (' . $url . ')';
            },
            $html
        );
        $html = preg_replace('/<\s*br\s*\/?>|<\/\s*(p|h[1-3]|li|blockquote)\s*>/i', "\n", $html);
        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return trim(preg_replace("/[ \t]+\n|\n{3,}/", "\n\n", $text));
    }

    private static function sanitizeChildren(DOMNode $parent): void
    {
        foreach (iterator_to_array($parent->childNodes) as $child) {
            if ($child instanceof DOMText) {
                continue;
            }

            if ($child->nodeType !== XML_ELEMENT_NODE) {
                $parent->removeChild($child);
                continue;
            }

            $element = strtolower($child->nodeName);

            if (!in_array($element, self::ALLOWED_ELEMENTS, true)) {
                if (in_array($element, ['script', 'style', 'iframe', 'object', 'svg'], true)) {
                    $parent->removeChild($child);
                    continue;
                }

                while ($child->firstChild) {
                    $parent->insertBefore($child->firstChild, $child);
                }
                $parent->removeChild($child);
                continue;
            }

            if ($element === 'a') {
                $href = trim($child->getAttribute('href'));
                if (self::isSafeLink($href)) {
                    $child->setAttribute('href', $href);
                } else {
                    $child->removeAttribute('href');
                }
            }

            foreach (iterator_to_array($child->attributes) as $attribute) {
                if ($element !== 'a' || $attribute->name !== 'href') {
                    $child->removeAttributeNode($attribute);
                }
            }

            self::sanitizeChildren($child);
        }
    }

    private static function isSafeLink(string $url): bool
    {
        if (str_starts_with($url, '/')) {
            return !str_starts_with($url, '//');
        }

        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        return in_array($scheme, ['http', 'https', 'mailto'], true);
    }
}
