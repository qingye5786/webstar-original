<?php
header('Content-Type:text/html; charset=utf-8');
date_default_timezone_set("PRC");

//接收数据库信息
$my_loca = trim($_POST['my_loca']);
$my_username = trim($_POST['my_username']);
$my_pass = trim($_POST['my_pass']);
$my_name = trim($_POST['my_name']);
$my_pr = trim($_POST['my_pr']);

//接收管理员信息
$ad_username = trim($_POST['ad_username']);
$ad_pass = md5(trim($_POST['ad_pass']));
$ad_repass = md5(trim($_POST['ad_repass']));
$ad_email = trim($_POST['ad_email']);

if(empty($my_loca) or empty($my_name) or empty($my_pass) or empty($my_username) or empty($my_pr)){
	echo '<script type="text/javascript">alert("数据库信息不能为空！");history.go(-1)</script>';
}

if(empty($ad_email) or empty($ad_pass) or empty($ad_repass) or empty($ad_username)){
	echo '<script type="text/javascript">alert("管理员信息不能为空！");history.go(-1)</script>';
}

//数据库表
$sql[0] = "SET FOREIGN_KEY_CHECKS=0;";

$sql[1] = "CREATE TABLE `".$my_pr."user` (
  `id` int(4) NOT NULL auto_increment COMMENT '用户id',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(60) NOT NULL COMMENT '用户密码',
  `point` varchar(200) NOT NULL DEFAULT '0' COMMENT '积分',
  `grade` varchar(50) DEFAULT NULL COMMENT '等级',
  `popularity` varchar(16) NOT NULL DEFAULT '0' COMMENT '用户人气',
  `email` varchar(16) NOT NULL COMMENT '邮箱地址',
  `time` varchar(16) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;"; // 用户表

$sql[2] = "CREATE TABLE `".$my_pr."web_star` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `title` varchar(16) NOT NULL COMMENT '提交的标题',
  `content` varchar(480) NOT NULL COMMENT '提交的内容',
  `good` varchar(16) NOT NULL DEFAULT '0' COMMENT '好评',
  `bad` varchar(16) NOT NULL DEFAULT '0' COMMENT '差评',
  `time` int(11) NOT NULL COMMENT '提交的时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;"; // 内容表

$in[0] = "INSERT INTO `".$my_pr."user` VALUES ('1', '$ad_username', '$ad_pass', '23', '大元帅', '21', '$ad_email', '".date("Y-m-d H:i:s")."');";
$in[1] = "INSERT INTO `".$my_pr."user` VALUES ('2', '小明', 'f268b83bf4e0be9001cb668a83b0dce5', '0', 列兵, '0', 'www@fs.com', '2014-02-05 22:12');";
$in[2] = "INSERT INTO `".$my_pr."user` VALUES ('3', '小红', '18ab01ae328631617e8f06ddc99fd525', '0', 列兵, '0', 'dafdsd@qq.com', '2014-02-05 22:13');";
$in[3] = "INSERT INTO `".$my_pr."user` VALUES ('4', '小王', 'd340c5e973c682f96d59a024085bd202', '3', '列兵', '0', 'dafddsd@qq.com', '2014-02-05 22:16');";
$in[4] = "INSERT INTO `".$my_pr."web_star` VALUES ('1', '游客', '贺铸 青玉案的格律', '　　（○平声●仄声⊙可平可仄△平韵脚▲仄韵脚） 　　凌波不过横塘路， 　　⊙○⊙●○○▲（韵）， 　　但目送，芳尘去。 　　●⊙●、○○▲（韵）。 　　锦瑟年华谁与度？ 　　⊙●⊙○○●▲（韵）。 　　月台花榭， 　　⊙○○▲（句）， 　　琐窗朱户， 　　⊙○⊙▲（韵）， 　　只有春知处。 　　⊙●○○▲（韵）。 　　碧云冉冉蘅皋暮， 　　⊙○⊙●○○▲（韵）， 　　彩笔新题断肠句。 　　⊙●○○●○▲（韵）。 　　试问闲愁都几许？ 　　⊙●⊙○○●▲（韵）。 　　一川烟草， 　　⊙○○●（句）， 　　满城风絮， 　　⊙○⊙▲（韵）， 　　梅子黄时雨。 　　⊙●○○▲（韵）。', '0', '0', '1323049302');";
$in[5] = "INSERT INTO `".$my_pr."web_star` VALUES ('2', 'phpol.cn', '欢迎使用web_star留言板', '嗨！大家好，偶是尘烟，欢迎大家使用web_star留言版，有什么意见或好的建议可以发送邮件至578672331@qq.com，偶会尽力解决^_^。', '0', '0', '1323048756');";
$in[6] = "INSERT INTO `".$my_pr."web_star` VALUES ('3', 'phpol.cn', '无题（李商隐）', '相见时难别亦难，东风无力百花残。 \r\n春蚕到死丝方尽，蜡炬成灰泪始干。 \r\n晓镜但愁云鬓改，夜吟应觉月光寒。 \r\n蓬山此去无多路，青鸟殷勤为探看。', '2', '1', '1323048881');";
$in[7] = "INSERT INTO `".$my_pr."web_star` VALUES ('4', '游客', '仓央嘉措的十诫诗', '译文一 　　第一最好不相见，如此便可不相恋。 　　第二最好不相知，如此便可不相思。 　　译文二 　　但曾相见便相知，相见何如不见时。 　　安得与君相诀绝，免教生死作相思。', '2', '2', '1323048982');";
$in[8] = "INSERT INTO `".$my_pr."web_star` VALUES ('5', 'phpol.cn', '青玉案 元夕(辛弃疾)', '东风夜放花千树，\r\n更吹落，星如雨。\r\n宝马雕车香满路。\r\n凤箫声动，玉壶光转，\r\n一夜鱼龙舞。\r\n\r\n蛾儿雪柳黄金缕，\r\n笑语盈盈暗香去。\r\n众里寻他千百度，\r\n蓦然回首，那人却在，\r\n灯火阑珊处。', '0', '0', '1323049112');";
$in[9] = "INSERT INTO `".$my_pr."web_star` VALUES ('6', 'phpol.cn', '青玉案（贺铸 ）', '凌波不过横塘路，但目送，芳尘去。锦瑟华年谁与度？月台花榭，琐窗朱户，只有春知处。 　　飞云冉冉蘅皋暮，彩笔新题断肠句。试问闲愁都几许？一川烟草，满城风絮，梅子黄时雨。', '0', '0', '1323049215');";



