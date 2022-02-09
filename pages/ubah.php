<?php

require '../functions/functions.php';

$id = $_GET['id'];
$anggota = query("SELECT * FROM anggota WHERE id = $id")[0];

if (isset($_POST['kirim'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('Data berhasil Diubah!');
          document.location.href = '../index.php#anggota';
        </script>";
  } else {
    echo "<script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'tambah.php';
        </script>";
  }
}


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
            <a class="nav-link btn btn-success" href="tambah.php">Tambah Data</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

  <!-- TAMBAH DATA -->
  <section id="tambah">
    <div class="container mt-5 pt-4 mb-5">

      <div class="row">
        <div class="col text-center">
          <h2 class="display-6">Ubah Data <?= $anggota['nama'] ?></h2>
        </div>
      </div>

      <div class="row d-flex">
        <div class="col-md-5 mx-auto">

          <form method="POST" enctype="multipart/form-data">

          <input type="hidden" value="<?= $id ?>" name="id">

            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="nama" class="form-control" id="nama" name="nama" required autocomplete="off" value="<?= $anggota['nama'] ?>">
              <div id="emailHelp" class="form-text">Silahkan memasukkan nama lengkap anda.</div>
            </div>

            <div class="input-group mb-3">
              <!-- <label class="input-group-text" for="inputGroupSelect01">Program Studi</label> -->
              <select class="form-select" id="inputGroupSelect01" name="status" required autocomplete="off">
                <option value="<?= $anggota['statuss'] ?>" selected>Status <?= $anggota['statuss'] ?></option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Anggota">Anggota</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input type="nama" class="form-control" id="nim" name="nim" required autocomplete="off" value="<?= $anggota['nim'] ?>">
              <div id="emailHelp" class="form-text">Silahkan memasukkan nim anda.</div>
            </div>

            <div class="input-group mb-3">
              <!-- <label class="input-group-text" for="inputGroupSelect01">Program Studi</label> -->
              <select class="form-select" id="inputGroupSelect01" name="prodi" required autocomplete="off">
                <option value="<?= $anggota['prodi'] ?>" selected><?= $anggota['prodi'] ?></option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Teknik Informatika">Teknik Informatik</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
              </select>
            </div>

            <div class="input-group mb-3">
              <!-- <label class="input-group-text" for="inputGroupSelect01">Semester</label> -->
              <select class="form-select" id="inputGroupSelect01" name="semester" required autocomplete="off" value="<?= $anggota['nama'] ?>">
                <option value="<?= $anggota['semester'] ?>" selected>Semester <?= $anggota['semester'] ?></option>
                <?php for ($i = 1; $i <= 8; $i++) : ?>
                  <option value="<?= $i ?>"><?= $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="whatsapp" class="form-label">No WhatsApp</label>
              <input type="nama" class="form-control" id="whatsapp" name="whatsapp" required autocomplete="off" value="<?= $anggota['whatsapp'] ?>">
              <div id="emailHelp" class="form-text">Silahkan memasukkan no whatsapp yang aktif.</div>
            </div>

            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto""><br>
              <img src="../img/<?= $anggota['foto'] ?>" alt="<?= $anggota['foto'] ?>" width="80">
            </div>


            <button type="submit" class="btn btn-success" name="kirim">Kirim</button>
          </form>

        </div>
      </div>
    </div>
  </section>
  <!-- AKHIR TAMBAH DATA -->


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