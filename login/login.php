<?php
session_start();

if( isset($_SESSION['login']) ) {
  header("Location: ../index.php");
  exit;
}

require '../functions/functions.php';

if( isset($_POST['submit']) ) {

  $username = $_POST['username'];
  $password = $_POST['pass'];

  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

  if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      header("Location: ../index.php");
      exit;
    }
  }
  $err = true;

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

  <title>Login</title>
</head>

<body>

  <div class="container mt-4 pt-4 text-center">
    <div class="row">
      <div class="col">
        <h2>LOGIN</h2>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col">
        <a href="register.php" class="btn btn-success">Register</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mx-auto">
        <?php if( isset($err) ) : ?>
          <div class="alert alert-danger d-flex align-items-center" role="alert">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            Username / Password Salah!
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mx-auto">

        <form method="post" action="">
          <div class="mb-3">
            <label for="nama" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="pass" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>

      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>