<?php
include "top_menu.php";


$server = "localhost";
$uid = "root";
$pwd = "";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);

if ($conn->connect_error) {
    die("DB connection failed " . $conn->connect_error);
}

if (isset($_SESSIOM['name'])) {
	die("DB connection failed " . $conn ->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['check_out'])) {
            $ownedId = $_POST['Ownedid'];
            $userId = $_POST['Userid'];
}}
?>



  <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout Page</title>
<style>
  body {font-family: Arial, sans-serif;}
  .container {width: 50%; margin: auto; padding: 20px;}
  input[type="text"], input[type="email"] {width: 100%; margin-bottom: 20px; padding: 15px;}
  .btn {background-color: #157069; color: white; padding: 15px 20px; border: none; cursor: pointer; width: 25%;}
</style>
</head>
<body>

<?php
  $stmt = $conn->prepare("SELECT t.Titlesname, t.Image, t.Price, o.Ownedid
                            FROM users u
                            LEFT JOIN owned o ON u.id = o.Userid
                            INNER JOIN titles t ON o.Titlesid = t.Titlesid
                            LEFT JOIN cart ON o.Userid = cart.Userid AND cart.cart= 'y'
                            WHERE u.name = ?");
    // Bind the parameter to the placeholder in the SQL query
    $stmt->bind_param("s", $name);
 if ($stmt->execute()) {
    $result = $stmt->get_result();
    echo "<div class='grid container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='grid-item'>";
        echo "<h3>" . $row["Titlesname"] . "</h3>";
     	echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '"/>';
        echo "<p>Price: $" . $row["Price"] . "</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // Handle errors appropriately
    echo "Error: " . $stmt->error;
}

?>

                    </table> 
               </div> 
         </div> 

<div class="container">
  <form action="/cardpointe-processing-script" method="post">
	<h3> Card Information </h3>
   <div>
    <label for="name">Full Name: </label>
    <input type="text" id="completename" name="completename" placeholder="Name" required>
   </div>

   <div>
    <label for="Card Number">Card Number: </label>
    <input type="text" id="cardnumber" name="cardnumber" pattern="\d{16}" placeholder="Card Number" required>
   </div>

   <div>
    <label for="expDate">Expiration Date: </label>
    <input type="text" id="expDate" name="expDate" placeholder="Expiration Date" required>
   </div>

   <div>
    <label for="cvv">CVV: </label>
    <input type="text" id="cvv" name="cvv" pattern="\d{3}" placeholder="CVV number" required>
   </div>
	<h3> Delivery Information </h3> 
   <div>
    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="fullname" placeholder="Name" required>
   </div>

   <div>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email" required>
   </div>

   <div>
    <label for="adr">Address</label>
    <input type="text" id="adr" name="address" placeholder="Address" required>
   </div>

   <div>
    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="City" required>
   </div>

   <div>
    <label for="state">State</label>
    <input type="text" id="state" name="state" placeholder="State" required>
   </div>

   <div>
    <label for="zip">Zip</label>
    <input type="text" id="zip" name="zip" placeholder="Zipcode" required>
   </div>


    <!-- CardPointe hook-in here -->

    <input type="submit" value="Submit" class="btn">
  </form>


<?php
if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];

    $data = "Comment: $comment\n\n";

    $file = 'comments.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    echo "Comment has been added.";
}
?>

<form method="post">
    <label for="comment">Comment:</label>
    <textarea name="comment"></textarea><br>
    <placeholder="Please enter comments or concerns">
    <input type="submit" name="submit" value="Submit Comment">
</form>

</div>
</body>
</html>