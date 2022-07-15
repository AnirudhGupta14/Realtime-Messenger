<?php
    session_start();
    if(!isset($_SESSION['unique_id']))
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
        <section class="users">
            <header>
                <?php 
                    include "php/config.php";
                    $sql = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_assoc($result);
                    }
                ?>
                <div class="content">
                    <img src="images/<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']. " " . $row['lname']?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $_row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <!-- <a href="#">
                    <div class="content">
                        <img src="#" alt="">
                        <div class="details">
                            <span>Anirudh Gupta</span>
                            <p>this is a test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a> -->
            </div>
        </section>
    </div>
<script src="javascript/users.js"></script>
</body>
</html>