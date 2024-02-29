<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="userlogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
</head>
<body>
    <a href="adminlogin.php" class="adminlogin">Admin Login</a>
    <section class="formclass">
        <img src="pic2.jpeg" width="400px" height="600px">
        <form action="login.php" class="form_design" method="post">
            <h1>LOGIN</h1>
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pass" placeholder="Password">
            <!-- <input type="submit" value="Login"> -->
            <button>Login</button>
            <p>Don't have an account?</p>
            <a href="registration.php">Register</a>
            <!-- <input type="submit" value="Register"> -->
        </form>
    </section>


    
</body>
</html>