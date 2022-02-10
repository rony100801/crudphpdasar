<?php
session_start();

if( isset($_SESSION['admin']) || isset($_SESSION['user']) ) {
  if( $_SESSION['admin'] ) {
    header("Location: ../index.php");
    exit;
  } else if($_SESSION['user']) {
    header("Location: ../user.php");
    exit;
  }
}

require '../functions/functions.php';

if( isset($_POST['submit']) ) {

  if( register($_POST) > 0 ) {
    echo "<script>
          alert('Berhasil Register!');
          document.location.href = 'login.php';
        </script>";
  } else {
    mysqli_error($koneksi);
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

  <title>Registrasi</title>
</head>

<body>

  <div class="container mt-4 pt-4 text-center">
    <div class="row">
      <div class="col">
        <h2>REGISTRASI</h2>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col">
        <a href="login.php" class="btn btn-success">Login</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mx-auto">

        <form method="post">
          <div class="mb-3">
            <label for="nama" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" aria-describedby="emailHelp" name="nim" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="pass2" required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Register</button>
        </form>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>