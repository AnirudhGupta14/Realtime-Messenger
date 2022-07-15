<?php
    session_start();
    include "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password))
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "SELECT * FROM users WHERE email = '{$email}'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num > 0)
            {
                $row = mysqli_fetch_assoc($result);
                $status = "Active now";
                if(password_verify($password, $row['password']))
                {
                    $sql2 = "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "success";
                    }
                    else
                    {
                        echo "Something went wrong. Please try again!";
                    }
                }
                else
                {
                    echo "Invalid password";
                }
            }
            else
            {
                echo "$email - This email does not exist!";
            }
        }
        else
        {
            echo "$email is not a valid email!";
        }
    }
    else
    {
        echo "All input fields are required!";
    }
?>