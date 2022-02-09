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

  $nama = ucfirst(htmlspecialchars($data['nama']));
  $status = htmlspecialchars($data['status']);
  $nim = strtoupper(htmlspecialchars($data['nim']));
  $prodi = htmlspecialchars($data['prodi']);
  $semester = htmlspecialchars($data['semester']);
  $whatsapp = htmlspecialchars($data['whatsapp']);
  $foto = uploud();
  if( !$foto ) {
    return false;
  }

  $query = "INSERT INTO anggota VALUES 
    ('', '$nama', '$status', '$nim', '$prodi', '$semester', '$whatsapp', '$foto')
  ";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);

}

function uploud() {

  $namaFoto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  if( $error === 4 ) {
    echo "<script>
        alert('Silahkan pilih foto!');
        </script>";
    return false;
  }

  $validasi = ['jpg', 'jpeg', 'png'];
  $ekstensi = explode('.', $namaFoto);
  $ekstensi = strtolower(end($ekstensi));
  if( !in_array($ekstensi, $validasi) ) {
    echo "<script>
        alert('File bukan foto!');
        </script>";
    return false;
  }

  if( $ukuranFoto > 2500000 ) {
    echo "<script>
        alert('Ukuran foto maksimal 2.5MB!');
        </script>";
    return false;
  }

  $fotoBaru = uniqid();
  $fotoBaru .= '.';
  $fotoBaru .= $ekstensi;

  move_uploaded_file($tmpName, '../img/' . $fotoBaru);

  return $fotoBaru;

}


function hapus($id) {

  global $koneksi;

  mysqli_query($koneksi, "DELETE FROM anggota WHERE id = $id");

  return mysqli_affected_rows($koneksi);

}

function ubah($data) {

  global $koneksi;

  $id = $data['id'];
  $nama = ucfirst(htmlspecialchars($data['nama']));
  $status = htmlspecialchars($data['status']);
  $nim = strtoupper(htmlspecialchars($data['nim']));
  $prodi = htmlspecialchars($data['prodi']);
  $semester = htmlspecialchars($data['semester']);
  $whatsapp = htmlspecialchars($data['whatsapp']);
  $foto = uploud();
  if( !$foto ) {
    return false;
  }

  $query = "UPDATE anggota SET 
    nama = '$nama',
    statuss = '$status',
    nim = '$nim',
    prodi = '$prodi',
    semester = '$semester',
    whatsapp = '$whatsapp',
    foto = '$foto' WHERE id = $id
  ";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);

}


?>