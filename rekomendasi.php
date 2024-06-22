<?php
include ('Model/ProfileMatching.php');
$profileMatching = new ProfileMatching();

$A0 = $_POST['A1'];
$A1 = $_POST['A2'];
$A2 = $_POST['A3'];
$A3 = $_POST['A4'];
$A4 = $_POST['A5'];

$namaLaptop = array();
$totalPointAlternative = array();

for ($i = 0; $i <= 4; $i++) {
  $id = ${"A$i"};
  $sql = "SELECT * FROM laptop WHERE id = $id LIMIT 1";
  $results = $profileMatching->db->select($sql);
  $row = $results->fetch_assoc();

  $data[$i] = array(
    'id' => $row['id'],
    'nama' => $row['nama'],
    'cpu' => $row['cpu'],
    'gpu' => $row['gpu'],
    'ram' => $row['ram'],
    'ssd' => $row['ssd'],
    'harga' => $row['harga'],
    'ketajaman_warna' => $row['ketajaman_warna'],
    'berat' => $row['berat'],
    'ukuran_layar' => $row['ukuran_layar'],
  );

  $namaLaptop[$i] = $row['nama'];

  $gap = $profileMatching->perhitunganGap($data);
  $pembobotan = $profileMatching->Pembobotan($gap);

  $colNCF = [
    'cpu' => $pembobotan[0],
    'gpu' => $pembobotan[1],
    'ram' => $pembobotan[2],
    'ssd' => $pembobotan[3],
    'harga' => $pembobotan[4],
  ];

  $colNSC = [
    'ketajaman_warna' => $pembobotan[5],
    'berat' => $pembobotan[6],
    'ukuran_layar' => $pembobotan[7],
  ];

  $NCF = $profileMatching->coreFactor($colNCF);
  $NSC = $profileMatching->secondaryFactor($colNSC);
  $nilaiTotal = $profileMatching->totalScore($NCF, $NSC);

  $totalPointAlternative[] = $nilaiTotal;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPK Laptop Terbaik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
</head>

<body>
  <?php include ('component/header.php'); ?>

  <main class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Hasil Rekomendasi</h1>
        <br>
        <p>Dari perhitungan dengan menggunakan metode <i>profile matching</i> didapatkan nilai total dari setiap
          alternatif.</p>
        <table class="table w-50">
          <thead class="table-info">
            <tr>
              <th class="text-center">Nama Laptop</th>
              <th class="text-center">Nilai Total</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i <= 4; $i++) { ?>
              <tr>
                <td><?= $namaLaptop[$i]; ?></td>
                <td class="text-center"><?= str_replace('.', ',', number_format($totalPointAlternative[$i], 3)); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <p class="h-4 fw-bold mt-5">Grafik Nilai Total</p>
      </div>
    </div>
  </main>

  <?php include ('component/footer.php'); ?>

</html>