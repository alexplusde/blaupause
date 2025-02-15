<?php

namespace Alexplusde\Blaupause;

use rex_csrf_token;
use rex_extension_point;
use rex_url;
use rex_yform_manager_collection;
use rex_yform_manager_dataset;

class Entry extends rex_yform_manager_dataset
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_DRAFT = 0;
    public const STATUS_INACTIVE = -1;

    // https://github.com/yakamara/redaxo_yform/blob/master/docs/04_yorm.md#yorm-mit-eigener-model-class-verwenden
    // Lasse dir die Klasse anhand deines Tablesets selbst bauen: https://github.com/alexplusde/ymca
    // Nachfolgend ein Beispiel, um eigene Methoden zu erstellen
    public function getName(): string
    {
        return $this->getValue('name');
    }

    public static function epYformDataList(rex_extension_point $ep)
    {
        /** @var rex_yform_manager_table $table */
        $table = $ep->getParam('table');
        if ($table->getTableName() !== self::table()->getTableName()) {
            return;
        }

        /** @var rex_yform_list $list */
        $list = $ep->getSubject();

        $list->setColumnFormat(
            'name',
            'custom',
            static function ($a) {
                $_csrf_key = self::table()->getCSRFKey();
                $token = rex_csrf_token::factory($_csrf_key)->getUrlParams();

                $params = [];
                $params['table_name'] = self::table()->getTableName();
                $params['rex_yform_manager_popup'] = '0';
                $params['_csrf_token'] = $token['_csrf_token'];
                $params['data_id'] = $a['list']->getValue('id');
                $params['func'] = 'edit';

                return '<a href="' . rex_url::backendPage('neues/entry', $params) . '">' . $a['value'] . '</a>';
            },
        );
        $list->setColumnFormat(
            'id',
            'custom',
            static function ($a) {
                return $a['value'];
            },
        );
    }

    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_ACTIVE => 'Aktiv',
            self::STATUS_DRAFT => 'Entwurf',
            self::STATUS_INACTIVE => 'Inaktiv',
        ];
    }

    public static function findOnline(): rex_yform_manager_collection
    {
        return self::query()->where('status', self::STATUS_ACTIVE)->find();
    }
}
