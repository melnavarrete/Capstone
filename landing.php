<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Pinyon+Script&display=swap" rel="stylesheet">


<style>
body {
  font-family: 'Lato', sans-serif;
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url("Color.jpg");
  height: 50%;
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

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
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

/*Styling the rest of the page*/
body {
  font-family: Arial, Helvetica, sans-serif;
  padding: 0px;
  background-color: #FFF8DC;
  
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #FFF8DC;
  display: inline;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
/* Style the header */
.header {
  padding: 30px;
  text-align: center;
  font-size: 35px;
}


/* Container for flexboxes */
.row {
  display: -webkit-flex;
  display: flex;
}

/* Create three unequal columns that sits next to each other */
.column {
  padding: 10px;
  height: 300px; 
  text-align: center;

}

/* Left and right column style*/
.column.side {
   -webkit-flex: 1;
   -ms-flex: 1;
   flex: 1;
   text-align: center;
}

/* Middle column style */
.column.middle {
  -webkit-flex: 2;
  -ms-flex: 2;
  flex: 2;
  text-align: center;
}

/* footer style */
.footer {
  padding: 10px;
  text-align: center;
}


/* three columns stack on top instead of next to each other */
@media (max-width: 600px) {
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

</style>
</head>
<body>

<div class="hero-image">
  <div class="hero-text">
    <p style="font-size: 100px; text-align: center; color: White; font-family: Pinyon Script, cursive">Must See Moments</p>
  </div>
</div>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
<p style="font-size: 100px; text-align: center; color: White; font-family: Pinyon Script, cursive">Must See Moments</p>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
  </div>
</div>



<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>

<div class="header">
<p> <h3> About Us:</h3>
<h5>Put the purchasing power back in your control.
    We aim to empower all the movie fanatics with endless moments of nastalgia from vintage talkies to colorless musicals. Lastly want to
    leave our users with an impression that our platform is a place to build a community with others who are just as invested into drama, romance,
    action and thrillers just as much as you. For the moments you must see Must See Moments has the perfect view.
</h5></p>
<p><h3>Our Purpose</h3>
<h5> Streaming is so impersonal, renting is very temorary. Must See Moments was created to meet the needs of users who want original, timeless,
    movies and tv shows they can keep. Collect a piece of history; savor the moments you must see with us. Let us take you to the movies,
    let us help you find your movie buddy.</h5></p>

<div class="row">
  <div class="column side" ><img width=250 src="stack_of_dvds.jpg" alt="https://perchance.org/ai-photo-generator" style=""></img> <p></p><img width="250" src="projector.jpg" alt="https://perchance.org/ai-photo-generator" style=""></imgsrc></div>
  <div class="column middle" ><iframe src="https://commons.wikimedia.org/wiki/File:Limite_(1931).webm?embedplayer=yes" width="480" height="360" frameborder="0" ></iframe></div>

  <div class="column side" ><img width=250 src="movieathome.jpg" alt="https://perchance.org/ai-photo-generator" style=""></img><p></p><img width="250" src="1950stelevision.jpg" alt="Nord68 / Wikimedia Commons, CC BY-SA 4.0 <https://creativecommons.org/licenses/by-sa/4.0>, via Wikimedia Commons" style=""></imgsrc></div>

</div>

<div class="footer">
<h3>   </h3>
    <a class="navbar-brand" href="#"><img width=150 src="bluray.jpg"></i></a>
    <a class="navbar-brand" href="#"><img width=150 src="VHS_logo.jpg"></i></a>
    <a class="navbar-brand" href="#"><img width=150 src="Video_CD_logo.jpg"></i></a>
    <a class="navbar-brand" href="#"><img width=150 src="Movie-reel.jpg"></i></a>
</div>
     
</body>
</html>
