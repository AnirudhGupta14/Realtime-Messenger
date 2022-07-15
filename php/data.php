<?php
    while($row = mysqli_fetch_assoc($result))
    {
        $offline = "";
        if($row['status'] == "Offline now")
        {
            $offline = "offline";
        }
        else
        {
            $offline = "";
        }

        $output .= '<a class="user_list_info" href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="images/'. $row['image'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>' . '' .'</p>
                    </div>
                    </div>
                    <div class="status-dot' . $offline. '"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>
