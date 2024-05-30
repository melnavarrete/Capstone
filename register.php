<?php
  include "cfg/dbconnect.php";
  $name = $email = $pwd = $conf_pwd = "";
  $name_err = $email_err = $pwd_err = $conf_pwd_err = "";
  $error = false; 
  $err_msg = "";
  
  if (isset($_POST['submit'])){
  
      $name = trim($_POST['name']);
      $email = trim($_POST['email']);
      $pwd = trim($_POST['pwd']);
      $conf_pwd = trim($_POST['conf_pwd']);
      // validate fields
      if ($name == ""){
          $name_err = "Please enter your name";
          $error = true;
      }
  
      if ($email == ""){
          $email_err = "Please enter your email";
          $error = true;
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $email_err = "Invalid Email";
              $error = true;
          }
      else{   // check if email already registered
          $sql = "select * from users where email = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s",$email);
          $stmt->execute();
          $result = $stmt->get_result();
          if ($result->num_rows >0){
              $email_err = "Email already used";
              $error = true;
          } 
      }
  
      if ($pwd == ""){
          $pwd_err = "Password is mandatory";
          $error = true;
      }
      elseif (strlen($pwd) < 6) {
          $pwd_err = "Password must be atleast 6 characters";
          $error = true;
          }
      
      if ($conf_pwd == ""){
          $conf_pwd_err = "Confirm Password is mandatory";
          $error = true;
      }
  
      if ($pwd !="" && $conf_pwd !=""){
          if ($pwd != $conf_pwd){
              $conf_pwd_err = "Passwords do not match";
              $error = true;
          }
      }
  
        // all validations passed
        if (!$error){
          $pwd = password_hash($pwd, PASSWORD_DEFAULT);
  
          $sql = "insert into users (name, email, password) value(?, ?, ?)";
          try{
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("sss", $name, $email, $pwd);
              $stmt->execute();
              $succ_msg = "Registration successful. Please <a href='login.php'>login</a>";
              $name = $email ="";
          }
          catch(Exception $e){
              $error_msg = $e->getMessage();
          }
  
      }
  }
  include "top_menu.php";
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
  font-family: Arial, Helvetica, sans-serif;
}
:root {
  ...
  --width-inputs: 250px;
  --width-textarea: 450px;
  --height-textarea: 250px;
}

input[type=text] {
  width: 50%;
  padding: 12px 20px;
  border: 3px solid #157069;
  margin: 8px 0;
  box-sizing: border-box;
}
input[type=password] {
  width: 50%;
  padding: 12px 20px;
  border: 3px solid #157069;
  margin: 8px 0;
  box-sizing: border-box;
}
</style>
</head>
<body>
  <h1>Registration</h1>
  
  <div class="container">
      <div class="err-msg">
          <?php if (!empty($succ_msg)){ ?>
              <div class="alert alert-success">
                  <?= $succ_msg?>
              </div>
          <?php } ?>
  
          <?php if (!empty($error_msg)){ ?>
              <div class="alert alert-danger">
                  <?= $error_msg?>
              </div>
          <?php } ?>
  
      </div>
      <form action="" method="post">
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input
                  type="text"
                  class="form-control"
                  name="name"
                  id="name"
                  placeholder="Enter Name"
                  value="<?=$name?>"
              />
              <div class="input-err text-danger"><?= $name_err?></div>
              
          </div>
  
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                  type="text"
                  class="form-control"
                  name="email"
                  id="email"
                  placeholder="Enter Email"
                  value="<?=$email?>"
              />
              <div class="input-err text-danger"><?= $email_err?></div>
              
          </div>
  
          <div class="mb-3">
              <label for="pwd" class="form-label">Password</label>
              <input
                  type="password"
                  class="form-control"
                  name="pwd"
                  id="pwd"
                  placeholder="Enter Password"
              />
              <div class="input-err text-danger"><?= $pwd_err?></div>
              
          </div>
  
          <div class="mb-3">
              <label for="conf_pwd" class="form-label">Confirm Password</label>
              <input
                  type="password"
                  class="form-control"
                  name="conf_pwd"
                  id="conf_pwd"
                  placeholder="Confirm Password"
              />
              <div class="input-err text-danger"><?= $conf_pwd_err?></div>
              
          </div>
  
          <div class="form-check">
          <input
              class="form-check-input"
              name=""
              id=""
              type="checkbox"
              value="checkedValue"
              aria-label="Show Password"
              onclick = "showPwd()"
          />Show Password
          </div>
          
          <div class="reg-button text-center mt-3">
              <button
                  type="submit"
                  name = "submit"
                  class="btn btn-primary">
                  Register
              </button>
          </div>
          <p>Already Registered? Login <a href="login.php">here</a></p>
      </form>
  </div>
  <script>
      function showPwd(){
          var pwd = document.getElementById("pwd");
          var conf_pwd = document.getElementById("conf_pwd");
          if (pwd.type === "password")
              pwd.type = "text";
          else
          pwd.type = "password"
  
          if (conf_pwd.type === "password")
              conf_pwd.type = "text";
          else
              conf_pwd.type = "password"
      }
  </script>
  </body>
  </html>    
