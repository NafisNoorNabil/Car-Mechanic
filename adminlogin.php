

<?php
session_start();


if (isset($_SESSION['admin_id'])) {
  header("Location: admin_dashboard.php");
  exit();
}

if (isset($_POST['email']) && isset($_POST['pass'])) {

  $email = $_POST['email'];
  $password = $_POST['pass'];


  if ($email == "admin@gmail.com" && $password == "123") {
    $_SESSION['admin_id'] = 1;
    header("Location: adminhome.php");
    exit();
  } else {

    $error_message = "Invalid login credentials. Please try again.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
    <a href="userlogin.php" class="adminlogin">User Login</a>
    
    <section class="formclass">
        <img src="pic2.jpeg" width="400px" height="600px">
        
        <form  class="form_design" method="post">
            <h1>ADMIN LOGIN</h1>


            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <!-- <input type="submit" value="Login"> -->
            <button>Login</button>


            <!-- <input type="submit" value="Register"> -->
        </form>
    </section>


    
</body>
</html>