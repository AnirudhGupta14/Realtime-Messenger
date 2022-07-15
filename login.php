<?php
    session_start();
    if(isset($_SESSION['unique_id']))
    {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Messenger</title>
    <link rel="icon" type="image/x-icon" href="icon/icon.png">
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="https://kit.fontawesome.com/1906234422.js" crossorigin="anonymous"> </script>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Messenger</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text">This is an error message !!! </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>
</body>
</html>