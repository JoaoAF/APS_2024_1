<?php
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Conexão com o banco de dados MySQL
        $this->connection = new mysqli("localhost", "root", "", "APS_2024_1");

        // Verifica se a conexão foi bem-sucedida
        if ($this->connection->connect_error) {
            die("Conexão falhou: " . $this->connection->connect_error);
        }
    }

    // Método Singleton para obter a instância
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Retorna a conexão
    public function getConnection() {
        return $this->connection;
    }
}
?>
