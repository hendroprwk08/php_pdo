<?php
class Pemilik {
    public $nama;
    public $mobil;

    function __construct($nama, Mobil $mobil) {
        $this->nama = $nama;
        $this->mobil = $mobil;
    }

    function getNama() {
        return $this->nama;
    }

    function getMobil() {
        return $this->mobil;
    }
}
?>