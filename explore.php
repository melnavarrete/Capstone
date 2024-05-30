<?php
include "top_menu.php";


$server = "localhost";
$uid = "root";
$pwd = "0";
$dbname = "msm";
$conn = new mysqli($server, $uid, $pwd, $dbname);

if ($conn->connect_error)
    die("DB connection failed ".$conn->connect_error);




?>
<body>
<h1>Explore</h1>

<?php
   $name = $_SESSION['name'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 
<!DOCTYPE html> 
<html> 
     <head>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
     </head> 
     <body> 
          <br ><br /> 

  
	   
<form action="Advertisement.php" method="post">
    <button type="submit" name="Advertisement" style="border: none; background: none; padding: 0;">
        <img src="mvimg/Attackof the Killer Referigerator.jpg" alt="Submit Advertisement" style="height:200px; width:200px;">
    </button>
</form>




		<h5>advertisement</h5>
               </div> 
               <h3 align="center">Find Suggested Titles</h3><br /> 
          <div class="container"> 


<h1>   </h1>

               <div class="table-responsive"> 
                    <table class="table table-bordered"> 


<h1>  </h1>
<iframe width="1000" height="1000" src="https://www.flixfind.com/" frameborder="0" allowfullscreen></iframe>
 			 
           
                    </table> 
               </div> 
          </div> 
     </body> 
</html> 



     