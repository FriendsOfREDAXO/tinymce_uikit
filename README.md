# TinyMCE UIkit

Dieses AddOn generiert ein TinyMCE-Profil, das speziell für die Verwendung mit dem **UIkit 3** Framework optimiert ist. Es ermöglicht Redakteuren, UIkit-Komponenten und Utility-Klassen direkt im WYSIWYG-Editor auszuwählen.

## Funktionen

- **Profil-Vererbung:** Erstellt ein neues Profil basierend auf einem existierenden Profil (z.B. `full` oder `default`). Alle Plugins und Toolbar-Einstellungen des Basis-Profils bleiben erhalten.
- **UIkit Stile:** Fügt dem Editor umfangreiche Formatvorlagen hinzu:
    - **Überschriften:** Primary, Hero, Divider, Bullet, Line
    - **Text:** Lead, Meta, Größen, Gewichtung, Transformation, Farben
    - **Listen:** Disc, Circle, Square, Decimal, Divider, Striped
    - **Buttons:** Default, Primary, Secondary, Danger, Text, Link (in verschiedenen Größen)
    - **Badges & Labels**
    - **Bilder:** Rounded, Circle, Shadows
    - **Hintergründe:** Muted, Primary, Secondary
    - **Tabellen:** Striped, Hover, Divider, Small
    - **Blöcke:** Alerts (Primary, Success, Warning, Danger), Cards
    - **Utility:** Floats, Display, Overflow
- **Editor-Optimierung:**
    - Lädt das UIkit CSS direkt in den Editor (konfigurierbar).
    - Verhindert störende Fokus-Rahmen (Outlines) von UIkit im Editor-Fenster.
    - Fügt automatisch den `styles`-Button zur Toolbar hinzu, falls dieser im Basis-Profil fehlt.

## Installation & Nutzung

1. AddOn installieren und aktivieren.
2. Im Backend unter **TinyMCE > UIkit** die Einstellungen aufrufen.
3. **Basis-Profil** wählen (z.B. `full`).
4. **Ziel-Profil Name** festlegen (Standard: `uikit`).
5. **UIkit CSS URL** prüfen (Standard ist CDN, kann auf lokale Datei geändert werden).
6. Speichern klicken.

Das AddOn generiert nun das Profil. Dieses kann anschließend in den Moduleinstellungen oder im TinyMCE-Feld ausgewählt werden.

> **Hinweis:** Wenn Änderungen am Basis-Profil vorgenommen werden, muss das UIkit-Profil hier erneut gespeichert werden, um die Änderungen zu übernehmen.

## Lizenz

MIT Lizenz, siehe [LICENSE](LICENSE)

## Credits

- [Thomas Skerbis](https://github.com/skerbis)
- [FriendsOfREDAXO](https://github.com/FriendsOfREDAXO)
