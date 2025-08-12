<?php

namespace Model;

use PDO;
use PDOException;

require_once __DIR__ . '/../Config/configuration.php';

class Connection
{

    public static function getConnection(): PDO
    {
        try {
            return new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $error) {
            die("Erro de Conexão: " . $error->getMessage());
        }
    }
}

?>