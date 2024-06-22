<?php
include ('Model/Database.php');

class ProfileMatching
{
  public $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function perhitunganGap($array)
  {
    foreach ($array as $key => $laptop) {
      $laptop['id'];
      $laptop['cpu'];
      $laptop['gpu'];
      $laptop['ram'];
      $laptop['ssd'];
      $laptop['harga'];
      $laptop['ketajaman_warna'];
      $laptop['berat'];
      $laptop['ukuran_layar'];
    }
    $gap = array(
      'cpu' => $laptop['cpu'] - 5,
      'gpu' => $laptop['gpu'] - 4,
      'ram' => $laptop['ram'] - 5,
      'ssd' => $laptop['ssd'] - 5,
      'harga' => $laptop['harga'] - 5,
      'ketajaman_warna' => $laptop['ketajaman_warna'] - 4,
      'berat' => $laptop['berat'] - 4,
      'ukuran_layar' => $laptop['ukuran_layar'] - 3,
    );

    return $gap;
  }

  public function Pembobotan($array)
  {
    $bobot = array();
    foreach ($array as $value) {
      if ($value == 0) {
        $bobot[] = 5;
      } elseif ($value == 1) {
        $bobot[] = 4.5;
      } elseif ($value == -1) {
        $bobot[] = 4;
      } elseif ($value == 2) {
        $bobot[] = 3.5;
      } elseif ($value == -2) {
        $bobot[] = 3;
      } elseif ($value == 3) {
        $bobot[] = 2.5;
      } elseif ($value == -3) {
        $bobot[] = 2;
      } elseif ($value == 4) {
        $bobot[] = 1.5;
      } elseif ($value == -4) {
        $bobot[] = 1;
      }
    }
    return $bobot;
  }

  public function coreFactor($array)
  {
    $NCF = array_sum($array) / count($array);
    return $NCF;
  }

  public function secondaryFactor($array)
  {
    $NSC = array_sum($array) / count($array);
    return $NSC;
  }

  public function totalScore($NCF, $NSC)
  {
    $totalScore = $NCF * 0.6 + $NSC * 0.4;
    return $totalScore;
  }

  public function ranking()
  {

  }
}
?>