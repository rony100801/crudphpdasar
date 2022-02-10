<?php
session_start();

if( !isset($_SESSION['user']) ) {
  header("Location: login/login.php");
  exit;
}

require '../functions/functions.php';

$id = $_GET['id'];

$anggota = query("SELECT * FROM anggota WHERE id = $id")[0];



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>UTM Welcome</title>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Web Learning Community</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#tentang">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#visimisi">Visi & Misi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#struktur">Struktur Organisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php#anggota">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-danger ms-2" href="login/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- DETAIL -->
  <section id="tambah">
    <div class="container mt-5 pt-4 mb-5">

      <div class="row">
        <div class="col text-center">
          <h2 class="display-6">Detail <?= $anggota['nama'] ?></h2>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-4 mx-auto">

          <div class="card">
            <img src="../img/<?= $anggota["foto"] ?>" class="card-img-top" alt="<?= $anggota["foto"] ?>" height="300">
            <div class="card-body">
              <h5 class="card-title"><?= $anggota["nama"] ?></h5>
              <h5 class="card-title">Sebagai <?= $anggota["statuss"] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?= $anggota["prodi"] ?></li>
              <li class="list-group-item"><?= $anggota["nim"] ?></li>
              <li class="list-group-item">Semester <?= $anggota["semester"] ?></li>
              <li class="list-group-item"><?= $anggota["whatsapp"] ?></li>
            </ul>
          </div>

        </div>
      </div>


    </div>
  </section>
  <!-- AKHIR DETAIL -->


  <!-- FOOTER -->
  <!-- <footer class="bg-dark mt-5 pt-5">
    <div class="container">
      <div class="row text-center text-light">
        <div class="col">
          <p class="fs-5">Copyright &copy 2022. WELCOME</p>
        </div>
      </div>
    </div>
  </footer> -->
  <!-- AKHIR FOOTER -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>