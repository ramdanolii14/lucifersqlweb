<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "hengker";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die('tidak bisa koneksi ke database');
}
?>