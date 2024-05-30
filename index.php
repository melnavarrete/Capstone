<?php
include "top_menu.php";
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.item1 {
  grid-column-start: 1;
  grid-column-end: 2;
}
.item2 {
  grid-column-start: 2;
  grid-column-end: 3;
}
.item3 {
  grid-column-start: 3;
  grid-column-end: 4;
}
.item4 {
  grid-row-start:2;
  grid-column-start: 1;
  grid-column-end: 2;
}
.item5 {
  grid-row-start:2;
  grid-column-start: 2;
  grid-column-end: 3;
}
.item6 {
  grid-row-start:2;
  grid-column-start: 3;
  grid-column-end: 4;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #000000;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  gap: 10px;
}
</style>
</head>
<body>

<h1>Welcome to Must See Moments</h1>
<p>  </p>
<div class="grid-container">
  <div class="item1"><div class="container">
  <img src="anime1.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Anime</div>
  </div>
</div></div>
  <div class="item2"><div class="container">
  <img src="cheetah.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Nature Documentaries</div>
  </div>
</div></div>
  <div class="item3"><div class="container">
  <img src="carchase.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Action Movies</div>
  </div>
</div></div>  
  <div class="item4"><div class="container">
  <img src="scifi2.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Science Fiction</div>
  </div>
</div>
</div>
  <div class="item5"><div class="container">
  <img src="standup.jpg" alt="Avatar" class="image" style="width:100%" alt=" Stanimira dimitrova, CC BY-SA 4.0 <https://creativecommons.org/licenses/by-sa/4.0>, via Wikimedia Commons">
  <div class="middle">
    <div class="text">Comedy</div>
  </div>
</div></div>
  <div class="item6">
<div class="container">
  <img src="lecture.jpg" alt="Avatar" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Education and Mental Health</div>
  </div>
</div>
  </div>
</div>
  
</body>
</html>


</body>
</html>