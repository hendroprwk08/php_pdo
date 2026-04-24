<?php
class MobilListrik extends Mobil
{
    public $kapasitasBaterai;

    function isiDaya(){
        return "Mobil {$this->merk} sedang mengisi Daya {$this->kapasitasBaterai}";
    }
}
?>