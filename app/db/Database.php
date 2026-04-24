<?php
class Database {
    private ?PDO $conn = null;

    public function __construct(
        private string $host = "localhost",
        private string $username = "root",
        private string $password = "",
        private string $database = "db_pengguna"
    ) {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            
            // Inisialisasi koneksi
            $this->conn = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function getConnection(): ?PDO {
        return $this->conn;
    }

    public function __destruct() {
        // Di PDO, cukup set ke null untuk menutup koneksi
        $this->conn = null;
    }
}