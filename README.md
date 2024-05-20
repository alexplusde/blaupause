# Blaupause - Dieses Repository kopieren, anpassen, AddOn-Entwicklung für REDAXO starten

Vorlage für REDAXO-Addons für einen schnelleren Start bei der Addon-Entwicklung.

1. <https://github.com/alexplusde/blaupause/archive/refs/heads/main.zip> ZIP der aktuellen Vorlage herunterladen oder direkt in GitHub ein Repo auf Basis von `alexplusde/blaupause` erstellen: <https://github.com/new/import> und dort `https://github.com/alexplusde/blaupause.git` angeben.
2. Mit "Suchen und Ersetzen" alles, was `blaupause` heißt, durch den Namen deines Addons ersetzen, z.B. `supi-dupi-kalender`, und speichern. Sowohl Dateinamen, als auch Dateiinhalte.
3. Alles löschen, was du aktuell nicht brauchst (oder für später auskommentiert lassen)

## Features

### `package.yml`

Bei Bedarf Abhängigkeiten von REDAXO-AddOns (sog. packages) eintragen, Backend-Seiten aus oder einblenden, vordefinierte Konfigurationswerte setzen.

### `boot.php`

Gängige Code-Beispiele wie der Syntax zum Überprüfen einer Addon-Installation, der Unterscheidung zwischen Front- und Backend, dem Registrieren eigener YForm-Dataset-Klasen.

### `install.php`

Gängige Code-Beispiele zum Installieren von YForm-Tablesets, Meta-Infofeldern und dem Verwenden von Extension Points, Cronjobs u.a.

### `rex_blaupause.tableset.json` und `pages/blaupause.table.php` für YForm im Addon

Dein Addon nutzt YForm als Ausgangsbasis? Importiere bei der Installation dein Tableset und nutze YForm-Tabellen innerhalb deiner Addon-Seiten.

### `update.php`

Gängige Code-Beispiele, die in Abhängigkeit der Vorgänger-Version deines Addons ausgeführt werden.

### `uninstall.php`

Alle Code-Beispiele, die du in der `install.php` nutzt, können hier wieder rückkgängig gemacht werden.

### `lib/blaupause.php`

Liefere passende YOrm Dataset-Methoden mit deinem Addon. Diese kannst du dir ganz einfach mithilfe von <https://github.com/alexplusde/ymca> erstellen lassen, wenn dein Tableset soweit fertig ist.

### `lang/`

Blaupause für deine eigenen Sprachdateien. Beginne die Addon-Entwicklung direkt so, dass weitere Sprachen ohne Anpassungen ergänzt werden können. Dazu kannst du in REDAXO an verschiedenen Stellen `rex_i18n::msg('blaupause_key')` nutzen oder `translate:blaupause_key` in YForm-Tabellen und Modulnamen.

### `pages/blaupause.settings.php`

Blaupause für die Einstellungsseite deines Addons. Passe die Einstellungsseite an deine Bedürfnisse an und nutze die REDAXO-Formularklassen `rex_config_form` und `rex_form`.

### `fragments/`

Blaupause für die Nutzung eigener Fragmente.

### `wildcard/`

In Arbeit: Definiere eigene Sprachkeys für das Addon [Wildcard](https://github.com/alexplusde/wildcard) oder Sprog und lasse diese automatisch installieren und updaten.

### Docs-Seite

Passe diese README.md-Datei an und spiele sie als Hilfe-Seite zu deinem Addon aus. Halte dich an die Struktur dieser README.md-Datei für deine eigenen Addons, indem du die wichtigsten Funktionen, Klassen und Methoden sowie den Installationsprozess und die Funktionsweise erklärst. Mit Verweis auf die Autoren, Projekt-Lead und Credits.

### Einstellungs-Seite

Beginne mit einem Konfigurations-Formular, das bereits best practice in REDAXO umsetzt - mit Links zu den wichtigsten API-Docs.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/blaupause/blob/master/LICENSE.md)  

## Autoren

**Alexander Walther**  
<http://www.alexplus.de>  
<https://github.com/alexplusde>  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits
