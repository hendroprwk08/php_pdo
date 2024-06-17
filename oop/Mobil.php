<?php
class Mobil
{
    public $merk;
    public $warna;

    function __construct($merk, $warna)
    {
        $this->merk = $merk;
        $this->warna = $warna;
    }

    function getMerk()
    {
        return $this->merk;
    }

    function getWarna()
    {
        return $this->warna;
    }
}
