<?php

/* Nutze das Addon YMCA, um die Model-Klasse zu generieren */

namespace Bauthor\Blaupause\Api;

use Bauthor\Blaupause\Blaupause;
use rex_yform_rest;
use rex_yform_rest_route;

class Restful
{
    public static function init(): void
    {
        $rex_blaupause_route = new rex_yform_rest_route(
            [
                'path' => '/blaupause/thing/1.0.0/',
                'auth' => '\rex_yform_rest_auth_token::checkToken',
                'type' => Blaupause::class,
                'query' => Blaupause::query(),
                'get' => [
                    'fields' => [
                        'rex_blaupause' => [
                            'id',
                            'status',
                            'name',
                            'createdate',
                            'createuser',
                            'updatedate',
                            'updateuser',
                            'uuid',
                        ],
                    ],
                ],
                'post' => [
                    'fields' => [
                        'rex_blaupause' => [
                            'status',
                            'name',
                            'createdate',
                            'createuser',
                            'updatedate',
                            'updateuser',
                            'uuid',
                        ],
                    ],
                ],
                'delete' => [
                    'fields' => [
                        'rex_blaupause' => [
                            'id',
                        ],
                    ],
                ],
            ],
        );

        rex_yform_rest::addRoute($rex_blaupause_route);
    }
}
