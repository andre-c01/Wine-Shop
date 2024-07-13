<link rel="stylesheet" type="text/css" href="/assets/styles/nav.css">


<div class="navbar_container">
    <nav>
        <div class="site_icon _img">
            <img src="https://okthemes.com/villenoirdark/wp-content/uploads/2018/09/logo-sticky.png" alt="">
        </div>

        <ul class="nav_menu">

            <li class="nav_item" id="wines">
                <a href="/store">WINES</a>
                <div class="nav_drop_container _hidden">
                    <div class="nav_drop">
                        <div class="col">
                            <span>VINHO TINTO</span>
                            <a href="/store">Barrancôa</a>
                            <a href="/store">Pato Frio</a>
                            <a href="/store">Gáudio</a>
                            <a href="/store">Grande Escolha</a>
                        </div>
                        <hr>
                        <div class="col">
                            <span>VINHO BRANCO</span>
                            <a href="/store">Barrancôa</a>
                            <a href="/store">Pato Frio</a>
                            <a href="/store">Gáudio</a>
                            <a href="/store">Grande Escolha</a>
                        </div>
                        <hr>
                        <div class="col">
                            <span>OUTROS</span>
                            <a href="/store">Champagne</a>
                            <a href="/store">Vinho Rosé</a>
                            <a href="/store">Copos & Acessórios</a>
                            <a href="/store">Conjuntos de Prova de Vinho</a>
                            <a href="/store">Vodkas</a>
                            <a href="/store">Azeites</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav_item" id="gifts">
                <a href="/gifts">GIFTS</a>
            </li>

            <li class="nav_item" id="gifts">
                <a href="/about">ABOUT</a>
            </li>

        </ul>

        <div class="user_actions">
            <div class="action_item">
                <a href="" class="_img"><img src="/assets/imgs/love_red_24x24.png" alt=""></a>
                <div class="action_drop_container _hidden">
                    <div class="action_drop">
                        <a href="/store">Vinho Tinto</a>
                        <a href="/store">Vinho Tinto</a>
                        <a href="/store">Vinho</a>
                        <a href="/store">Vinho Tinto</a>
                    </div>
                </div>
            </div>
            <div class="action_item">
                <a href="" class="_img"><img src="/assets/imgs/cart_24x24.png" alt=""></a>
                <div class="action_drop_container _hidden">
                    <div class="action_drop">
                        <a href="/store">Vinho Tinto</a>
                        <a href="/store">Vinho Tinto</a>
                        <a href="/store">Vinho</a>
                        <a href="/store">Vinho Tinto</a>
                    </div>
                </div>
            </div>
            <div class="action_item">
                <a style="cursor:pointer;" class="_img"><img src="/assets/imgs/user_24x24.png" alt=""></a>
                <?php if (Users::get_userstatus()) { ?>
                    <div class="action_drop_container _hidden">
                        <div class="action_drop">
                            <a id="useropen_pr" style="cursor:pointer;">PROFILE</a>
                            <a href="/cart">COMPRAS</a>
                            <a href="/signout">LOGOUT</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="action_drop_container _hidden">
                        <div class="action_drop">
                            <a id="useropen_in" style="cursor:pointer;">SIGN IN</a>
                            <a id="useropen_up" style="cursor:pointer;">SIGN UP</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="action_item" id="currency_select">
                <span>EURO</span>
                <div class="action_drop_container _hidden">
                    <div class="action_drop">
                        <a href="/store">EURO</a>
                        <a href="/store">USD</a>
                    </div>
                </div>
            </div>
            <div class="action_item" id="language_select">
                <span>ENG</span>
                <div class="action_drop_container _hidden">
                    <div class="action_drop">
                        <a href="/store">ENGLISH</a>
                        <a href="/store">PORTUGUESE</a>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>