<?php
require_once __DIR__ . '/../app/init.php';
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../routes/web.php';


$router->dispatch();
