<?php
session_start();

if( !isset($_SESSION['login']) ) {
  header("Location: login/login.php");
  exit;
}

require '../functions/functions.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
  echo "<script>
          alert('Data berhasil Dihapus!');
          document.location.href = '../index.php';
        </script>";
} else {
  echo "<script>
          alert('Data gagal Dihapus!');
          document.location.href = '../index.php';
        </script>";
}

?>