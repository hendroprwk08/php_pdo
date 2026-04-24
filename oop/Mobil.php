<?php
class Mobil
{
    public $merk;
    public $warna;

    function __construct($x, $y)
    {
        $this->merk = $x;
        $this->warna = $y;
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
