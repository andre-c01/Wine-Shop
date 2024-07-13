<style>
    .a {
        display: flex;
        justify-items: start;
        align-items: start;

        gap: 20px;
    }

    .b {
        border: 1px solid red;
        padding: 10px;
    }
</style>

<div class="a">
    <?php $total = '0';
    foreach (Carts::get() as $cart) { ?>
        <div class="b">
            <?php $product = Products::fetch($cart['product_id']) ?>
            <h1><?= $product['title'] ?></h1>
            <p><?= $product['description'] ?></p>
            <p><?= $product['price'] ?>€</p>
            <p>qt:<?= $cart['quantity'] ?></p>
            <p>cat:<?= $product['category'] ?></p>
            <p><?= $product['id'] ?></p>
            <p></p>
        </div>
        <?php
        $total += $product['price'] * $cart['quantity'] + 0.00;
    } ?>
    <?php echo $total; ?>
    <?php echo Carts::get_size(); ?>
</div>
<div class="">
    <form action="/cart/add" method="post">
        <input type="number" placeholder="product_id" name="id" id="id" required>
        <input type="number" placeholder="qty" name="qty" id="qty" required>
        <input type="number" name="r" id="r" value="/" hidden>
        <input type="submit" value="ADD">
    </form>
</div>
<div class="">
    <form action="/cart/remove" method="post">
        <input type="number" placeholder="product_id" name="id" id="id" required>
        <input type="number" placeholder="qty" name="qty" id="qty" required>
        <input type="number" name="r" id="r" value="/" hidden>
        <input type="submit" value="REMOVE">
    </form>
</div>