<?php

namespace Bauthor\Blaupause\Cronjob;

use rex_cronjob;
use rex_i18n;

/* Umbenennen, z.B. in Sync, Task */

class Task extends rex_cronjob
{
    public function execute()
    {
        /* Tu was */
        if (false) {
            $this->setMessage(rex_i18n::msg('blaupause_cronjob_task_error'));
            return false;
        }

        $this->setMessage(rex_i18n::msg('blaupause_cronjob_task_success'));
        return true;
    }

    public function getTypeName()
    {
        return rex_i18n::msg('blaupause_cronjob_task_name');
    }

    public function getParamFields()
    {
        $fields = [
            [
                'label' => rex_i18n::msg('blaupause_cronjob_task_field_label'),
                'name' => 'blaupause_field',
                'type' => 'link', // text, textarea, link, media, select, checkbox
                'notice' => rex_i18n::msg('blaupause_cronjob_task_field_notice'),
            ],
        ];

        return $fields;
    }
}
