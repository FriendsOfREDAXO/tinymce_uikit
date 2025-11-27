<?php

/** @var rex_addon $this */

$addon = rex_addon::get('tinymce_uikit');

$content = '';
$func = rex_request('func', 'string');

if ($func == 'update') {
    $addon->setConfig('css_url', rex_request('css_url', 'string'));
    $addon->setConfig('base_profile', rex_request('base_profile', 'string'));
    $addon->setConfig('target_profile', rex_request('target_profile', 'string'));
    \FriendsOfRedaxo\TinyMceUikit\Provider::updateProfile();
    echo rex_view::success($addon->i18n('config_saved') . ' ' . $addon->i18n('profile_updated'));
}

$cssUrl = $addon->getConfig('css_url');
$baseProfile = $addon->getConfig('base_profile', 'full');
$targetProfile = $addon->getConfig('target_profile', 'uikit');

// Profile Selection
$profiles = \rex_sql::factory()->getArray('SELECT name, description FROM ' . \rex::getTable('tinymce_profiles') . ' ORDER BY name');
$profileOptions = [];
foreach ($profiles as $profile) {
    $selected = ($profile['name'] == $baseProfile) ? ' selected="selected"' : '';
    $profileOptions[] = '<option value="' . htmlspecialchars($profile['name']) . '"' . $selected . '>' . htmlspecialchars($profile['name']) . ' (' . htmlspecialchars($profile['description']) . ')</option>';
}

$content .= '<div class="form-group">';
$content .= '<label for="tinymce-uikit-base-profile">Basis-Profil</label>';
$content .= '<select class="form-control" id="tinymce-uikit-base-profile" name="base_profile">';
$content .= implode('', $profileOptions);
$content .= '</select>';
$content .= '<p class="help-block">Wählen Sie ein bestehendes Profil als Grundlage für das UIkit-Profil.</p>';
$content .= '</div>';

$content .= '<div class="form-group">';
$content .= '<label for="tinymce-uikit-target-profile">Ziel-Profil Name</label>';
$content .= '<input type="text" class="form-control" id="tinymce-uikit-target-profile" name="target_profile" value="' . htmlspecialchars($targetProfile) . '">';
$content .= '<p class="help-block">Name des neu zu erstellenden Profils (z.B. <code>uikit_full</code>). Existierende Profile mit diesem Namen werden überschrieben.</p>';
$content .= '</div>';

$content .= '<div class="form-group">';
$content .= '<label for="tinymce-uikit-css-url">' . $addon->i18n('css_url') . '</label>';
$content .= '<input type="text" class="form-control" id="tinymce-uikit-css-url" name="css_url" value="' . htmlspecialchars($cssUrl) . '">';
$content .= '<p class="help-block">' . $addon->i18n('css_url_notice') . '</p>';
$content .= '</div>';

$formElements = [];
$n = [];
$n['field'] = '<button class="btn btn-save rex-form-aligned" type="submit" name="save" value="1">' . rex_i18n::msg('save') . '</button>';
$formElements[] = $n;

$fragment = new rex_fragment();
$fragment->setVar('elements', $formElements, false);
$buttons = $fragment->parse('core/form/submit.php');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('settings'));
$fragment->setVar('body', $content, false);
$fragment->setVar('buttons', $buttons, false);

echo '<form action="' . rex_url::currentBackendPage(['func' => 'update']) . '" method="post">';
echo $fragment->parse('core/page/section.php');
echo '</form>';
