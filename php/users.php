<?php
    session_start();
    include "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $result = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($result) == 0)
    {
        $output .= "No users are available to chat";
    }
    else
    {
        include "data.php";
    }
    echo $output;
?>

