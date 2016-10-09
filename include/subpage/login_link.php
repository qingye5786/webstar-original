<link type="text/css" rel="stylesheet" href="<?php echo PUB;?>static/css/login_link.css" />
<script type="text/javascript" src="<?php echo PUB;?>static/js/text.js"></script>
<div id="login">
     <div class="lo">
         <?php
             if(isset($_SESSION['name']) && $_SESSION['name'] != ""){
                 echo "当前用户：<a href='user.php?pg=index'>".$_SESSION['name']."</a>&nbsp;|&nbsp;<a href='logout.php'>退出</a>";
             }
             else {
                 echo "<strong><a href='javascript:show_log()'>登陆</a>&nbsp;|&nbsp;<a href='register.php'>注册</a></strong>";   
             }
         ?>
      </div>
  </div>