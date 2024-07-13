<style>
    .main {
        width: 100%;
        min-height: 100vh;

        display: flex;
        justify-content: start;
        align-items: start;
        gap: 20px;
    }
    .card {
        padding: 10px;
        border: 2px solid red;
    }

    .card img {
        width: 150px;
    }
</style>

<div class="main">
    <?php 
    echo var_dump($_GET);
    if (isset($_GET['category']))
    {
        $category = $_GET['category'];
    } else {
        $category = null;
    }
    foreach (Products::fetch_all($category) as $product) : ?>
        <div class="card">
            <a href="/product/<?=$product['id']?>"><img src="/assets/imgs/<?=$product['image']?>" alt=""></a>
            <h2><?=$product['title']?></h2>
            <p><?=$product['description']?></p>
            <p><?=$product['price']?>€</p>
            <p><?=$product['category']?></p>
            <p>id:<?=$product['id']?></p>
        </div>
    <?php endforeach ?>
</div>