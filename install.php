<?php

use FriendsOfRedaxo\TinyMceUikit\Provider;

$addon = rex_addon::get('tinymce_uikit');

// Set default config if not exists
if (!$addon->hasConfig('css_url')) {
    $addon->setConfig('css_url', 'https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css');
}

if (rex_addon::get('tinymce')->isAvailable()) {
    Provider::updateProfile();
}
