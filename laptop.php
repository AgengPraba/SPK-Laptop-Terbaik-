<?php
include ('Model/Database.php');
$db = new Database();


if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $sql = "DELETE FROM laptop WHERE id = '$id'";
  $del = $db->delete($sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama = $_POST['nama'];
  $cpu = $_POST['cpu'];
  $gpu = $_POST['gpu'];
  $ram = $_POST['ram'];
  $ssd = $_POST['ssd'];
  $ketajaman_layar = $_POST['ketajaman_layar'];
  $berat = $_POST['berat'];
  $harga = $_POST['harga'];
  $ukuran_layar = $_POST['ukuran_layar'];

  $sql = "INSERT INTO laptop (nama, cpu, gpu, ram, ssd, ketajaman_warna, berat, harga, ukuran_layar) 
            VALUES ('$nama', '$cpu', '$gpu', '$ram', '$ssd', '$ketajaman_layar', '$berat', '$harga', '$ukuran_layar')";

  if ($db->insert($sql)) {
    $success = true;
  } else {
    $success = false;
  }
}


$sql = "SELECT * FROM laptop";
$results = $db->select($sql);
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
  <?php include ('component/header.php'); ?>

  <main class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Daftar Pilihan Laptop</h1>
        <p class="text-center">Tambahkan laptop yang Anda inginkan agar muncul daftar rekomendasi.</p>
        <br>
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah</a><br><br>
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th class="text-center">CPU</th>
              <th class="text-center">GPU</th>
              <th class="text-center">RAM</th>
              <th class="text-center">SSD</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Ketajaman Warna</th>
              <th class="text-center">Berat</th>
              <th class="text-center">Ukuran Layar</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $number = 0;
            foreach ($results as $result):
              $number++;
              ?>
              <tr>
                <td><?= $number; ?></td>
                <td><?= $result['nama']; ?></td>
                <td class="text-center"><?= $result['cpu']; ?></td>
                <td class="text-center"><?= $result['gpu']; ?></td>
                <td class="text-center"><?= $result['ram']; ?></td>
                <td class="text-center"><?= $result['ssd']; ?></td>
                <td class="text-center"><?= $result['harga']; ?></td>
                <td class="text-center"><?= $result['ketajaman_warna']; ?></td>
                <td class="text-center"><?= $result['berat']; ?></td>
                <td class="text-center"><?= $result['ukuran_layar']; ?></td>
                <?php
                if ($number > 5) {
                  ; ?>
                  <td class="text-center"><a href="?del=<?= $result['id']; ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Do you want to delete?')">Hapus</a></td>
                <?php } else { ?>
                  <td class="fw-lighter fst-italic text-center">default</td>
                  <?php
                }
                ; ?>
              </tr>
              <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahLabel">Tambah Data Laptop</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-danger fw-lighter fst-italic">Masukkan data dengan benar sesuai dengan spesifikasi laptop yang
            sebenar-benarnya agar
            hasil perankingan
            akurat!</p>
          <form action="" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Laptop</label>
              <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="cpu" class="form-label  d-flex justify-content-between">Skor CPU Mark <span class="fs-8">(cek
                  skor CPU
                  Mark <a href="https://cpubenchmark.net/cpu_list.php" target="_blank">disini</a>)</span></label>
              <select class="form-select" id="cpu" name="cpu" required>
                <option value="1">0 - 5000</option>
                <option value="2">5001 - 10000</option>
                <option value="3">10001 - 15000</option>
                <option value="4">15001 - 20000</option>
                <option value="5"> > 20001</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="gpu" class="form-label d-flex justify-content-between">Skor GPU Mark <span class="fs-8">(cek
                  skor GPU
                  Mark <a href="https://www.videocardbenchmark.net/high_end_gpus.html"
                    target="_blank">disini</a>)</span></label>
              <select class="form-select" id="gpu" name="gpu" required>
                <option value="1">0 - 2000</option>
                <option value="2">2001 - 4000</option>
                <option value="3">4001 - 6000</option>
                <option value="4">6001 - 8000</option>
                <option value="5"> > 8001</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="ram" class="form-label">Kapasitas RAM</label>
              <select class="form-select" id="ram" name="ram" required>
                <option value="1">0 - 2GB</option>
                <option value="2">2,1 - 4GB</option>
                <option value="3">4,1 - 8GB</option>
                <option value="4">8,1 - 16GB</option>
                <option value="5"> >16GB</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="ssd" class="form-label">Kapasitas SSD</label>
              <select class="form-select" id="ssd" name="ssd" required>
                <option value="1">0 - 128GB</option>
                <option value="2">128,1 - 256GB</option>
                <option value="3">256,1 - 512GB</option>
                <option value="4">512,1 - 999GB</option>
                <option value="5"> >=1TB</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="ketajaman_layar" class="form-label">Ketajaman Layar</label>
              <select class="form-select" id="ketajaman_layar" name="ketajaman_layar" required>
                <option value="1">0 - 50%sRGB</option>
                <option value="2">50 - 60%sRGB</option>
                <option value="3">60 - 70%sRGB</option>
                <option value="4">70 - 80%sRGB</option>
                <option value="5"> >90%sRGB</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="berat" class="form-label">Berat Laptop</label>
              <select class="form-select" id="berat" name="berat" required>
                <option value="5">0 - 1,0 Kg</option>
                <option value="4">1,1 - 1,5 Kg</option>
                <option value="3">1,6 - 2,0 Kg</option>
                <option value="2">2,1 - 2,5 Kg</option>
                <option value="1">2,6 - 3,0 Kg</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga Laptop</label>
              <select class="form-select" id="harga" name="harga" required>
                <option value="5">0 - 5.000.000</option>
                <option value="4">5.000.001 - 10.000.000</option>
                <option value="3">10.000.000 - 15.000.000</option>
                <option value="2">15.000.001 - 20.000.000</option>
                <option value="1"> >20.000.000</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="ukuran_layar" class="form-label">Ukuran Layar</label>
              <select class="form-select" id="ukuran_layar" name="ukuran_layar" required>
                <option value="1">10 - 12,9 Inch</option>
                <option value="2">13 - 13,9 Inch</option>
                <option value="3">14 - 14,9 Inch</option>
                <option value="4">15 - 15,9 Inch</option>
                <option value="5"> >=16 Inch</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <?php include ('component/footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
  <?php if (isset($success) && $success): ?>
    <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: 'Data berhasil ditambahkan!',
    });
    </script>
  <?php endif; ?>

</html>