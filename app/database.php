<?php
class Database {
    private $host = "localhost";
    private $username = "root"; // ganti dengan username database Anda
    private $password = ""; // ganti dengan password database Anda
    private $database = "db_commerce"; // ganti dengan nama database Anda
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi database gagal: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>