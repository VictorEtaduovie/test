<?php 
  
  include_once "php/config.php";
  include "php/check.php";
  include "php/access.php";
echo $pass;
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          
          <img src="php/images/1655560324book-pic.jpg" alt="">
          <div class="details">
            <span>Coding</span>
            <p>Active now</p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
        <?php 
            include_once "php/view-users.php";
        ?>
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
