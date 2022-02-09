<?php  

$koneksi = mysqli_connect('localhost', 'root', '', 'welcome');

function query($query) {

  global $koneksi;
  $rows = [];
  $result = mysqli_query($koneksi, $query);
  while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }

  return $rows;

}


?>