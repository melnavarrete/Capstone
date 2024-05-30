<?php
$server = "localhost";
$uid = "root";
$pwd = "";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);

if ($conn->connect_error)
    die("DB connection failed ".$conn->connect_error);


//try {
//    $conn = new PDO("mysql:host=$servername;dbname=msm", $userid, $pwd);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
//} catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}
?>