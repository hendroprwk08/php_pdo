<?php
declare(strict_types=1);

class Pengguna {
    private string $table_name = "pengguna";

    // Constructor Property Promotion & Type Hinting
    public function __construct(
        private PDO $conn,
        public ?int $idpengguna = null,
        public ?string $nama = null,
        public ?string $surel = null,
        public ?string $sandi = null
    ) {}

    // Method Helper untuk Sanitasi Data (Lebih bersih)
    private function sanitize(): void {
        $this->nama = $this->nama ? htmlspecialchars(strip_tags($this->nama)) : null;
        $this->surel = $this->surel ? htmlspecialchars(strip_tags($this->surel)) : null;
        $this->sandi = $this->sandi ? htmlspecialchars(strip_tags($this->sandi)) : null;
    }

    public function create(): bool {
        $query = "INSERT INTO {$this->table_name} (nama, surel, sandi) VALUES (:nama, :surel, :sandi)";
        $stmt = $this->conn->prepare($query);
        
        $this->sanitize();

        return $stmt->execute([
            ":nama" => $this->nama,
            ":surel" => $this->surel,
            ":sandi" => $this->sandi
        ]);
    }

    public function read(): PDOStatement {
        $query = "SELECT idpengguna, nama, surel, sandi FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    public function show(): PDOStatement {
        $query = "SELECT idpengguna, nama, surel, sandi FROM {$this->table_name} WHERE idpengguna = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([":id" => $this->idpengguna]);
            
        return $stmt;
    }

    public function update(): bool {
        $query = "UPDATE {$this->table_name} SET nama = :nama, surel = :surel, sandi = :sandi WHERE idpengguna = :idpengguna";
        $stmt = $this->conn->prepare($query);
        
        $this->sanitize();
        $this->idpengguna = (int) $this->idpengguna;

        return $stmt->execute([
            ":idpengguna" => $this->idpengguna,
            ":nama" => $this->nama,
            ":surel" => $this->surel,
            ":sandi" => $this->sandi
        ]);
    }

    public function delete(): bool {
        $query = "DELETE FROM {$this->table_name} WHERE idpengguna = :idpengguna";
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([":idpengguna" => (int) $this->idpengguna]);
    }
}