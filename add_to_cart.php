<?php
include "top_menu.php";

$server = "localhost";
$uid = "root";
$pwd = "";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);
//$ownedid = rand(10000, 999999);

if ($conn->connect_error) 
    die("DB connection failed ".$conn->connect_error);

if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $userid = $_SESSION['userid'];
    $titlesid = $_POST['titlesid']; 
    $ownedid = $_POST['ownedid']; 

// Check if the form has been submitted
if(isset($_POST['add_to_cart'])) {
      
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }



    // Prepare the SQL statement
    $sql = "INSERT INTO `cart`(`Titlesid`, `Ownedid`, `Userid`, `Owned`, `buy`, `sell`, `cart`) 
           VALUES (?,?,?,'n','n','n','y')";
 
    if ($stmt = $conn->prepare($sql)) {
   	$stmt->bind_param('sss', $titlesid, $ownedid, $userid);
    

//Execute the stmt
        if ($stmt->execute()) {
            echo "Added to Cart.";
        } else {
            echo "Error updating: " . $query->error;
        }

        // Closing the statement and connection
        $stmt->close();
    } 
else {
        echo "Error preparing statement: " . $conn->error;
    }    }


    $conn->close();
}
        //echo "<script> location.href='try.php'; </script>";
        exit;
?>
