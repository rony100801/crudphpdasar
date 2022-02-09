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

function tambah($data) {

  global $koneksi;

  $nama = htmlspecialchars($data['nama']);
  $nim = htmlspecialchars($data['nim']);
  $prodi = htmlspecialchars($data['prodi']);
  $semester = htmlspecialchars($data['semester']);
  $whatsapp = htmlspecialchars($data['whatsapp']);
  $foto = htmlspecialchars($data['foto']);

  $query = "INSERT INTO anggota VALUES 
    ('', '$nama', '$nim', '$prodi', '$semester', '$whatsapp', '$foto')
  ";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);

}

function hapus($id) {

  global $koneksi;

  mysqli_query($koneksi, "DELETE FROM anggota WHERE id = $id");

  return mysqli_affected_rows($koneksi);

}


?>