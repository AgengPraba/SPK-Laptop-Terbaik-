<?php
include ('Model/Database.php');
$db = new Database();

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
</head>

<body>
  <?php include ('component/header.php'); ?>

  <main class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Rekomendasi Laptop Terbaik</h1>
        <p class="text-center">Sistem pendukung keputusan untuk menentukan laptop terbaik bagi mahasiswa Informatika
          Unsoed dengan metode <i>profile matching</i></p>
        <br>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rekomendasikan Laptop</h5>
            <p class="card-text">Masukkan 5 jenis pilihan laptop yang Anda inginkan.</p><br>
            <form action="rekomendasi.php" method="POST">
              <div class="mt-3">
                <label class="fw-bold mb-2">Laptop 1:</label>
                <select class="form-select" aria-label="Default select example" name="A1" required>
                  <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mt-3">
                <label class="fw-bold mb-2">Laptop 2:</label>
                <select class="form-select" aria-label="Default select example" name="A2" required>
                  <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mt-3">
                <label class="fw-bold mb-2">Laptop 3:</label>
                <select class="form-select" aria-label="Default select example" name="A3" required>
                  <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mt-3">
                <label class="fw-bold mb-2">Laptop 4:</label>
                <select class="form-select" aria-label="Default select example" name="A4" required>
                  <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mt-3">
                <label class="fw-bold mb-2">Laptop 5:</label>
                <select class="form-select" aria-label="Default select example" name="A5" required>
                  <?php foreach ($results as $result): ?>
                    <option value="<?php echo $result['id']; ?>"><?php echo $result['nama']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Rekomendasikan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include ('component/footer.php'); ?>

</html>