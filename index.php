

<?php 
include_once "header.php"; 
include('php/config.php');


?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="" method="POST">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>

<?php
    
if(isset($_POST['submit']))
{


            $first_name =$_POST['fname'];
            $last_name =$_POST['lname'];
            $email =$_POST['email'];
            $password =md5('password'); 
            $uid =sprintf("%06d", mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
           


            if($email=='')
            {
                $_SESSION['field'] = "<div class='error-two text-center'>Please fill in all the fields appropriately, in order to register</div>";
                header('location: signup-patient.php');

            }
            else
            {
                
              $sql = "INSERT INTO users SET
              fname = '$first_name',
              lname = '$last_name',
              email = '$email',
              password = '$password',
              status= 'Active',
              unique_id = $uid
              
              ";
              $res = mysqli_query($conn, $sql);
              if($res==TRUE)
              {
                $_SESSION['user'] = $email;
                
                   header('location: users.php');
              }
              else{
                header('location: accounts.php');
              }

                
              
           }
          

} 

    

?>