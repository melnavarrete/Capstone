<?php
session_start();
include "cfg/dbconnect.php";
include "top_menu.php";
$email = $pwd = "";
$email_err = $pwd_err = "";
$error = false; 
$err_msg = "";

if (isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);

    if (isset($_POST['remember']))
        $remember = $_POST['remember'];
   
    // check email and password

    if ($email == ""){
        $email_err = "Email is mandatory";
        $error = true;
    }

    if ($pwd == ""){
        $pwd_err = "Password is mandatory";
        $error = true;
    }


     // all passed
     if (!$error){

        $sql = "select * from users where email = ?";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows >0){
                $row = $result->fetch_assoc();
                $stored_pwd = $row['password'];
                if (password_verify($pwd, $stored_pwd)){
                    // login successful
                    if (isset($_POST['remember'])){
                       
                        setcookie("remember_email", $email, time()+365*24*3600);
                        setcookie("remember", $remember, time()+365*24*3600);
                    }
                    else{
                        setcookie("remember_email", $email, time() - 365*24*3600);
                        setcookie("remember", $remember, time() - 365*24*3600);
                    }
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['userid'] = $row['id'];
                    header("location:index.php");
                }
                else{
                    $error_msg = "Incorrect Password";
                }

            }
            else {
                $error_msg = "Email id not registered";
            }

          
        }
        catch(Exception $e){
            $error_msg = $e->getMessage();
        }

    }
}

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




</body>
</html>
<h1>Login</h1>

<div class="container">
    <div class="err-msg">

        <?php if (!empty($error_msg)){ ?>
            <div class="alert alert-danger">
                <?= $error_msg?>
            </div>
        <?php } ?>

    </div>
    <form action="" method="post">
            <?php
             $display_email = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : $email;

             $checked = !empty($remember) ? "checked" : (isset($_COOKIE['remember']) ? "checked" : "");
            ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="text"
                class="form-control"
                name="email"
                id="email"
                placeholder="Enter email"
                value="<?=$display_email?>"
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
                placeholder="Enter password"
            />
            <div class="input-err text-danger"><?= $pwd_err?></div>
           
        </div>

       <div class="form-check">
        <input
            class="form-check-input"
            name="remember"
            id=""
            type="checkbox"
            value="checkedValue"
            aria-label="Remember Me"
            <?= $checked?>
        />Remember Me
       </div>
       
        <div class="reg-button text-center mt-3">
            <button
                type="submit"
                name = "submit"
                class="btn btn-primary">
                Login
            </button>
        </div>
        <p>Not Registered? Click <a href="register.php">here</a> to register</p>
    </form>
</div>
</body>
</html>