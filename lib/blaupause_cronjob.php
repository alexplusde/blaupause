<?php

class rex_cronjob_blaupause extends rex_cronjob
{
    public function execute()
    {
        /* Tu was */
        if (false) {
            $this->setMessage('Fehlermeldung');
            return false;
        }

        $this->setMessage('Erfolgsmeldung');
        return true;
    }

    public function getTypeName()
    {
        return 'Blaupause Beispiel-Cronjob';
    }

    public function getParamFields()
    {
        $fields = [
            [
                'label' => 'Beispiel-Feld',
                'name' => 'blaupause_field',
                'type' => 'link', // text, textarea, link, media, select, checkbox
                'notice' => 'Notizfeld',
            ],
        ];

        return $fields;
    }
}
