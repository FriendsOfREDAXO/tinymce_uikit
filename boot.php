<?php

use FriendsOfRedaxo\TinyMceUikit\Provider;

$addon = rex_addon::get('tinymce_uikit');

if (rex::isBackend() && $addon->getConfig('css_url')) {
    // Optional: Check if we need to update anything on boot
}

if (rex::isBackend() && rex::getUser()) {
    // Register extension point to update profile when settings are saved
    rex_extension::register('REX_FORM_SAVED', function (rex_extension_point $ep) {
        $form = $ep->getParam('form');
        if ($form instanceof rex_form && $form->getTableName() == 'tinymce_uikit_settings') {
            Provider::updateProfile();
            echo rex_view::success(rex_i18n::msg('tinymce_uikit_profile_updated'));
        }
    });
}
