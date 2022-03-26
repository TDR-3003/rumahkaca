<?php
include 'conn.php';
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');
// var_dump($_GET);


$api_key = $_GET['api_key'];
$value = $_GET['value'];

// echo $api_key;
// echo "<br>";
// echo $value;
// echo "<br>";

$ceks = query("SELECT * FROM sensors WHERE api_key = '".$api_key."' ");
// var_dump($ceks);
foreach($ceks as $cek):
if($api_key == $cek['api_key']){
    // echo "ada sensor";
    // echo "<br>";
    // echo $cek['type'];
    if($cek['type'] == 'relay'){
        if($cek['value'] == 1){
            echo "on";
        }else{
            echo "off";
        }
    }else{
        $sql = "UPDATE sensors SET value = '$value', updated_at = '$wktu' WHERE api_key = '".$api_key."' ";
        if(mysqli_query($conn,$sql)){
            echo "Berhasil";
        }else{
            echo "gagal update";
        }
    }
}else {
    echo "tidak ada sensor";
    echo "<br>";
}
endforeach;



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