<?php
require_once('functions.php');
session_start();
$return = false;

if(isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['password']);
    $return = login($user, $pass);
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Refresh:0");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Simples sistema de login com PHP e JSON">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Aplikasi penjualan Project JWD 2023</title>
</head>

<body>
    <div id="page">
         
        <h1>APLIKASI PENJUALAN</h1>
        <!--
        /*
        <?php
        if(!empty($_SESSION['user'])):
    ?>
        <p>
            Logged: <?php //echo $_SESSION['user'] ?> <br />
            Type user: <?php// echo $_SESSION['type_user'] ?>
        </p>
        <a href="users.php">View users</a>

        <form action="index.php" method="post">
            <input type="submit" name="logout" value="Logout" />
        </form>
        <?php
        else:
    ?>
     -->
        <form action="index.php" method="post">
            <input type="email" name="user" placeholder="email@test.com" required /><br>
            <input type="password" name="password" placeholder="******" required /><br>
            <input type="submit" name="login" value="Login" />
        </form>
        <?php
            if($return){
                echo $return;
            }
        ?>
        <p>
           Info access hubungi admin
        </p>
        <p>
            <bold>Harap login dulu !!! </bold> 
        </p>
        <?php
    endif;
    ?>
        <div class="container">
    <h1 class="page-header text-center">Hello Selamat datang di aplikasi penjualan</h1>
    
</div>

        <p align="center">untuk tugas jwd &copy 2023</a>
        </p>
    </div>

</body>

</html>