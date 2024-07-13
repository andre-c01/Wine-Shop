<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (Users::get_userstatus()) {
        App::load_view(
            'cart'
        );
    } else {
        App::redirect("/");
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (Users::get_userstatus() && $REQUEST[2] == 'add') {
        if (isset($_POST['qty']))
        {
            Carts::add($_POST['id'],$_POST['qty']);
        } else {
            Carts::add($_POST['id']);
        }

        if (isset($_POST['r'])) {
            App::redirect($_POST['r']);
        }
    }
    if (Users::get_userstatus() && $REQUEST[2] == 'remove') {
        if (isset($_POST['qty']))
        {
            Carts::remove($_POST['id'],$_POST['qty']);
        } else {
            Carts::remove($_POST['id']);
        }

        if (isset($_POST['r'])) {
            App::redirect($_POST['r']);
        }
    }
}