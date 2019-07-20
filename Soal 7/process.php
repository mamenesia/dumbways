<?php

session_start();

 $mysqli = new mysqli('localhost', 'root', '', 'dumbways') or die(mysqli_error($mysqli));

 $name = "";
 $alamat ="";


 if(isset($_POST['submit'])){
   $name              = $_POST['nama'];
   $tempatLahir       = $_POST['tempat-lahir'];
   $tanggalLahir      = $_POST['birthdate'];
   $telepon           = $_POST['telepon'];
   $alamat            = $_POST['alamat'];
   $pendidikan        = $_POST['pendidikan'];
   $agama             = $_POST['agama'];
   $hobi              = $_POST['hobi']; 

   $mysqli->query("INSERT INTO biodata(full_name, date_of_birth, place_of_birth_id, phone_number, address, last_education, religion, hobby) VALUES ('$name', '$tanggalLahir', $tempatLahir, '$telepon', '$alamat', '$pendidikan', '$agama', '$hobi');") or die($mysqli->error());

   $_SESSION['message'] = 'Data Biodata Berhasil Disimpan!';
   $_SESSION['msg_type'] = 'success';

   header("location: index.php");

 }

 if(isset($_GET['delete'])) {
   $id = $_GET['delete'];
   $mysqli->query("DELETE FROM biodata WHERE id=$id") or die($mysqli->error());

   $_SESSION['message'] = 'Data Biodata Berhasil Dihapus!';
   $_SESSION['msg_type'] = 'danger';

   header("location: index.php");
 }

 if(isset($_GET['edit'])){
   $id   = $_GET['edit'];
   $result = $mysqli->query("SELECT * FROM biodata WHERE id=$id") or die($mysqli->error());
   if(count($result)==1){
    $row = $result->fetch_array();
    $name              = $row['full_name'];
    $tempatLahir       = $row['place_of_birth_id'];
    $tanggalLahir      = $row['date_of_birth'];
    $telepon           = $row['phone_number'];
    $alamat            = $row['address'];
    $pendidikan        = $row['last_education'];
    $agama             = $row['religion'];
    $hobi              = $row['hobby']; 

    header("location: index.php");
   }
 }

?>