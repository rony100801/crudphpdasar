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
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Visi & Misi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Struktur Organisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Anggota</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-success" href="">Tambah Data</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- AKHIR NAVBAR -->

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
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Prodi</th>
                <th scope="col">Aksi</th>
                <th scope="col">Hapus</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Rony Setiawan</td>
                <td>Teknologi Informasi</td>
                <td>
                  <a href="" class="btn btn-primary">Detail</a>
                  <a href="" class="btn btn-info">Ubah</a>
                </td>
                <td>
                  <a href="" class="btn btn-danger">Hapus</a>
                </td>
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