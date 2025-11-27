<?php

namespace FriendsOfRedaxo\TinyMceUikit;

use FriendsOfRedaxo\TinyMce\Utils\ProfileHelper;
use rex_addon;

class Provider
{
    public static function updateProfile(): void
    {
        $addon = rex_addon::get('tinymce_uikit');
        $cssUrl = $addon->getConfig('css_url');

        if (empty($cssUrl)) {
            $cssUrl = 'https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css';
        }

        // Expanded UIkit styles
        $styleFormats = [
            [
                'title' => 'Überschriften',
                'items' => [
                    ['title' => 'Heading Primary', 'block' => 'h1', 'classes' => 'uk-heading-primary'],
                    ['title' => 'Heading Hero', 'block' => 'h1', 'classes' => 'uk-heading-hero'],
                    ['title' => 'Heading Divider', 'block' => 'h2', 'classes' => 'uk-heading-divider'],
                    ['title' => 'Heading Bullet', 'block' => 'h3', 'classes' => 'uk-heading-bullet'],
                    ['title' => 'Heading Line', 'block' => 'h3', 'classes' => 'uk-heading-line'],
                ]
            ],
            [
                'title' => 'Text',
                'items' => [
                    ['title' => 'Lead Text', 'block' => 'p', 'classes' => 'uk-text-lead'],
                    ['title' => 'Meta Text', 'block' => 'p', 'classes' => 'uk-text-meta'],
                    ['title' => 'Drop Cap', 'block' => 'p', 'classes' => 'uk-dropcap'],
                    ['title' => 'Größe', 'items' => [
                        ['title' => 'Small', 'inline' => 'span', 'classes' => 'uk-text-small'],
                        ['title' => 'Default', 'inline' => 'span', 'classes' => 'uk-text-default'],
                        ['title' => 'Large', 'inline' => 'span', 'classes' => 'uk-text-large'],
                    ]],
                    ['title' => 'Stil', 'items' => [
                        ['title' => 'Bold', 'inline' => 'span', 'classes' => 'uk-text-bold'],
                        ['title' => 'Italic', 'inline' => 'span', 'classes' => 'uk-text-italic'],
                        ['title' => 'Light', 'inline' => 'span', 'classes' => 'uk-text-light'],
                        ['title' => 'Normal', 'inline' => 'span', 'classes' => 'uk-text-normal'],
                        ['title' => 'Lighter', 'inline' => 'span', 'classes' => 'uk-text-lighter'],
                        ['title' => 'Bolder', 'inline' => 'span', 'classes' => 'uk-text-bolder'],
                    ]],
                    ['title' => 'Transformation', 'items' => [
                        ['title' => 'Capitalize', 'inline' => 'span', 'classes' => 'uk-text-capitalize'],
                        ['title' => 'Uppercase', 'inline' => 'span', 'classes' => 'uk-text-uppercase'],
                        ['title' => 'Lowercase', 'inline' => 'span', 'classes' => 'uk-text-lowercase'],
                    ]],
                    ['title' => 'Farbe', 'items' => [
                        ['title' => 'Muted', 'inline' => 'span', 'classes' => 'uk-text-muted'],
                        ['title' => 'Emphasis', 'inline' => 'span', 'classes' => 'uk-text-emphasis'],
                        ['title' => 'Primary', 'inline' => 'span', 'classes' => 'uk-text-primary'],
                        ['title' => 'Secondary', 'inline' => 'span', 'classes' => 'uk-text-secondary'],
                        ['title' => 'Success', 'inline' => 'span', 'classes' => 'uk-text-success'],
                        ['title' => 'Warning', 'inline' => 'span', 'classes' => 'uk-text-warning'],
                        ['title' => 'Danger', 'inline' => 'span', 'classes' => 'uk-text-danger'],
                        ['title' => 'Background', 'inline' => 'span', 'classes' => 'uk-text-background'],
                    ]],
                    ['title' => 'Ausrichtung', 'items' => [
                        ['title' => 'Left', 'block' => 'div', 'classes' => 'uk-text-left'],
                        ['title' => 'Center', 'block' => 'div', 'classes' => 'uk-text-center'],
                        ['title' => 'Right', 'block' => 'div', 'classes' => 'uk-text-right'],
                        ['title' => 'Justify', 'block' => 'div', 'classes' => 'uk-text-justify'],
                    ]],
                    ['title' => 'Umbruch', 'items' => [
                        ['title' => 'Truncate', 'block' => 'div', 'classes' => 'uk-text-truncate'],
                        ['title' => 'Break', 'block' => 'div', 'classes' => 'uk-text-break'],
                        ['title' => 'No Wrap', 'block' => 'div', 'classes' => 'uk-text-nowrap'],
                    ]],
                ]
            ],
            [
                'title' => 'Utility',
                'items' => [
                    ['title' => 'Float Left', 'block' => 'div', 'classes' => 'uk-float-left'],
                    ['title' => 'Float Right', 'block' => 'div', 'classes' => 'uk-float-right'],
                    ['title' => 'Clearfix', 'block' => 'div', 'classes' => 'uk-clearfix'],
                    ['title' => 'Display Block', 'block' => 'div', 'classes' => 'uk-display-block'],
                    ['title' => 'Display Inline', 'inline' => 'span', 'classes' => 'uk-display-inline'],
                    ['title' => 'Display Inline-Block', 'block' => 'div', 'classes' => 'uk-display-inline-block'],
                    ['title' => 'Overflow Hidden', 'block' => 'div', 'classes' => 'uk-overflow-hidden'],
                    ['title' => 'Overflow Auto', 'block' => 'div', 'classes' => 'uk-overflow-auto'],
                ]
            ],
            [
                'title' => 'Listen',
                'items' => [
                    ['title' => 'Liste (Disc)', 'selector' => 'ul', 'classes' => 'uk-list uk-list-disc'],
                    ['title' => 'Liste (Circle)', 'selector' => 'ul', 'classes' => 'uk-list uk-list-circle'],
                    ['title' => 'Liste (Square)', 'selector' => 'ul', 'classes' => 'uk-list uk-list-square'],
                    ['title' => 'Liste (Decimal)', 'selector' => 'ol', 'classes' => 'uk-list uk-list-decimal'],
                    ['title' => 'Liste (Divider)', 'selector' => 'ul,ol', 'classes' => 'uk-list uk-list-divider'],
                    ['title' => 'Liste (Striped)', 'selector' => 'ul,ol', 'classes' => 'uk-list uk-list-striped'],
                ]
            ],
            [
                'title' => 'Buttons',
                'items' => [
                    ['title' => 'Button Default', 'inline' => 'a', 'classes' => 'uk-button uk-button-default'],
                    ['title' => 'Button Primary', 'inline' => 'a', 'classes' => 'uk-button uk-button-primary'],
                    ['title' => 'Button Secondary', 'inline' => 'a', 'classes' => 'uk-button uk-button-secondary'],
                    ['title' => 'Button Danger', 'inline' => 'a', 'classes' => 'uk-button uk-button-danger'],
                    ['title' => 'Button Text', 'inline' => 'a', 'classes' => 'uk-button uk-button-text'],
                    ['title' => 'Button Link', 'inline' => 'a', 'classes' => 'uk-button uk-button-link'],
                    ['title' => 'Button Small', 'inline' => 'a', 'classes' => 'uk-button uk-button-small'],
                    ['title' => 'Button Large', 'inline' => 'a', 'classes' => 'uk-button uk-button-large'],
                ]
            ],
            [
                'title' => 'Badges & Labels',
                'items' => [
                    ['title' => 'Badge', 'inline' => 'span', 'classes' => 'uk-badge'],
                    ['title' => 'Label', 'inline' => 'span', 'classes' => 'uk-label'],
                    ['title' => 'Label Success', 'inline' => 'span', 'classes' => 'uk-label uk-label-success'],
                    ['title' => 'Label Warning', 'inline' => 'span', 'classes' => 'uk-label uk-label-warning'],
                    ['title' => 'Label Danger', 'inline' => 'span', 'classes' => 'uk-label uk-label-danger'],
                ]
            ],
            [
                'title' => 'Images',
                'items' => [
                    ['title' => 'Rounded', 'selector' => 'img', 'classes' => 'uk-border-rounded'],
                    ['title' => 'Circle', 'selector' => 'img', 'classes' => 'uk-border-circle'],
                    ['title' => 'Shadow Small', 'selector' => 'img', 'classes' => 'uk-box-shadow-small'],
                    ['title' => 'Shadow Medium', 'selector' => 'img', 'classes' => 'uk-box-shadow-medium'],
                    ['title' => 'Shadow Large', 'selector' => 'img', 'classes' => 'uk-box-shadow-large'],
                    ['title' => 'Shadow Hover', 'selector' => 'img', 'classes' => 'uk-box-shadow-hover-medium'],
                ]
            ],
            [
                'title' => 'Backgrounds',
                'items' => [
                    ['title' => 'Muted', 'block' => 'div', 'classes' => 'uk-background-muted uk-padding'],
                    ['title' => 'Primary', 'block' => 'div', 'classes' => 'uk-background-primary uk-light uk-padding'],
                    ['title' => 'Secondary', 'block' => 'div', 'classes' => 'uk-background-secondary uk-light uk-padding'],
                ]
            ],
            [
                'title' => 'Tables',
                'items' => [
                    ['title' => 'Striped', 'selector' => 'table', 'classes' => 'uk-table uk-table-striped'],
                    ['title' => 'Hover', 'selector' => 'table', 'classes' => 'uk-table uk-table-hover'],
                    ['title' => 'Divider', 'selector' => 'table', 'classes' => 'uk-table uk-table-divider'],
                    ['title' => 'Small', 'selector' => 'table', 'classes' => 'uk-table uk-table-small'],
                ]
            ],
            [
                'title' => 'Blöcke',
                'items' => [
                    ['title' => 'Alert (Primary)', 'block' => 'div', 'classes' => 'uk-alert-primary', 'attributes' => ['uk-alert' => '']],
                    ['title' => 'Alert (Success)', 'block' => 'div', 'classes' => 'uk-alert-success', 'attributes' => ['uk-alert' => '']],
                    ['title' => 'Alert (Warning)', 'block' => 'div', 'classes' => 'uk-alert-warning', 'attributes' => ['uk-alert' => '']],
                    ['title' => 'Alert (Danger)', 'block' => 'div', 'classes' => 'uk-alert-danger', 'attributes' => ['uk-alert' => '']],
                    ['title' => 'Card (Default)', 'block' => 'div', 'classes' => 'uk-card uk-card-default uk-card-body'],
                    ['title' => 'Card (Primary)', 'block' => 'div', 'classes' => 'uk-card uk-card-primary uk-card-body'],
                    ['title' => 'Card (Secondary)', 'block' => 'div', 'classes' => 'uk-card uk-card-secondary uk-card-body'],
                ]
            ]
        ];

        // Get base profile
        $baseProfileName = $addon->getConfig('base_profile', 'full');
        $baseProfile = \rex_sql::factory()->getArray('SELECT * FROM ' . \rex::getTable('tinymce_profiles') . ' WHERE name = :name', ['name' => $baseProfileName]);
        
        if (empty($baseProfile)) {
            // Fallback if selected profile doesn't exist
            $baseProfile = [['extra' => '', 'toolbar' => '', 'plugins' => '']];
        }
        $baseData = $baseProfile[0];

        // Build the extra configuration string
        $extra = [];
        
        // Start with base profile extra
        if (!empty($baseData['extra'])) {
            $extra[] = trim($baseData['extra']);
        }

        // Prepare Toolbar and Plugins
        $toolbar = (string) ($baseData['toolbar'] ?? '');
        $plugins = (string) ($baseData['plugins'] ?? '');
        $baseExtra = (string) ($baseData['extra'] ?? '');

        // Fallback: Extract from extra if columns are empty (e.g. default profiles from install.php)
        if (empty($toolbar) && !empty($baseExtra)) {
            if (preg_match('/(?:["\']?)toolbar(?:["\']?)\s*:\s*(["\'])(.*?)\1/s', $baseExtra, $matches)) {
                $toolbar = $matches[2];
            }
        }
        if (empty($plugins) && !empty($baseExtra)) {
            if (preg_match('/(?:["\']?)plugins(?:["\']?)\s*:\s*(["\'])(.*?)\1/s', $baseExtra, $matches)) {
                $plugins = $matches[2];
            }
        }

        // Ensure "styles" button is in toolbar
        if (strpos($toolbar, 'styles') === false) {
            $toolbar = 'styles ' . $toolbar;
        }

        // Append overrides to extra
        // We add these to the END of the extra string to override any previous definitions
        
        $extra[] = 'content_css: [' . json_encode($cssUrl) . ', redaxo.theme.current === "dark" ? "dark" : "default"]';
        
        // Prevent UIkit or browser focus outlines in editor
        $extra[] = 'content_style: "body { outline: none !important; box-shadow: none !important; } :focus { outline: none !important; box-shadow: none !important; }"';
        
        $extra[] = 'style_formats: ' . json_encode($styleFormats);
        
        // Explicitly override toolbar and plugins in extra to ensure our modified version is used
        // (in case the base profile defined them in extra, which would take precedence over columns)
        $extra[] = 'toolbar: ' . json_encode($toolbar);
        $extra[] = 'plugins: ' . json_encode($plugins);

        $profileData = [
            'extra' => implode(",\n", $extra),
            'toolbar' => $toolbar,
            'plugins' => $plugins,
        ];

        $targetProfileName = $addon->getConfig('target_profile', 'uikit');
        if (empty($targetProfileName)) {
            $targetProfileName = 'uikit';
        }

        if (class_exists(ProfileHelper::class)) {
            ProfileHelper::ensureProfile($targetProfileName, 'UIkit 3 Profile (based on ' . $baseProfileName . ')', $profileData, true);
        }
    }
}
