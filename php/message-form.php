<?php 
  
  include_once "php/config.php";
  include "php/check.php";
  include "php/access.php";
?>
<?php
    $id = $_GET['id'];


?>
<form action="" method="POST" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id?>" hidden>
        <input type="text" class="incoming_id" name="outgoing_id" value="<?php echo $pass?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        
        <input type="submit" name="submit" class="fab fa-telegram-plane">
      </form>
<?php
    if(isset($_POST['submit']))
    {
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        


        if($message=='')
        {
            header('location: php/message-form.php');

        }
        else
        {
            
            $sql = "INSERT INTO messages SET
            outgoing_msg_id = $outgoing_id,
            incoming_msg_id = $incoming_id,
            msg = '$message'
            
            ";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE)
            {
            $_SESSION['user'] = $pass;
            
                header('location: messages-form.php');
            }
        }
    }
?>