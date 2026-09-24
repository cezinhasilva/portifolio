<?php

namespace Config;

use CodeIgniter\Settings\Config\Settings as BaseSettings;
use CodeIgniter\Settings\Handlers\ArrayHandler;
use CodeIgniter\Settings\Handlers\DatabaseHandler;

class Settings extends BaseSettings
{
    /**
     * The available handlers.
     * Usando 'array' para evitar chamadas de banco de dados no frontend serverless.
     *
     * @var string[]
     */
    public $handlers = ['array'];

    /**
     * Array handler settings.
     */
    public $array = [
        'class'     => ArrayHandler::class,
        'writeable' => true,
    ];

    /**
     * Database handler settings.
     */
    public $database = [
        'class'     => DatabaseHandler::class,
        'table'     => 'settings',
        'group'     => null,
        'writeable' => true,
    ];
}
