<?php

class Products
{
    private static $product = null;
    private static $pdo;

    public static function get()
    {
        return self::$product;
    }
    public function __construct()
    {
        self::db_conect();
    }

    private static function db_conect()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            self::$pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public static function fetch_all($category = null)
    {
        if ($category != null) {
            $sql = 'SELECT products.id, products.title, products.description, products.quantity, products.price, categories.category, products.image
            FROM products 
            INNER JOIN categories ON products.category_id=categories.id
            WHERE categories.category=:category';
            $statement = self::$pdo->prepare($sql);
            $statement->execute([
                ':category' => $category,
            ]);
        } else {
            $sql = 'SELECT products.id, products.title, products.description, products.quantity, products.price, categories.category, products.image
            FROM products 
            INNER JOIN categories ON products.category_id=categories.id';
            $statement = self::$pdo->prepare($sql);
            $statement->execute();
        }

        if ($result = $statement->fetchAll()) {
            $products = null;
            $i = 0;
            foreach ($result as $product) {
                $products[$i]['id'] = $product['id'];
                $products[$i]['title'] = $product['title'];
                $products[$i]['description'] = $product['description'];
                $products[$i]['quantity'] = $product['quantity'];
                $products[$i]['price'] = $product['price'];
                $products[$i]['category'] = $product['category'];
                $products[$i]['image'] = $product['image'];
                $i++;
            }
            return $products;
        }
    }

    public static function fetch($id)
    {
        try {
            $sql = 'SELECT products.id, products.title, products.description, products.quantity, products.price, categories.category, products.image
            FROM products 
            INNER JOIN categories ON products.category_id=categories.id
            WHERE products.id=:id';
            $statement = self::$pdo->prepare($sql);
            $statement->execute([
                ':id' => $id,
            ]);

            if ($result = $statement->fetch()) {
                self::$product['id'] = $result['id'];
                self::$product['title'] = $result['title'];
                self::$product['description'] = $result['description'];
                self::$product['quantity'] = $result['quantity'];
                self::$product['price'] = $result['price'];
                self::$product['category'] = $result['category'];
                self::$product['image'] = $result['image'];
                return $result;
            }
        } catch (\Throwable $th) {
            return false;
        }

    }
}

new Products();