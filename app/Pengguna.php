<?php
include_once("Database.php");

class Pengguna {
    private $conn;
    private $table_name = "pengguna";

    public $idpengguna;
    public $nama;
    public $surel;
    public $sandi;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Membuat pengguna baru
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nama, surel, sandi) VALUES (:nama, :surel, :sandi)";
        $stmt = $this->conn->prepare($query);
        
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->surel = htmlspecialchars(strip_tags($this->surel));
        $this->sandi = htmlspecialchars(strip_tags($this->sandi));

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":surel", $this->surel);
        $stmt->bindParam(":sandi", $this->sandi);

        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Mendapatkan semua pengguna
    public function read() {
        $query = "SELECT idpengguna, nama, surel, sandi FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // Menampilkan 1 data berdasarkan id
    function show(){
        $query = "SELECT idpengguna, nama, surel, sandi FROM " . 
                    $this->table_name . " where idpengguna = ". 
                    $this->idpengguna;
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    // Mengupdate pengguna
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama = :nama, surel = :surel, sandi = :sandi WHERE idpengguna = :idpengguna";
        $stmt = $this->conn->prepare($query);
        
        $this->idpengguna = htmlspecialchars(strip_tags($this->idpengguna));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->surel = htmlspecialchars(strip_tags($this->surel));
        $this->sandi = htmlspecialchars(strip_tags($this->sandi));

        $stmt->bindParam(":idpengguna", $this->idpengguna);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":surel", $this->surel);
        $stmt->bindParam(":sandi", $this->sandi);

        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }

    // Menghapus pengguna
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idpengguna = :idpengguna";
        $stmt = $this->conn->prepare($query);
        
        $this->idpengguna = htmlspecialchars(strip_tags($this->idpengguna));
        $stmt->bindParam(":idpengguna", $this->idpengguna);

        if($stmt->execute()) {
            return true;
        }
        
        return false;
    }
}
?>