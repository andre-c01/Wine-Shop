<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/assets/styles/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/styles/frontpage.css">
    <title><?= SITE_NAME ?></title>
</head>

<body>

    <?php require $VIEWS . 'partials/nav.php'; ?>

    <div class="sign _hidden" id="userwindow_up">
        <div class="row">
            <a id="userclose_up" style="cursor: pointer;">X</a>
        </div>
        <div class="row _img">
            <img src="/assets/imgs/user_96x96.png" alt="">
        </div>
        <div class="row">
            <form action="/signup" method="post">
                <input type="text" placeholder="username" name="username" id="username" required>
                <input type="email" placeholder="email" name="email" id="email" required>
                <input type="password" placeholder="passwd" name="password" id="password" required>
                <input type="password" placeholder="passwd" name="password_c" id="password_c" required>
                <input type="submit" value="SIGN UP">
            </form>
        </div>
    </div>

    <div class="sign _hidden" id="userwindow_in">
        <div class="row">
            <a id="userclose_in" style="cursor: pointer;">X</a>
        </div>
        <div class="row _img">
            <img src="/assets/imgs/user_96x96.png" alt="">
        </div>
        <div class="row">
            <form action="signin" method="post">
                <input type="text" placeholder="username" name="username" id="username" required>
                <input type="password" placeholder="passwd" name="password" id="password" required>
                <input type="submit" value="SIGN IN">
            </form>
        </div>
    </div>

    <div class="sign profile _hidden" id="userwindow_pr">
        <div class="row">
            <a id="userclose_pr" style="cursor: pointer;">X</a>
        </div>
        <div class="row _img">
            <img src="/assets/imgs/user_96x96.png" alt="">
        </div>
        <div class="row">
            <?= Users::get_username() ?>
            <?= Users::get_email() ?>
        </div>
    </div>

    <div class="main _img">
        <div class="col">
            <span>APENAS</span>
            <span>DIVINO</span>
        </div>
        <div class="col">
            <img src="/assets/imgs/wine1.png" alt="">
        </div>
    </div>

</body>

<script src="/assets/scripts/nav.js"></script>

</html>