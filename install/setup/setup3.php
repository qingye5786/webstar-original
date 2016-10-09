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
   <form action="setup4.php" method="post">
   <div class="top">
     <img src="../images/jdt04.gif" />
   </div>
    <div class="left">
      <ul>
        <li>1、程序安装前言</li>
        <li>2、运行环境检测</li>
        <li>3、文件权限检测</li>
        <li class="g">4、账号信息设置</li>
        <li>5、程序安装完成</li>
      </ul>
    </div>
    <div class="right">
      <div class="write_ad">
        <div class="mysql">
         <div class="to">
           <h4>填写数据库信息</h4>
         </div>
         <div class="le">
          <ul>
           <li>数据库主机：</li>
           <li>数据库帐号：</li>
           <li>数据库密码：</li>
           <li>数据库名称：</li>
           <li>数据表前缀：</li>
          </ul>
         </div>
         <div class="ri">
          <ul>
           <li><input type="text" name="my_loca" value="localhost" /></li>
           <li><input type="text" name="my_username" /></li>
           <li><input type="password" name="my_pass" /></li>
           <li><input type="text" name="my_name" value="phpol_cn" /></li>
           <li><input type="text" value="phpol_" name="my_pr" />&nbsp;<span class="prom">不建议修改！</span></li>
          </ul>
         </div>
        </div>
        <div class="admin">
         <div class="to">
           <h4>填写管理员信息</h4>
         </div>
         <div class="le">
           <ul>
            <li>管理帐号：</li>
            <li>管理密码：</li>
            <li>确认密码：</li>
            <li>E-mail：</li>
           </ul>
         </div>
         <div class="ri">
          <ul>
           <li><input type="ad_username" value="phpol.cn" name="ad_username" />&nbsp;<span class="prom">由2到30个数字，字母，下划线组成！</span></li>
           <li><input type="password" name="ad_pass" value="phpol.cn" />&nbsp;<span class="prom">由6到30个数字，字母，下划线组成！默认为 phpol.cn</span></li>
           <li><input type="password" name="ad_repass" value="phpol.cn" /></li>
           <li><input type="text" name="ad_email" value="admin@phpol.cn"  /></li>
          </ul>
         </div>
        </div>
      </div>
    </div>
    <div class="bottom">
     <input class="one" value="返回上一步" type="button" onclick="history.back(-1)" />
     <input class="two" value="确认信息继续" type="submit"/>
    </div>
    </form>
   </div>
</body>
</html>