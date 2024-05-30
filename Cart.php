
<?php
include "top_menu.php";


$server = "localhost";
$uid = "root";
$pwd = "";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);

if ($conn->connect_error)
    die("DB connection failed ".$conn->connect_error);
?>
<?php
// Start the session at the beginning of the script


// Check if the session variable 'name' is set
if(isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    ?>


<!DOCTYPE html> 
<html> 
     <head>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
     </head> 
     <body> 
<body>
          <br /><br /> 
          <div class="container" style="width:75%;"> 
               <h3 align="center">My Shopping Cart</h3><br /> 
               <div class="table-responsive"> 
                    <table class="table table-bordered"> 


<?php

                $stmt = $conn->prepare("SELECT  t.Titlesname, t.Image, t.ProductionCompany, t.Price, t.Genre, t.Minutes, t.format, c.Userid, c.Ownedid
			    FROM cart c
                            INNER JOIN titles t ON c.Titlesid = t.Titlesid
			    INNER JOIN users u ON c.Userid = u.id
			    WHERE c.cart = 'y'
			    AND u.name = ?");
                // Bind the parameter to the placeholder in the SQL query
                $stmt->bind_param("s", $name);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    echo "<div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(25%, 25%));'>";
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='grid-item'>";
                            echo "<h3>" . $row["Titlesname"] . "</h3>";
     			    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '"/>';
                            echo "<p>Price: $" . $row["Price"] . "</p>";
                            echo "<p>Production Studio: " . $row["ProductionCompany"] . "</p>";
                            echo "<p>Genre: " . $row["Genre"] . "</p>";
                            echo "<p>Length: " . $row["Minutes"] . " minutes</p>";
                            ?>

				<form action="Checkout.php">
    					<input type="submit" value="Checkout" />
				</form>

                            <?php
                            echo "</div>";
                        }
                    } else {
                        // Handle errors appropriately
                        echo "Error: " . $stmt->error;
                    }

    // Execute the prepared statement and check for errors
    // Assuming $conn is a valid database connection object
    // Use placeholders in the SQL query to prevent SQL injection
}
} else {
    echo "Please log in.";
}

?>


                    </table> 
               </div> 
          </div> 
     </body> 
</html> 