$config = "<?php
// 设置错误等级
error_reporting(0); 

//网站名称
define(\"WEB_NAME\",\"web_star留言板 V5.0.1正式版\");

//网站根目录盘符地址
define(\"DIR\",dirname(__FILE__));

\$httpUrl = strpos(\$_SERVER['HTTP_HOST'],'http://') ? \$_SERVER['HTTP_HOST'] : 'http://'.\$_SERVER['HTTP_HOST'];

//网站根目录http url地址
define(\"WEB\",\$httpUrl);

//设定公共资源目录位置
define(\"PUB\",WEB.'/public/');

// 表前缀
define(\"PRE\",'$my_pr');

// 超级用户名称
\$suppername = '$ad_username';

//服务器ip地址，默认为localhost
\$db_server = '$my_loca';

//数据库用户名 
\$db_username = '$my_username';

//数据库密码
\$db_password = '$my_pass';

//连接用数据库名称
\$db_name = '$my_name';

//数据库连接，是否为持久链接,默认不是
\$db_conn = 'conn';

//数据库编码,默认为utf-8
\$db_code = 'UTF8';

//官位名称--从小到大顺序
\$WEB_GRADES = array('列兵','上等兵','一级士官','二级士官','三级士官','四级士官','五级士官','六级士官','少尉','中尉','上尉','少校','中校','上校','大校','少将','中将','上将','镇南将军','镇东将军','镇西将军','镇北将军','安南将军','安东将军','安西将军','安北将军','骠骑大将军','辅国大将军','绥远大将军','神威大将军','威远大将军','忠义大将军','镇远大将军','龙骧大将军','虎牙大将军','威武大将军','元帅','大元帅');


//引入配置文件
require_once 'config.php';

//引入数据库操作类
require_once \$_SERVER['DOCUMENT_ROOT'].'/include/class/mysql_db_class.php';

//开启session
session_start();

//设置编码
header('Content-type: text/html; charset=utf-8');

//设定时区
date_default_timezone_set('PRC');

//实例化数据库操作类
\$db = mysql::getInstance(\$db_server,\$db_username,\$db_password,\$db_name,\$db_conn,\$db_code);

";

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
     <img src="../images/jdt05.gif" />
   </div>
    <div class="left">
      <ul>
        <li>1、程序安装前言</li>
        <li>2、运行环境检测</li>
        <li>3、文件权限检测</li>
        <li>4、账号信息设置</li>
        <li class="g">5、程序安装完成</li>
      </ul>
    </div>
    <div class="right">
      <div class="ok">
        <?php
		  if(!empty($my_name)){
			if(!file_exists('../../install.txt')){
			  if(@$c = mysql_connect($my_loca,$my_username,$my_pass)){
				  echo '数据库链接成功！<br /><br />';
				  mysql_query("SET NAMES 'UTF8'");
				  if(!@mysql_select_db($my_name)){
					  mysql_query("CREATE DATABASE $my_name");
					  echo '数据库不存在,已经创建完毕<br /><br />';
				  }
				  $count = 0;
				  for($i=0;$i<3;$i++){
					  mysql_query($sql[$i]) or die(mysql_error());
					  $count++;
				  }
				  
				  $count_in = 0;
				  if($count == 3){
					  for($i=0;$i<10;$i++){
						  mysql_query($in[$i]);
						  $count_in++;
					  }
					  
					  if($count_in == 10){
						  $fp = fopen("../../config.php","w");
						  if(fwrite($fp,$config)){
							  $fo = fopen('../../install.txt',"w");
							  $date = date("Y-m-d H:i:s");
							  $con = $date." phpol.cn OK!";
							  fwrite($fo,$con);
							  echo '数据库配置文件创建成功！<br /><br />赶快<a href="../../index.php">登入</a>留言板瞧瞧吧^_^';
						  }
						  else{
							  echo '数据库配置文件创建失败，请<a href="javascript:history.go(-1);"返回重新提交！<br /><br />';
						  }
					  }
				  }
			  }
			  else{
				 echo '数据库链接失败，请<a href="javascript:history.go(-1);">返回</a>重新填写数据库信息！';	
			  }
			}else{
			   echo '系统已被安装，如想重装，请删除根目录的<span style="color:red; font-weight:600;">install.txt</span>文件后重新安装。';	
			}
		}

		?>
      </div>
    </div>
    <div class="bottom">
     <input class="one" value="返回上一步" type="button" onclick="history.back(-1)" />
    </div>
   </div>
</body>
</html>