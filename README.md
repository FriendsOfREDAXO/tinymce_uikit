# TinyMCE UIkit AddOn für REDAXO

Dieses AddOn erweitert den TinyMCE Editor um ein vorgefertigtes Profil für das [UIkit 3 Framework](https://getuikit.com/). Es stellt sicher, dass Inhalte im Editor korrekt mit UIkit-Styles dargestellt werden und bietet passende Formate für Überschriften, Texte, Listen und Blöcke an.

## Funktionen

*   **Automatisches Profil:** Erstellt bei der Installation automatisch ein TinyMCE-Profil namens `uikit`.
*   **CSS-Integration:** Bindet das UIkit CSS direkt in den Editor ein, sodass das Styling im Backend dem Frontend entspricht (WYSIWYG).
*   **Format-Vorlagen:** Bietet eine umfangreiche Liste an UIkit-Klassen im "Formate"-Dropdown des Editors (z.B. `uk-heading-primary`, `uk-text-lead`, `uk-list-divider`, `uk-alert-primary`).
*   **Dark Mode Support:** Unterstützt den REDAXO Dark Mode im Backend.
*   **Konfigurierbar:** Die URL zur UIkit CSS-Datei kann in den Einstellungen angepasst werden (z.B. für lokale Einbindung oder spezifische Versionen).

## Installation

1.  Laden Sie das AddOn herunter und entpacken Sie es in den Ordner `redaxo/src/addons/tinymce_uikit`.
2.  Melden Sie sich im REDAXO Backend an.
3.  Gehen Sie zu **Installieren & Aktualisieren**.
4.  Installieren und aktivieren Sie das AddOn `TinyMCE UIkit`.

Nach der Installation finden Sie im TinyMCE-Addon unter "Profile" einen neuen Eintrag `uikit`.

## Konfiguration

Unter **TinyMCE UIkit > Einstellungen** können Sie die URL zur UIkit CSS-Datei anpassen.

*   **Standard:** Verwendet das jsDelivr CDN (`https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css`).
*   **Lokal:** Sie können einen Pfad zu einer lokalen Datei angeben, z.B. `/assets/addons/project/css/uikit.min.css`.

Nach dem Speichern der Einstellungen wird das TinyMCE-Profil automatisch aktualisiert.

## Nutzung

1.  Weisen Sie das Profil `uikit` einem Textarea-Feld zu (z.B. in einem Modul oder via MForm).
    *   Beispiel Modul-Input:
        ```php
        <textarea class="form-control tiny-editor" data-profile="uikit" name="REX_INPUT_VALUE[1]">REX_VALUE[1]</textarea>
        ```
2.  Im Editor sehen Sie nun die UIkit-Styles.
3.  Über das Menü **Formate** können Sie UIkit-spezifische Klassen auf Ihre Inhalte anwenden.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](LICENSE.md) (falls vorhanden) oder `package.yml`.
