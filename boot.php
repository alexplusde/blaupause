<?php

namespace Bauthor\Blaupause;

use rex;
use rex_addon;
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

// Prüfen, ob ein anderes Addon installiert ist, bspw. Cronjob-Addon
/*
if (rex_addon::get('cronjob')->isAvailable() && !rex::isSafeMode()) {
    rex_cronjob_manager::registerType('rex_cronjob_blaupause');
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
if(rex::isBackend()) {
    $addon = rex_addon::get('blaupause');
    $pages = $addon->getProperty('pages');

    $_csrf_key = rex_yform_manager_table::get('rex_blaupause')->getCSRFKey();
    $token = rex_csrf_token::factory($_csrf_key)->getUrlParams();

    $params = array();
    $params['table_name'] = 'rex_blaupause';
    $params['rex_yform_manager_popup'] = '0';
    $params['_csrf_token'] = $token['_csrf_token'];
    $params['func'] = 'add';

    $pages['blaupause']['title'] .= ' <a style="position: absolute; top: 0; right: 0; padding: 5px; margin: 8px 19px 8px 8px" href="'.rex_url::backendPage('blaupause/table', $params) .'" class="label label-default pull-right">+</a>';
    $addon->setProperty('pages', $pages);
}
    */
