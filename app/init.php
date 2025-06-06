<?php
session_start();

$config = require_once __DIR__ . '/../config/config.php';

if (!defined('BASE_URL')) {
    define('BASE_URL', $config['app']['base_url']);
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/helpers.php';


spl_autoload_register(function ($class_name) {

    $paths = [
        __DIR__ . '/controller/',
        __DIR__ . '/model/',
        __DIR__ . '/middleware/',
    ];
    foreach ($paths as $path) {
        $file  = $path . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
