<?php

class Users
{
    private static $userstatus = null;
    private static $id = null;
    private static $username = null;
    private static $email = null;
    private static $pdo = null;

    public static function get_user()
    {
        $user = [
            'id' => self::$id,
            'username' => self::$username,
            'email' => self::$email
        ];
        return $user;
    }

    public static function get_userstatus()
    {
        return self::$userstatus;
    }

    public static function get_username()
    {
        return self::$username;
    }

    public static function get_email()
    {
        return self::$email;
    }

    public static function get_id()
    {
        return self::$id;
    }

    public function __construct()
    {
        self::db_conect();
        self::signin_by_token();
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

    public static function clear()
    {
        setcookie("Session_Token", "", time()-3600, "/");
    }

    public static function signin_by_token()
    {
        if (isset($_COOKIE["Session_Token"])) {
            $sql = 'SELECT * FROM users WHERE token=:token';
            $statement = self::$pdo->prepare($sql);
            $statement->execute([
                ':token' => $_COOKIE['Session_Token'],
            ]);
            if ($result = $statement->fetch()) {
                self::$userstatus = true;
                self::$id = $result["id"];
                self::$username = $result["username"];
                self::$email = $result["email"];
            }
        }
    }

    public static function signup($username, $email, $passwd)
    {
        $sql = 'INSERT INTO users (username, email, passwd) VALUES (:username, :email, :passwd )';
        $statement = self::$pdo->prepare($sql);
        if (
            $statement->execute([
                ':username' => $username,
                ':email' => $email,
                ':passwd' => $passwd,
            ])
        ) {
            return true;
        }
    }

    public static function signin($username, $passwd)
    {
        $sql = 'SELECT * FROM users WHERE username=:username AND passwd=:passwd';
        $statement = self::$pdo->prepare($sql);
        $statement->execute([
            ':username' => $username,
            ':passwd' => $passwd
        ]);
        if ($result = $statement->fetch()) {
            self::set_token($result['id']);
            self::$userstatus = true;
            self::$id = $result["id"];
            self::$username = $result["username"];
            self::$email = $result["email"];
            return $result;
        }

    }

    public static function fetch($id)
    {
        $sql = 'SELECT * FROM users WHERE id=:id';
        $statement = self::$pdo->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        if ($result = $statement->fetch()) {
            return $result;
        }
    }

    public static function fetch_all()
    {
        $sql = 'SELECT * FROM users';
        $statement = self::$pdo->prepare($sql);
        $statement->execute();
        if ($result = $statement->fetchAll()) {
            return $result;
        }
    }

    public static function set_token($id)
    {
        $token = self::gen_session_token();
        $sql = 'UPDATE users SET token = :token WHERE id=:id';
        $statement = self::$pdo->prepare($sql);
        if (
            $statement->execute([
                ':token' => $token,
                ':id' => $id
            ])
        ) {
            setcookie("Session_Token", $token, 0, "/");
            return true;
        }
    }

    public static function gen_session_token()
    {
        $length = 64;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $token;
    }
}

new Users();