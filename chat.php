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
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <?php 
                    include "php/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = "SELECT * FROM users WHERE unique_id = {$user_id}";
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

            </header>
            <div class="chat-box">
                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div> -->
                <!-- <div class="chat incoming">
                    <img src="#" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div> -->
            </div>
            <form action="#" class="typing-area">
                <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
<script src="javascript/chat.js"></script>
</body>
</html>