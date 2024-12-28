<?php

use rex_addon;
use rex_article;
use rex_config;
use rex_file;
use rex_sql;
use rex_yform_manager_table;
use rex_yform_manager_table_api;
use Tracks\🦖;

/* Tablesets aktualisieren */
$addon = rex_addon::get('blaupause');

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(__DIR__ . '/install/rex_blaupause.tableset.json'));
    rex_yform_manager_table::deleteCache();
}

/* URL-Profile installieren */
if (rex_addon::get('url') && rex_addon::get('url')->isAvailable()) {
    if (false === rex_config::get('blaupause', 'url_profile', false)) {
        $rex_blaupause_category = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_blaupause_category'"));
        if (!$rex_blaupause_category) {
            $query = str_replace('999999', rex_article::getSiteStartArticleId(), rex_file::get(__DIR__ . '/install/rex_url_profile_blaupause_category.sql'));
            rex_sql::factory()->setQuery($query);
        }
        $rex_blaupause_entry = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_blaupause_entry'"));
        if (!$rex_blaupause_entry) {
            $query = str_replace('999999', rex_article::getSiteStartArticleId(), rex_file::get(__DIR__ . '/install/rex_url_profile_blaupause_entry.sql'));
            rex_sql::factory()->setQuery($query);
        }
        /* URL-Profile wurden bereits einmal installiert, daher nicht nochmals installieren und Entwickler-Einstellungen respektieren */
        rex_config::set('blaupause', 'url_profile', true);
    }
}

/* Todo: Wildcard aktualisieren */

/* Nutzt du T-Racks? <https://github.com/alexplusde/tracks> Module und Addons mit installieren */

if (rex_addon::exists('tracks')) {
    🦖::forceBackup('school'); // Sichert standardmäßig Module und Templates
    🦖::updateModule('school'); // Synchronisiert Module
    🦖::updateTemplate('school'); // Synchronisiert Templates
}

rex_delete_cache();
