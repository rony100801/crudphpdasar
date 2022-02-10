<?php
session_start();

if( !isset($_SESSION['admin']) ) {
  header("Location: login/login.php");
  exit;
}

require 'functions/functions.php';

$anggota = query("SELECT * FROM anggota");


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
      <a class="navbar-brand" href="#">Web Learning Community</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#tentang">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#visimisi">Visi & Misi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#struktur">Struktur Organisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#anggota">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-success" href="pages/tambah.php">Tambah Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-danger ms-2" href="login/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- HELLO -->
  <section id="hello">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="display-6">Hello</h2>
        </div>
      </div>
    </div>
  </section>
  <!-- AKHIR HELLO -->

  <!-- ANGGOTA -->
  <section id="anggota" class="mt-5 pt-4">
    <div class="container">

      <div class="row">
        <div class="col text-center">
          <h2 class="display-6">Daftar Anggota Welcome</h2>
        </div>
      </div>

      <div class="row">
        <div class="col">

          <table class="table">
            <thead>
              <tr class="bg-dark text-light">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col">Detail</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
          <?php $no = 1; ?>
          <?php foreach($anggota as $a) : ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $a['nama'] ?></td>
                <td><?= $a['statuss'] ?></td>
                <td>
                  <a href="pages/detail.php?id=<?= $a['id']; ?>" class="btn btn-primary">Lihat</a>
                </td>
                <td>
                  <a href="pages/ubah.php?id=<?= $a['id']; ?>" class="btn btn-info">Ubah</a>
                  <a href="pages/hapus.php?id=<?= $a['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
          <?php $no++; ?>
          <?php endforeach; ?>
              <tr class="bg-dark text-light">
                <th colspan="4" class="text-end">Jumlah Anggota</th>
                <th><?= $no - 1; ?></th>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </section>
  <!-- AKHIR ANGGOTA -->


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