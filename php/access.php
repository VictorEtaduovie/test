<?php

    if(isset($_SESSION['user']))
    {
     $pass = $_SESSION['user'];

     $sql = "SELECT * FROM users WHERE email='$pass'";

               $res = mysqli_query($conn, $sql);
               if($res==TRUE)
               {
                   $count = mysqli_num_rows($res);
                   if($count==1)
                   {
                       
                       
                   }
                   else
                   {
                       
                        header('location: k.php');
                   }

               }
               else
               {
                    echo "$pass ";
                   $_SESSION['no-id'] = "<div class='error'></div>";
                   header('location: logojut.php');
                       
               }   
   }
   else
   {
        header('location: lkhgogout.php');
           
   }

?>   
