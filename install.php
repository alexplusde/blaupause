<?php

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

/*
$modules = scandir(rex_path::addon("blaupause")."module");

foreach ($modules as $module) {
    if ($module == "." || $module == "..") {
        continue;
    }
    $module_array = json_decode(rex_file::get(rex_path::addon("blaupause")."module/".$module), 1);

    rex_sql::factory()->setDebug(0)->setTable("rex_module")
    ->setValue("name", $module_array['name'])
    ->setValue("key", $module_array['key'])
    ->setValue("input", $module_array['input'])
    ->setValue("output", $module_array['output'])
    ->setValue("createuser", "")
    ->setValue("updateuser", "blaupause")
    ->setValue("createdate", date("Y-m-d H:i:s"))
    ->setValue("updatedate", date("Y-m-d H:i:s"))
    ->insertOrUpdate();
}
*/
