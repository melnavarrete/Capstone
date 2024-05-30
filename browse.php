Updates to keyboard shortcuts … On Thursday, August 1, 2024, Drive keyboard shortcuts will be updated to give you first-letters navigation.Learn more
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
<h1>Titles</h1>

          <br /><br /> 
          <div class="container" style="width:75%;"> 
               <h3 align="center">Your Movie and TV Library</h3><br /> 
               <div class="table-responsive"> 
                    <table class="table table-bordered"> 

<?php
    // Execute the prepared statement and check for errors
    // Assuming $conn is a valid database connection object
    // Use placeholders in the SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT t.Titlesname, t.image, t.ProductionCompany, t.Price, t.Genre, t.Minutes, t.`format`, o.Ownedid, co.Userid
                            FROM users u
                            INNER JOIN owned o ON u.id = o.Userid
                            INNER JOIN titles t ON o.Titlesid = t.Titlesid
                            INNER JOIN cart ON o.Userid = cart.Userid AND cart.sell= 'y'
                            WHERE u.name != ?");
    // Bind the parameter to the placeholder in the SQL query
    $stmt->bind_param("s", $name);
 if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo "<div style='display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='grid-item'>";
        echo "<h3>" . $row["Titlesname"] . "</h3>";
     	echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '"/>';
        echo "<p>Price: $" . $row["Price"] . "</p>";
        echo "<p>Production Studio: " . $row["ProductionCompany"] . "</p>";
        echo "<p>Genre: " . $row["Genre"] . "</p>";
        echo "<p>Length: " . $row["Minutes"] . " minutes</p>";
	 ?>
        <form action="add_to_cart.php" method="post">
            <input type="hidden" name="Ownedid" value="<?php echo $row['Ownedid']; ?>">
            <input type="hidden" name="Userid" value="<?php echo $name; ?>">
            <button type="submit" name="add_to_cart">Add to Cart</button>
        </form>
        <form action="add_to_wishlist.php" method="post">
            <input type="hidden" name="Ownedid" value="<?php echo $row['Ownedid']; ?>">
            <input type="hidden" name="Userid" value="<?php echo $name; ?>">
            <button type="submit" name="add_to_wishlist">Add to Wishlist</button>
        </form>
        <form action="checklist.php" method="post">
            <input type="hidden" name="Ownedid" value="<?php echo $row['Ownedid']; ?>">
            <input type="hidden" name="Userid" value="<?php echo $name; ?>">
            <button type="submit" name="checkout">Add to Cart</button>
        </form>
        <?php
        echo "</div>";
    }
    echo "</div>";
} else {
    // Handle errors appropriately
    echo "Error: " . $stmt->error;
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
