<?php

class Carts
{
    private static $cart = null;
    private static $pdo;

    public static function get()
    {
        return self::$cart;
    }

    public static function get_size()
    {
        if (self::$cart) {
            sizeof(self::$cart);
        }
    }
    public function __construct()
    {
        self::db_conect();
        try {
            self::fetch();
        } catch (\Throwable $th) {
            echo var_dump($th);
        }
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

    public static function fetch()
    {
        try {
            if (Users::get_userstatus()) {
                $sql = 'SELECT * FROM carts WHERE user_id=:user_id';
                $statement = self::$pdo->prepare($sql);
                $statement->execute([
                    ':user_id' => Users::get_id()
                ]);
                if ($result = $statement->fetchAll()) {
                    $i = 0;
                    foreach ($result as $item) {
                        self::$cart[$i]['user_id'] = $item['user_id'];
                        self::$cart[$i]['product_id'] = $item['product_id'];
                        self::$cart[$i]['quantity'] = $item['quantity'];
                        $i++;
                    }
                    return $result;
                }
            } else {
                return "user not set";
            }
        } catch (\Throwable $th) {
            return false;
        }


    }
    public static function add($product_id, $quantity = 1)
    {
        try {
            if (Users::get_userstatus()) {
                $sql = 'SELECT quantity FROM carts WHERE product_id=:product_id AND user_id=:user_id';
                $statement = self::$pdo->prepare($sql);
                $statement->execute([
                    ':product_id' => $product_id,
                    ':user_id' => Users::get_id()
                ]);
                if ($result = $statement->fetch()) {
                    $sql = 'UPDATE carts SET quantity=:quantity WHERE product_id=:product_id AND user_id=:user_id';
                    $statement = self::$pdo->prepare($sql);
                    $quantity += $result['quantity'];
                    $statement->execute([
                        ':quantity' => $quantity,
                        ':product_id' => $product_id,
                        ':user_id' => Users::get_id()
                    ]);
                    self::fetch();
                } else {
                    $sql = 'INSERT INTO carts (user_id,product_id,quantity) VALUES ( :user_id, :product_id, :quantity)';
                    $statement = self::$pdo->prepare($sql);
                    $statement->execute([
                        ':quantity' => $quantity,
                        ':product_id' => $product_id,
                        ':user_id' => Users::get_id()
                    ]);
                }
            } else {
                return "user not set";
            }
        } catch (\Throwable $th) {
        }
        
    }

    public static function remove($product_id, $quantity = 1)
    {
        if (Users::get_userstatus()) {
            $sql = 'SELECT quantity FROM carts WHERE product_id=:product_id AND user_id=:user_id';
            $statement = self::$pdo->prepare($sql);
            $statement->execute([
                ':product_id' => $product_id,
                ':user_id' => Users::get_id()
            ]);
            $result = $statement->fetch();
            if ($result['quantity'] - $quantity == 0) {
                $sql = 'DELETE FROM carts WHERE product_id=:product_id AND user_id=:user_id';
                $statement = self::$pdo->prepare($sql);
                $statement->execute([
                    ':product_id' => $product_id,
                    ':user_id' => Users::get_id()
                ]);
            } else {
                $sql = 'UPDATE carts SET quantity=:quantity WHERE product_id=:product_id AND user_id=:user_id';
                $statement = self::$pdo->prepare($sql);
                $statement->execute([
                    ':quantity' => $result['quantity'] - $quantity,
                    ':product_id' => $product_id,
                    ':user_id' => Users::get_id()
                ]);
            }
        } else {
            return "user not set";
        }
    }

}

new Carts();