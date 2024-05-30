<?php
include 'cfg/dbconnect.php'; 
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
session_start() 

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Pinyon+Script&display=swap" rel="stylesheet">
<style>
body, html {
  height: 100%;
  margin: 0;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("Color.jpg");
  height: 30%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}



.overlay {
  height: 100%;
  width: 100%;
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
  position: relative;
  top: 10%;
  width: 100%;
  text-align: center;
  margin-top: 20px;
position: relative;
overflow-y: auto;
text-align: center;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}


.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
input[type=search] {
  width: 25%;
  padding: 12px 20px;
  border: 3px solid #157069;
  margin: 8px 0;
  box-sizing: border-box;
}

  .btn {background-color: #157069; color: white; padding: 15px 20px; border: none; cursor: pointer; width: 15%;}


</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
    <p style="font-size: 80px; text-align: center; color: White; font-family: Pinyon Script, cursive">Must See Moments</p>
  </div>
</div>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
                <a href="index.php">Home</a>
                <?php if (isset($_SESSION['name'])){ ?>
                    <div class="user">
                        <span>Welcome <?= $_SESSION['name']?></span>
			<p>
			<a href="logout.php">Logout</a>
                        <a href="owned.php">My Titles</a>
                        <a href="wishlist.php">My Wishlist</a>
                        <a href="try.php">Explore and Browse for Sale</a>
                        <a href="explore.php">Find Suggestions</a>
                        <a href="Cart.php">Cart</a>
                        <a href="Checkout.php">Checkout</a>
                        <a href="statistics.php">Sales Statistics</a>
                        <a href="documents.php">Documents</a>
               <?php } else { ?>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
                <a href="landing.php">About Us</a>
                <?php } ?>
  </div>
</div>

                    </div>
		    <form class="d-flex" role="search" form action =  "search.php" method="POST" >
      			<input class="form-control me-2" type="search" placeholder="Search" name="Search" aria-label="Search" value="">
     			<button class="btn btn-outline-dark" type="submit">Search</button >
   		    </form>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("myNav").style.display = "block";
}

function closeNav() {
  document.getElementById("myNav").style.display = "none";
}
</script>
     
</body>
</html>
