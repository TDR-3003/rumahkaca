<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');

// $nama = $_GET['nama'];
// $temp = $_GET['temp'];
// $hum = $_GET['hum'];

  var_dump($_GET);

// $sql = "UPDATE tb_sensor SET temp = '$temp', hum = '$hum', updated_at = '$wktu' WHERE nama = '".$nama."' ";
// if(mysqli_query($conn,$sql)){
//     //echo "Berhasil";
// }else{
//     echo "gagal update";
// }

// $res = " INSERT INTO tb_log_sensor (nama, temp, hum, updated_at) VALUES ('$nama','$temp','$hum','$wktu') ";
// if(mysqli_query($conn,$res)){
//     //echo "Berhasil";
// }else{
//     echo "gagal tambah";
// }

// $relays = query("SELECT relay FROM tb_sensor WHERE nama = '".$nama."' ");
// foreach($relays as $relay):
//     echo $relay['relay'];
// endforeach;

// $conn -> close();