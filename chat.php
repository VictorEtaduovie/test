<?php 
  
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/1655560324book-pic.jpg" alt="">
        <div class="details">
          <span>Hello</span>
          <p>Active</p>
        </div>
      </header>
      <div class="chat-box">
        <div class="chat outgoing">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda maiores sunt. Sequi, at placeat?</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="php/images/1655560324book-pic.jpg" alt="">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda maiores sunt. Sequi, at placeat?</p>
          </div>
        </div>
        
      </div>
      <?php 
            include "php/message-form.php";
        ?>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
