<?php
    include('../config/constants.php');
    include('../partials-front/login-check.php');
    include('../partials-front/access-control.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
     <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
     <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css"> 
    <title>Your Data Base</title>
    
</head>
<body>

<?php 
               
                $id = $_GET['id'];

                
                $sql = "SELECT * FROM tbl_user WHERE id=$id";

                $res = mysqli_query($conn, $sql);
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);
                    if($count==1)
                    {
                        $row=mysqli_fetch_assoc($res);

                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $gender = $row['gender'];
                        $date_of_birth = $row['date_of_birth'];
                        $country = $row['country_of_residence'];
                        $state = $row['state_of_residence'];
                        $email = $row['email'];
                        $phone = $row['phone_number'];
                        
                    }
                    else
                    {
                        echo "user not available";
                        header("location:".SITEURL.'logout');
                    }

                }
            
            
                
            ?>



    <div class="container-two">
        <div class="body"></div>
        <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; 
                    unset($_SESSION['update']); 
                }
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; 
                    unset($_SESSION['add']); 
                }
                 if(isset($_SESSION['fill']))
                {
                    echo $_SESSION['fill']; 
                    unset($_SESSION['fill']); 
                }
                
        ?>
        
        <h1>Data Base</h1>
        
        <div class="form">
            <form action="" method="POST">
                <a href="index?id=<?php echo $id?>&u_id=<?php echo $uid; ?>"> <input type="button" class="button-three back" value="<--Home Page"></a>
                <br>
                <br>
                <label for="your_name">Your Name</label>
                <br>
                <label for=""><div class="input-five"><?php echo $first_name.' '.$last_name; ?></div></label>
                <br>
                <label for="gender">Gender</label>
                <br>
                <label for=""><div class="input-five"><?php echo $gender; ?></div></label>
                <br>
                <label for="date">Date of birth</label>
                <br>
                <label for=""><div class="input-five" ><?php echo $date_of_birth; ?></div></label>
                <br>
                <br>
                <label for="country">Country of Residence</label>
                <br>
                <label for=""><div class="input-five" ><?php echo $country; ?></div></label>
                <br>
                <label for="state">State of Residence</label>
                <br>
                <label for=""><div class="input-five" ><?php echo $state; ?></div></label>
                <br>
                <label for="email">E-mail</label>
                <br>
                <label for=""><div class="input-five" ><?php echo $email; ?></div></label>
                <label for="phone">Phone Number</label>
                <br>
                <label for=""><div class="input-five" ><?php echo $phone; ?></div></label>
                <br>  
                <br>
                
                <a href="update-password?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" > <input type="button" class="edit_details" value="Change Password"></a>
                <br>
                <br>
                <a href="edit-detail?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" > <input type="button" class="edit_details" value="Edit Details"></a>
                <br>
                <br>
                <br>
                <a href="../logout" ><input type="button" value="Log Out" class="log_out"></a>
                <br>
                <br>
            </form>
            <div id="toggle-btn" class="fas fa-times"></div>
            
            <form action="" method="POST" id="amount">
                    <Label><h4>Your available amount is :</h4></Label>
                    <br>
                    
                     <label for=""><b>Invites Wallet </b> </label>
            <?php

                $uid = $_GET['u_id'];
                $id = $_GET['id'];
                
                $sql = "SELECT * FROM tbl_user WHERE id=$id"  ;

                        $res = mysqli_query($conn, $sql);
                        
                        if($res==TRUE)
                        {
                           $row=mysqli_fetch_assoc($res);
                           $refer_count=$row['refer_count'];
                           //$pay=$row['pay'];

                           if($refer_count<30)
                           {
                              
                        
                              ?>
                                 <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo $refer_count *100;?></div>
                                 <br>
                                 <div id="withdrawalMessage1000"class="withdrawalMessagecss" >
                                 <label for="" id="label-display" class="label-display text center"><b>You need to have a minimum of <b>N3000</b> before you can withdraw. 
                                 <br>Thanks</b></label>
                                 </div>
                                 <b>Please double click</b>
                                 <br>
                                 <input type="button" id="withdraw" onclick="withdrawfunction1000()" name="pay" value="Withdraw">
                                 
                                 <div class="line"></div>
                              <?php
                           }
                           else
                           {
                              $payment = $row['refer_count'] * 100;
                              ?>
                              
                              <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo $payment; ?></div>
                                        
                                

                                <br>
                                <div id="withdrawalMessage1001"class="withdrawalMessagecss" >
                                <label for="" id="label-display" class="label-display text center"><b>Request Sent! 
                                       <br> Choose an amount you want to create an ID for.</b>
                                        
                                    </label>
                                    
                                    
                                    <input type="submit" id="withdraw" class="withdrawn" name="pay" value="Confirm Request">
                                    
                                </div>
                                <b>Please double click</b>
                                <br>
                                
                                <input type="button" id="withdraw" onclick="withdrawfunction1001()" name="withdraw" value="Withdraw">
                                <?php
                           }
                        }
                    ?>
                     <div class="line"></div>
                  <br><br>
                  <label for=""><b>Referrers Wallet </b> </label>
                    

            <?php

                $uid = $_GET['u_id'];
                $id = $_GET['id'];

                $sql = "SELECT * FROM tbl_payment WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               $count = mysqli_num_rows($res);

                if($count>0)
                {


                    $sn = 1;
                    $num = 1;
                    $psn = 51;
                    $pnum = 51;
                    $tpsn = 101;
                    $tpnum = 101;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $pid = $row['id'];
                        $userid = $row['user_id'];
                        $money = $row['amount'];
                        
                        

                            $sql2 = "SELECT * FROM tbl_payment WHERE refer_id='$pid'";

                            $res2 = mysqli_query($conn, $sql2);
   
                            if($res2==TRUE)
                            {
                                $count2 = mysqli_num_rows($res2);

                        if($count2>0)
                            {

                             $row2=mysqli_fetch_assoc($res2);

                             $cash  = $row2['amount'];

                             if($count2<5)
                             {
                                     $amount = $row2['amount'] * $count2;

                                     ?>


                                        <div><b>For <?php echo $userid;?></b></div>
                                        <div><b>N<?php echo $money;?></b></div>
                                        <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo $amount; ?></div>
                                        
                                

                                <br>
                                <div id="withdrawalMessage<?php echo $pnum++;?>"class="withdrawalMessagecss" >
                                <label for="" id="label-display" class="label-display text center"><b><b>5</b> persons need to pay using your Name and ID, before you can withdraw. 
                                <br>Only <b><?php echo $count2;?> </b> persons have paid using your Name and ID.<br>Thanks</b></label>
                                    
                                    
                                </div>
                                <b>Please double click</b>
                                <br>
                                <input type="button" id="withdraw" onclick="withdrawfunction<?php echo $psn++;?>()" name="withdraw" value="Withdraw">
                                <br>
                                <div class="line"></div>

                                <br>
                                <br>
                                <br>
                                <?php
                             }
                             else
                             {
                                     $amount = $row2['amount'] * 5;

                                     ?>


                                        <div><b>For <?php echo $userid;?></b></div>
                                        <div><b>N<?php echo $money;?></b></div>
                                        <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo $amount; ?></div>
                                        
                                

                                <br>
                                <div id="withdrawalMessage<?php echo $tpnum++;?>"class="withdrawalMessagecss" >
                                <label for="" id="label-display" class="label-display text center"><b>Request Sent! 
                                       <br> Your money will be transfered to your bank account within two working days. Click the button below to confirm</b>
                                        
                                    </label>
                                    
                                    <input type="submit" id="withdraw" class="withdrawn" name="withdraw" value="Confirm Request">
                                </div>
                                <b>Please double click</b>
                                <br>
                                <input type="button" id="withdraw" onclick="withdrawfunction<?php echo $tpsn++;?>()" name="withdraw" value="Withdraw">
                                <br>
                                <div class="line"></div>

                                <br>
                                <br>
                                <br>
                                <?php
                             }
                            }
                            else
                             {

                                     $amount = 0;
                                     ?>

                              <div id="close-login-btn" class="fas fa-times"></div>

                            <div><b>For <?php echo $userid;?></b></div>
                            <div><b>N<?php echo $money;?></b></div>
                            <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo $amount; ?></div>
                            
                    

                    <br>
                    <div id="withdrawalMessage<?php echo $num++;?>"class="withdrawalMessagecss" >
                    <label for="" id="label-display" class="label-display text center"><b><b>5</b> persons need to pay using your Name and ID, before you can withdraw. 
                             <br>Nobody have paid using your Name and ID.<br>Thanks</b></label>
                        
                        
                    </div>
                    <b>Please double click</b>
                                <br>
                    <input type="button" id="withdraw" onclick="withdrawfunction<?php echo $sn++;?>()" name="withdraw" value="Withdraw">
                    <br>
                    <div class="line"></div>

                    <br>
                    <br>
                    <br>
                    <?php
                             }


                         }
                         else
                             {
                             }
                 
                         }
                        }
                
                else{
                    ?>  
                    
                            <div id="withdrawalAmount" class="withdraw-now" name="amount_available">N<?php echo "0"; ?></div>
               <br><br>
               
               <div id="withdrawalMessage0"class="withdrawalMessagecss" >
                  
                    <label for="" id="label-display" class="label-display text center"><b><b>5</b> persons need to pay using your Name and ID, before you can withdraw. 
                             <br>Nobody have paid using your Name and ID.<br>Thanks</b></label>
                        
                        
                    </div>
                    <b>Please double click</b>
                                <br>
               <input type="button" id="withdraw" onclick="withdrawfunction0()" name="withdraw" value="Withdraw">
               <?php
                
                }

                
            ?>   
                    
                     
                    
                    

                    
                </form>
            

                <script src="open.js"></script>


                <?php
                $uid = $_GET['u_id'];
                $id = $_GET['id'];
            if(isset($_POST['withdraw']))
            { 

                $sql = "SELECT * FROM tbl_payment WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               $count = mysqli_num_rows($res);

               if($count>0)
               {

                while($row=mysqli_fetch_assoc($res))
                {
                    $pid = $row['id'];
                    $userid = $row['user_id'];

                   


                    $sql2 = "SELECT * FROM tbl_payment WHERE refer_id='$pid'";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==TRUE)
                    {
                        $count2 = mysqli_num_rows($res2);

                        if($count2>0)
                        {


                        $row2=mysqli_fetch_assoc($res2);

                        $cash  = $row2['amount'];

                        if($count2<5)
                                {
                                }
                                else
                                {

                                    $amount = $row2['amount'] * 5;

                                    if($amount==$row2['amount'] * 5)
                                    {
                                        $requested = "requested";

                                        $sql3 = "UPDATE tbl_payment SET 
                                        p_requested = '$requested'
                                        WHERE u_id='$uid'";
                                        $res3 = mysqli_query($conn, $sql3);
                                    }
                                    

                                }
                        }
                        else
                        {
                            
                        }
                    }
            }
        }
        
    }
              
                      ?>
                     
   
     
                     
                      </div>

                      <?php
   

    
                 if(isset($_POST['pay']))
             { 
                $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


                $res = mysqli_query($conn, $sql);

                if($res==TRUE)
                {

                 $row=mysqli_fetch_assoc($res);
                
                     $pid = $row['id'];
                     $refer_count = $row['refer_count'];

                     if($refer_count>=30)
                     {
                         $pay = "pay";
                         $payable_amount = 300;

                      ?>
                     
                       <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                      <div class="container">
                      <div class="body5"></div>
                        
                         <h1>Select an amount you wish to get an ID for</h1>
                         <?php
                           if($refer_count>=10 && $refer_count<50)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=50 && $refer_count<100)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=100 && $refer_count<150)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                 <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=150 && $refer_count<200)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=200 && $refer_count<300)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=300 && $refer_count<500)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=500 && $refer_count<1000)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                                 <br>
                                 <input type="submit" name="fiftyth" class="button-three data-amount" value="N50,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=1000 && $refer_count<2000)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                                 <br>
                                 <input type="submit" name="fiftyth" class="button-three data-amount" value="N50,000">
                                 <br>
                                 <input type="submit" name="onehundredth" class="button-three data-amount" value="N100,000">
                              
                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=2000 && $refer_count<5000)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                                 <br>
                                 <input type="submit" name="fiftyth" class="button-three data-amount" value="N50,000">
                                 <br>
                                 <input type="submit" name="onehundredth" class="button-three data-amount" value="N100,000">
                                 <br>
                                 <input type="submit" name="twohundredth" class="button-three data-amount" value="N200,000">
                              

                              </form>
                              
                              <?php
                              
                           }
                           elseif($refer_count>=5000 && $refer_count<10000)
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                                 <br>
                                 <input type="submit" name="fiftyth" class="button-three data-amount" value="N50,000">
                                 <br>
                                 <input type="submit" name="onehundredth" class="button-three data-amount" value="N100,000">
                                 <br>
                                 <input type="submit" name="twohundredth" class="button-three data-amount" value="N200,000">
                                 <br>
                                 <input type="submit" name="fivehundredth" class="button-three data-amount" value="N500,000">
                              

                              </form>
                              
                              <?php
                              
                           }
                           
                           else
                           {
                              ?>
                              <form action="" method="post">
                                 <input type="submit" name="oneth" class="button-three data-amount" value="N1,000">

                                 <br>
                                 <input type="submit" name="twoth" class="button-three data-amount" value="N2,000">
                                  <br>
                                 <input type="submit" name="fiveth" class="button-three data-amount" value="N5,000">
                                  <br>
                                 <input type="submit" name="tenth" class="button-three data-amount" value="N10,000">
                                  <br>
                                 <input type="submit" name="fifteenth" class="button-three data-amount" value="N15,000">
                                 <br>
                                 <input type="submit" name="twentyth" class="button-three data-amount" value="N20,000">
                                 <br>
                                 <input type="submit" name="thirtyth" class="button-three data-amount" value="N30,000">
                                 <br>
                                 <input type="submit" name="fiftyth" class="button-three data-amount" value="N50,000">
                                 <br>
                                 <input type="submit" name="onehundredth" class="button-three data-amount" value="N100,000">
                                 <br>
                                 <input type="submit" name="twohundredth" class="button-three data-amount" value="N200,000">
                                 <br>
                                 <input type="submit" name="fivehundredth" class="button-three data-amount" value="N500,000">
                                 <br>
                                 <input type="submit" name="onemillionth" class="button-three data-amount" value="N1,000,000">
                              

                              </form>
                              
                              <?php
                              
                           }


                     }
                }
             }
             if(isset($_POST['oneth']))
            { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 10
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 1000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: bank-deail?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                     if(isset($_POST['twoth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 20
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 2000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: bank-deail?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['fiveth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 50
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 5000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['tenth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 100
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 10000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 ?>
                                 
                                                         <?php
                                 
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['fifteenth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 150
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 15000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['twentyth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 200
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 20000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                     if(isset($_POST['thirtyth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 300
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 30000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['fiftyth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 500
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 50000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['onehundredth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 1000
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 100000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php
                              }
                              else
                              {
                                 
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['twohundredth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 2000
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 200000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['fivehundredth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 5000
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 20000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php

                                 
                                 
                              }
                              else
                              {
                                 
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }
                      if(isset($_POST['onemillionth']))
               { 
               $sql = "SELECT * FROM tbl_user WHERE u_id='$uid'";


               $res = mysqli_query($conn, $sql);

               if($res==TRUE)
               {
                  $row=mysqli_fetch_assoc($res);

                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $phone = $row['phone_number'];

                  

                  $sql3 = "UPDATE tbl_user SET 
                     refer_count = refer_count - 10000
                     WHERE u_id='$uid'";
                     $res3 = mysqli_query($conn, $sql3);
                     if($res3 ==TRUE)
                     {
                        
                        $fullname = $first_name.' '.$last_name;
                        $amount = 1000000;
                        $reference = "success";
                        $status = "success";
                        date_default_timezone_set('Africa/Lagos');
                        $Date_time = date('m/d/Y h:i:s a', time());
                        $auto_id = sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                        $SU = "SUN";
                        $user_id = $SU.''.$auto_id;
                        $refer_id = sprintf("%06d", mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                        $h_id =md5($email.' '.$user_id);


                        $sql4 = "INSERT INTO tbl_payment SET
                        full_name = '$fullname',
                        amount = '$amount',
                        reference = '$reference',
                        payment_status = '$status',
                        phone_number = '$phone',
                        email = '$email',
                        refer_id = '$refer_id',
                        u_id = '$uid',
                        user_id = '$user_id',
                        h_id = '$h_id'
                        ";
                        $res4 = mysqli_query($conn, $sql4);

                        if($res4==TRUE)
                        {
                           $receiver = "$email";
                           $subject = "Your referral details";
                           $body = "This is the referrer name and ID you will send to all those you refer:" . "\r\n" . 'Full Name: ' .'' . $fullname  . "\r\n" . 'Referal ID' .'' . $user_id;
                           $sender = "From: support@stepuptrusted.com";
                           mail($receiver, $subject, $body, $sender)
                        
                           ?>
                           <div class="cover" style="width: 100vw; height: 100vh; position: fixed; top: 0; left: 0; overflow-y: scroll; scroll-behavior: smooth;" >
                              <div class="container">
                              <div class="body5"></div>
                                    <div class="form">
                                       <h1>Payment Successful</h1>
                                       
                                          <p class="para">
                                             Congrats! Your payment was successful. A referral ID has been sent to your email. Please do well to refer 5 other persons using the referral ID sent to you, to get 5 times the money you paid
                                          </p>
                                          <br>
                                          
                                          <label for="full-name" class="success-data name">Full Name</label>
                                          <?php
                                          $sql = "SELECT * FROM tbl_payment WHERE user_id='$user_id' AND h_id='$h_id'";
                                          
                                          $res = mysqli_query($conn, $sql);
                                          if($res==TRUE)
                                          {
                                             $count = mysqli_num_rows($res);
                                             if($count==1)
                                             {
                                                   $row=mysqli_fetch_assoc($res);

                                                   $full_name = $row['full_name'];
                                             }
                                          }
                                          ?>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $full_name; ?></b></div></label>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          <label for="full-name" class="success-data name">Referal ID</label>
                                          <br>
                                          <label for="" class="success-data"><div class="input-five" ><b><?php echo $user_id; ?></b></div></label>
                                       
                                          <br>
                                          <br>
                                          <br>
                                          <br>
                                          
                                          <br>
                                       
                                          
                                    </div>
                                    <h1>Fill in your bank details</h1>
                                    <p class="para">Please ensure your bank details you fill are correct</p>
                                    <form action="refer-success?id=<?php echo $id?>&u_id=<?php echo $uid; ?>" method="GET">
                                          <label class="label" for="bank_name">Bank Name</label>
                                          <br>
                                          <script type= "text/javascript" src = "../bank.js"></script>
                                          <select id="country"  type="text" name="bank" class="input5" required>
                                          </select>
                                          
                                          <br><br><br>
                                          <label class="label" for="acct_name">Account Name</label>
                                          <br>
                                          <input id="acct_name" type="text" name="acct_name" class="input5" placeholder="Account Name" required>
                                          <br><br>
                                          <label class="label" for="Acct_num">Account Number</label>
                                          <br>
                                          <input id="acct_num" type="number" name="acct_num" class="input5" placeholder="Account Number" required>
                                          <br><br>
                                          <label class="label" for="Acct_type">Account type</label>
                                          <br>
                                          <select name="acct_type" id="acct_type" class="input5" required>
                                             <option value="Savings">Savings</option>
                                             <option value="Current">Current</option>
                                          </select>
                                          <br><br>
                                          
                                             <label for="country" class="label">Country of Residence</label>
                                             <br>
                                             <select id="country" name ="country" class="input5" required>
                                                <option value="Nigeria">Nigeria</option>
                                             </select> </br></br>
                                             
                                             <label for="state" class="label">State of Residence</label>
                                             <br>
                                             
                                                <input type="text" name="state" id="state" class="input5" placeholder="Your State">
                                                </br> </br>
                                             
                                          <label class="label" for="address">Address location</label>
                                          <br>
                                          <input id="address" type="text" name="address_location" class="input5" placeholder="Full address location" required>
                                          <br>
                                          <input type="hidden" name="u_id" value="<?php echo $uid?>">
                                          <input type="hidden" name="id" value="<?php echo $id?>">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                          <input type="hidden" name="h_id" value="<?php echo $h_id?>">
                                          <br><br>
                                          <input type="submit" name="sub" value="SUBMIT" class="input3 continue_button">
                                    </form>
                                 </div>
                                 </div></div>
                                 <script language="javascript">
                                 populateCountries("country", "state"); 
                              </script>

                                 <?php
                              }
                              else
                              {
                                 echo 'There was a problem collecting your data'. mysqli_error($conn);

                                 header('location: data?id='.$id.'&u_id='.$uid);
                              }
                           }
                           
                        }
                     }

                        ?>
               

    </div>
    </div>
   </div>
    
    
</body>
</html>
