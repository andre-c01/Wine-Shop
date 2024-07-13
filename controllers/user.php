<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($REQUEST[1]) {
        case 'signup':
            if (htmlentities($_POST['password'] == htmlentities($_POST['password']))) {
                if (Users::signup(htmlentities($_POST['username']), htmlentities($_POST['email']), htmlentities($_POST['password']))) {
                    Users::signin(htmlentities($_POST['username']), htmlentities($_POST['password']));
                    App::redirect("/");
                }
            }
            break;

        case 'signin':
            if (Users::signin(htmlentities($_POST['username']), htmlentities($_POST['password']))) {
                App::redirect("/");
            } else {
                App::redirect("/?bad_user");
            }
            break;

        default:
            App::redirect("/");
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    switch ($REQUEST[1]) {
        case 'signout':
            Users::clear();
            App::redirect("/");
            break;
        case 'signup':
            App::load_view(
                'user'
            );
            break;
        case 'signin':
            App::load_view(
                'user'
            );
            break;
        default:
            App::load_view(
                'user'
            );
            break;
    }

}
