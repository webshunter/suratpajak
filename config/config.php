<?php
// set default timezone
date_default_timezone_set("ASIA/JAKARTA");

// panggil file parameter koneksi database
require_once "database.php";

// koneksi database
$mysqli = new mysqli($con['host'], $con['user'], $con['pass'], $con['db']);
// $mysqli2 = new mysqli($con2['host2'], $con2['user2'], $con2['pass2'], $con2['db2']);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>