<?php
class mobil{
    var $jenis;
    var $merk;
    var $warna;

      function setJenis($x){
        $this->jenis = $x;
      }
      function bacaJenis(){
        return $this->jenis;
      }
      function setMerk($x){
        $this->merk = $x;
      }
      function bacaMerk(){
        return $this->merk;
      }
      function setWarna($x){
        $this->warna = $x;
      }
      function bacaWarna(){
        return $this->warna;
      }
}

$mobil1 = new mobil();
$mobil1->setJenis('SUV');
$mobil1->setMerk('Suzuki');
$mobil1->setWarna('Biru');
echo 'Mobil 1 merupakan mobil berjenis ' .$mobil1->bacaJenis(). ' dengan merk ' .$mobil1->bacaMerk(). ' dan berwarna ' .$mobil1->bacaWarna();
echo "<br>";
$mobil1 = new mobil();
$mobil1->setJenis('Car City');
$mobil1->setMerk('Chevrolet');
$mobil1->setWarna('Hijau');
echo 'Mobil 2 merupakan mobil berjenis ' .$mobil1->bacaJenis(). ' dengan merk ' .$mobil1->bacaMerk(). ' dan berwarna ' .$mobil1->bacaWarna();