<?php

namespace Bauthor\Blaupause;

use rex;
use rex_addon;
use rex_config;
use rex_cronjob_manager;
use rex_csrf_token;
use rex_extension;
use rex_extension_point;
use rex_url;
use rex_view;
use rex_yform_manager_dataset;
use rex_yform_manager_table;

// Die boot.php wird bei jedem Seitenaufruf im Frontend und Backend aufgeführt, je nach Reihenfolge von Abhängigkeiten in der package.yml vor oder nach anderen Addons.

// Beispiel YOrm Model-Klasse registrieren, wenn das Addon mit einer eigenen YForm Tabelle kommt.
/*
if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_blaupause',
        Blaupause::class
    );
}
*/

/* Nutzt du T-Racks? <https://github.com/alexplusde/tracks> Module und Addons bei der Entwicklung synchroinsieren */
/*
if (rex::isBackend() && rex::isDebugMode() && rex_config::get('blaupause', 'dev')) {
    \Tracks\🦖::writeModule('blaupause', 'blaupause.%');
    \Tracks\🦖::writeTemplate('blaupause', 'blaupause.%');
}
*/

// Prüfen, ob ein anderes Addon installiert ist, bspw. Cronjob-Addon
/*
if (rex_addon::get('cronjob')->isAvailable() && !rex::isSafeMode()) {
    rex_cronjob_manager::registerType(Cronjob\Blaupause::class);
}
*/

// API-Route registrieren, wenn das Addon mit einer eigenen API kommt.
/*
if (rex_plugin::get('yform', 'rest')->isAvailable() && !rex::isSafeMode()) {
    Api\Restful::init();
}
*/

// Beim Extension Point REX_YFORM_SAVED etwas ausführen
/*
rex_extension::register('REX_YFORM_SAVED', function (rex_extension_point $ep) {
    // Mein Code, oder meine Funktion / statische Methode aufrufen
});
*/

// CSS und JS im Backend laden, wenn eingeloggt.
/*
if (rex::isBackend() && rex::getUser()) {
    rex_view::addCssFile($this->getAssetsUrl('backend.css'));
    rex_view::addJsFile($this->getAssetsUrl('backend.js'));
}
*/

// YForm-Tabelle? `+`-Button im Hauptmenü hinzufügen
/*

if (rex::isBackend() && \rex_addon::get('blaupause') && \rex_addon::get('blaupause')->isAvailable() && !rex::isSafeMode()) {
    $addon = rex_addon::get('blaupause');
    $pages = $addon->getProperty('pages');
    // oder $page = $addon->getProperty('page');

    if (rex::isBackend() && !empty($_REQUEST)) {
        $_csrf_key = rex_yform_manager_table::get('rex_blaupause')->getCSRFKey();

        $token = rex_csrf_token::factory($_csrf_key)->getUrlParams();

        $params = [];
        $params['table_name'] = 'rex_blaupause'; // Tabellenname anpassen
        $params['rex_yform_manager_popup'] = '0';
        $params['_csrf_token'] = $token['_csrf_token'];
        $params['func'] = 'add';

        $href = rex_url::backendPage('blaupause/entry', $params);

        $pages['blaupause']['title'] .= ' <a class="label label-primary tex-primary" style="position: absolute; right: 18px; top: 10px; padding: 0.2em 0.6em 0.3em; border-radius: 3px; color: white; display: inline; width: auto;" href="' . $href . '">+</a>';
        $addon->setProperty('pages', $pages);
        // oder $page['title'] .= ' <a class="label label-primary tex-primary" style="position: absolute; right: 18px; top: 10px; padding: 0.2em 0.6em 0.3em; border-radius: 3px; color: white; display: inline; width: auto;" href="' . $href . '">+</a>';
        // oder $addon->setProperty('page', $page);
    }
}
*/
