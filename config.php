<?php
class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                $host = 'localhost';
                $dbname = 'projetweb';
                $username = 'root';
                $password = '';

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
?>

