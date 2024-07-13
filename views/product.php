<style>
    div {
        padding: 20px;
        border: 1px solid red;
        width: fit-content;
    }
    div img {
        width: 250px;
    }
</style>
<div class="">
    <img src="/assets/imgs/<?= Products::get()['image'] ?>" alt="">
    <h1><?= Products::get()['title'] ?></h1>
    <p><?= Products::get()['description'] ?></p>
    <p><?= Products::get()['quntity'] ?></p>
    <p><?= Products::get()['price'] ?>€</p>
    <p><?= Products::get()['category'] ?></p>
    <p><?= Products::get()['id'] ?></p>
</div>