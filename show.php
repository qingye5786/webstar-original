<?php require_once('config.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo PUB;?>static/css/show.css" />
<script type="text/javascript" src="<?php echo PUB;?>static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo PUB;?>static/js/Ajax.js"></script>
<title>查看留言--<?php echo WEB_NAME; ?></title>
<script type="text/javascript">
     $(function(){
         setAjaxPage('include/ajax/echoAjaxPage.php?page=1','#ajax_con','show','not');
     });           
</script>
</head>
<body>
<div id="wrap">
      <!-- 登录注册start -->
          <?php require_once 'include/subpage/login_link.php';?>
      <!-- 登录注册连接end -->
      <!-- 登录框start -->
         <?php require_once 'include/subpage/login.php';?>
      <!-- 登陆框end -->
      <div class="ck">
      	  <h6>留言列表 <span class="want_m"><a href="index.php">我要留言</a></span></h6>
      <div id="ajax_con">
      	 <div class="the_load">数据加载中......</div>
      </div>
    </div>
    <!-- 版权信息start -->
        <?php require_once 'include/subpage/bottom.php'; ?>
    <!-- 版权信息end -->
</div>
</body>
</html>