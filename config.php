<?php

//site name
define('SITE_NAME', 'Wine Shop');

//App Root
define('APP_ROOT', dirname($_SERVER['DOCUMENT_ROOT']),);
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '');

//DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'shoppy');
define('DB_NAME', 'wine_shop');
define('DB_PASS', 'System32');

//Controllers
define('CONTROLLERS',APP_ROOT.'/controllers/');

//Views
define('VIEWS',APP_ROOT.'/views/');

//Models
define('MODELS',APP_ROOT.'/models/');

//Assets
define('ASSETS',APP_ROOT.'/assets/');
