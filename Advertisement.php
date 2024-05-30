<?php
include "top_menu.php";

$server = "localhost";
$uid = "root";
$pwd = "0987";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);
$ownedid = rand(10000, 999999);

if ($conn->connect_error) {
    die("DB connection failed " . $conn->connect_error);
}

if (isset($_SESSION['name'])) {

    if (isset($_POST['Advertisement'])) {
        $Titlesid = 'urn:doi:10.5240:F9TD4-OPE8-82F5-595G-LANO';
        $sql = "INSERT INTO `cart`(`Titlesid`, `Ownedid`, `Userid`, `Owned`, `buy`, `sell`, `cart`) 
                VALUES (?,?,?,'n','n','n','y')";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('sss', $Titlesid, $ownedid, $userid);
            if ($stmt->execute()) {
                echo "Added to Cart.";
                // Redirect or further processing here
            } else {
                echo "Error updating: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
        $conn->close();
    }
    //echo "<script> location.href='explore.php'; </script>"; 
}
exit;
?>
