<?php  

$koneksi = mysqli_connect('localhost', 'root', '', 'welcome');

function register($data) {

  global $koneksi;

  $username = strtolower(htmlspecialchars($data['username']));
  $nim = strtoupper($data['nim']);
  $email = htmlspecialchars($data['email']);
  $pass = mysqli_real_escape_string($koneksi, $data['pass']);
  $pass2 = mysqli_real_escape_string($koneksi, $data['pass2']);

  if( strlen($username) < 8 ) {
    echo "<script>
          alert('Username harus lebih dari 8 karakter!');
        </script>";
    return false;
  }

  $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
  if( mysqli_fetch_assoc($result) ) {
    echo "<script>
          alert('Username sudah ada!');
        </script>";
    return false;
  }

  if( $pass !== $pass2 ) {
    echo "<script>
          alert('Password Tidak Sama!');
        </script>";
    return false;
  }

  $pass = password_hash($pass, PASSWORD_DEFAULT);

  mysqli_query($koneksi, "INSERT INTO users VALUES
    ('', '$username', '$nim', '$email', '$pass');
  ");

  return mysqli_affected_rows($koneksi);

}

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
  $fotoLama = htmlspecialchars($data['fotoLama']);
  
  if( $_FILES['foto']['error'] === 4 ) {
    $foto = $fotoLama;
  } else {
    $foto = uploud();
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
