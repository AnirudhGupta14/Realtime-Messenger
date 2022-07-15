<?php
    session_start();
    include "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = "SELECT * FROM users WHERE email = '{$email}'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num > 0)
            {
                echo "$email - This email already exist!";
            }
            else
            {
                if(isset($_FILES['image']))
                {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true)
                    {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../images/".$new_img_name))
                        {
                            $status = "Active now";
                            $random_id = rand(time(), 100000000);
                            $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO users (unique_id, fname, lname, email, password, image, status) VALUES ('{$random_id}', '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')";
                            $result = mysqli_query($conn, $sql);
                            if($result)
                            {
                                $_SESSION['unique_id'] = $random_id;
                                echo "success";
                            }
                            else
                            {
                                echo "Something went wrong. Please try again!";
                            }
                        }
                        else
                        {
                            echo "Something went wrong. Please try again!";
                        }
                    }
                    else
                    {
                        "Please upload an image file - jpeg, png, jpg format";
                    }
                }
                else
                {
                    "Please upload an image";
                }
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