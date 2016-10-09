<?php 
	require_once "config.php"; 
	$pg = $_GET['pg']; //接收页面参数
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="<?php echo PUB;?>static/css/user.css" />
<script type="text/javascript" src="<?php echo PUB;?>static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo PUB;?>static/js/Ajax.js"></script>
<title>用户空间--<?php echo WEB_NAME; ?></title>
<script type="text/javascript">
     $(function(){
         setAjaxPage('include/ajax/echoAjaxPage.php?page=1','#right','<?php echo $pg; ?>','<?php if($pg == 'Ushow') {echo $_GET['id'];} ?>');
     });           
</script>
</head>
<body>
<div id="wrap">
   <div id="header">
	 <?php
      include 'include/subpage/top.php';
      ?>
   </div>
   <div id="content">
     <div id="left">
	 <?php
      include 'include/subpage/left.php';
     ?>
     </div>
     <div id="right">
         <div class="the_load">数据加载中......</div>   
     </div>
   </div>
   <div id="footer">
	  <?php
       include 'include/subpage/bottom.php';
      ?>
   </div>
</div>
</body>
</html>