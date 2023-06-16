<?php

// in der uninstall.php sollten Befehle ausgeführt werden, die alle Änderungen, die mit der Installation kamen, entfernen.

// Konfiguration entfernen
// rex_config::removeNamespace("blaupause");

// Installierte Metainfos entfernen
// rex_metainfo_delete_field('art_blaupause');
// rex_metainfo_delete_field('cat_blaupause');
// rex_metainfo_delete_field('med_blaupause');
// rex_metainfo_delete_field('clang_blaupause');

// Zusäzliche Verzeichnisse entfernen, z.B.
// rex_dir::delete(rex_path::get('blaupause'), true);

// YForm-Tabellen löschen (die YForm-Tabellendefinition wird gelöscht, nicht die Datenbank-Tabellen)
// if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
// rex_yform_manager_table_api::removeTable('rex_blaupause');
// }

// Weitere Vorgänge
// ...
