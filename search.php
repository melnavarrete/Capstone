<?php
include "top_menu.php";


$server = "localhost";
$uid = "root";
$pwd = "";
$dbname = "msm";

$connection = mysqli_connect($server, $uid, $pwd, $dbname) 
                or die("Error " . mysqli_error($connection)); 

if ($connection->connect_error)
    die("DB connection failed ".$conn->connect_error);


  $output = '';

  if(isset($_POST['Search'])) {
    $Search = $_POST['Search'];



    $query = mysqli_query($connection, "SELECT * FROM titles WHERE Titlesname LIKE '%$Search%' OR Genre LIKE '%$Search%' OR format LIKE '%$Search%'") or die ("Could not search");
    $count = mysqli_num_rows($query);
    
    if($count == 0){
      $output = "No titles found";

    }else{

      while ($row = mysqli_fetch_array($query)) {

        $Titlesname = $row ['Titlesname'];
        $Genre = $row ['Genre'];
        $format = $row ['format'];
	$Price = $row ['Price'];

        $output .=$output .= '<div>';
$output .= '<div>Name: ' . $row["Titlesname"] . '</div>';
$output .= '<div>Genre: ' . $row["Genre"] . '</div>';
$output .= '<div>Length: ' . $row["format"] . '</div>';
$output .= '<div>Price: $' . $row["Price"] . '</div>';
$output .= '</div>';
echo $output;
      }

    }
  }

  ?>