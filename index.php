<?php 
	if(!file_exists('install.txt')) {
		header("location:install/index.php");
	}
	require_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="<?php echo PUB;?>static/css/style.css" />
<title>发表留言--<?php echo WEB_NAME; ?></title>
<script type="text/javascript" src="<?php echo PUB;?>static/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo PUB;?>static/js/index.js"></script>
</head>
<body>
      <div id="wrap">
      	  <!-- 登录注册start -->
          	   <?php require_once 'include/subpage/login_link.php';?>
      	  <!-- 登录注册连接end -->
      	  <!-- 登录框start -->
          	   <?php require_once 'include/subpage/login.php';?>
      	  <!-- 登陆框end -->
          <form action="do.php" id="iform" method="post" onsubmit="return checkInput(this);" >
             <table>
                <tr>
                     <td><input type="text" name="title" id="title" value="标题" onfocus="onf_text(this,'标题')" onblur="onb_text(this,'标题')" /></td>
                </tr>
                <tr>
                     <td><textarea name="content" id="content" onclick="onf_text(this,'内容')"  onblur="onb_text(this,'内容')">内容</textarea>&nbsp;</td>
                </tr>
                <tr>
                   <td>
                       <input class="submit" type="submit" value="提交"  />
                       <input type="reset"  value="重置" name="reset" id="reset" style="margin-left:40px;" />
                       <input class="see" type="button" value="查看" style="margin-left:45px;" onclick="window.location.href='show.php'" />
                   </td>
               </tr>
             </table>
         </form>
         <!-- 版权信息start -->
         	  <?php require_once 'include/subpage/bottom.php'; ?>
         <!-- 版权信息end -->
      </div>
</body>
</html>