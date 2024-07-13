<?php

require_once '../config.php';
$REQUEST = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

class App
{
    public function __construct()
    {
        $this->load_models();
    }

    private function load_models()
    {
            require MODELS . 'users.php';
            require MODELS . 'stores.php';
            require MODELS . 'products.php';
            require MODELS . 'carts.php';
    }

    public static function load_view($view)
    {
        if (file_exists(VIEWS . $view . '.php')) {
            require VIEWS . $view . '.php';
        } else {
            echo '<h1>File does not exist! ' . VIEWS . $view . '.php';
        }
    }

    public static function redirect($uri)
    {
        header('Location: ' . $uri);
        die();
    }
}

new App();

# Router Adicionas Aqui As Routes Para OS Controllers
switch ($REQUEST[1]) {
    case '':
        require CONTROLLERS . 'frontpage.php';
        break;

    case 'store':
        require CONTROLLERS . 'store.php';
        break;

    case 'product':
        require CONTROLLERS . 'product.php';
        break;

    case 'user':
    case 'signin':
    case 'signup':
    case 'signout':
        require CONTROLLERS . 'user.php';
        break;

    case 'cart':
        require CONTROLLERS . 'cart.php';
        break;

    case 'gifts':
        require CONTROLLERS . 'gift.php';
        break;

    case 'about':
        require CONTROLLERS . 'about.php';
        break;

    default:
        require VIEWS . '404.php';
        break;
}