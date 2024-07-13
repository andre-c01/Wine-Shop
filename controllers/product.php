<?php

if ($REQUEST[2]) {
    $product_id = $REQUEST[2];
    Products::fetch($product_id);
    App::load_view(
        'product'
    );
} else {
    App::redirect("/");
}