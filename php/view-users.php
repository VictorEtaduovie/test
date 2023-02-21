<?php 
  
  include_once "php/config.php";
  include "php/check.php";
  include "php/access.php";
?>

<?php
    $sql = "SELECT * FROM users";
                    
                    
    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $uid = $row['unique_id'];
                $first_name = $row['fname'];
                $last_name = $row['lname'];
                $full_name = $first_name.' '.$last_name;
                ?>
                    <a href="chat.php?id=<?php echo $uid?>">
                        <div class="content">
                            <img src="php/images/1655560324book-pic.jpg" alt="">
                            <div class="details">
                                <span><?php echo $full_name?></span>
                                <p>This is a message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>
                <?php
            }
           
        }
         else
            {
                ?>
                <div class="content">
                    <?php echo 'There is no user at the moment';?>
                </div>
                <?php
            }
    }
?>