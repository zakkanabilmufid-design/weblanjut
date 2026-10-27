<?php
class Persegi {
    public $panjang;
    public $lebar;
    function luasPersegi()
    {
        $hitung= $this->panjang * $this->lebar;
        return $hitung;
    }
    function kelilingPersegi()
    {
        $hitung=2 * ($this->panjang + $this->lebar);
        return $hitung;
    }
}
class Balok extends Persegi {
    public $tinggi;
    function volumeBalok()
    {
        $hitung=$this->panjang * $this->lebar * $this->tinggi;
        return $hitung;
    }
    function luasBalok(){
        $hitung = 2 *(($this->panjang * $this->lebar)+($this->panjang * $this->tinggi)
        +($this->tinggi * $this->lebar));
        return $hitung;
    }
}
$balok = new Balok;
$balok ->panjang=2;
$balok ->lebar=3;
$balok ->tinggi=5;

echo "Luas persegi merupakan method dari parent<br/>";
echo "Luas persegi =".$balok->luasPersegi()."<br/><br/>";
echo "keliling persegi merupakan method dari parent<br/>";
echo "keliling persegi =".$balok->kelilingPersegi()."<br/><br/>";
echo "volume balok merupakan method dari child<br/>";
echo "volume balok =".$balok->volumeBalok()."<br/><br/>";
echo "luas balok merupakan method dari child<br/>";
echo "luas balok =".$balok->luasBalok()."<br/><br/>";