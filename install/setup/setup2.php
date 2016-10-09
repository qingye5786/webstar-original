<?php
$root = substr(dirname(__FILE__),0,-5);
$a = array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="../css/install.css" />
<title>webSatr安装</title>
</head>

<body>
   <div class="all_ti">
     <h3>webStar留言板V5.0.1安装向导</h3>
   </div>
   <div class="install">
   <div class="top">
     <img src="../images/jdt03.gif" />
   </div>
    <div class="left">
      <ul>
        <li>1、程序安装前言</li>
        <li>2、运行环境检测</li>
        <li class="g">3、文件权限检测</li>
        <li>4、账号信息设置</li>
        <li>5、程序安装完成</li>
      </ul>
    </div>
    <div class="right">
      <div class="title">
        <div class="file">
          <h5>4、文件权限检测</h5>
          <ul>
            <li>开始文件权限检测...</li>
            <?php usleep(200000) ?>
            <li><?=is_writeable($root)&&is_readable($root) ? " 根目录通过检测..." : "<font color:red>更目录未通过检测...</font>" ?></li>
            <li class="pr">提示：检测完成，如果有检测未成功的目录，请将该目录设为0777再继续安装!</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottom">
     <input class="one" value="返回上一步" type="button" onclick="history.back(-1)" />
     <input class="two" value="通过检测继续" type="button" onclick="location.href='setup3.php'" />
    </div>
   </div>
</body>
</html>