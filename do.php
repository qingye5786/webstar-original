<?php
require_once "config.php"; //引入数据库链接文件

if(!get_magic_quotes_gpc()) { //如果php设置的自动转义函数未开启，就转义这些值
	foreach($_POST as &$filter) {
	  	$filter = addslashes($filter);
	}
}

$name = (isset($_SESSION['name'])) ? $_SESSION['name'] : "平民"; //用户名判断

//接收相关信息
$user    = trim($name);
$title   = trim($_POST['title']);
$content = trim($_POST['content']);
$time    = time();

if(empty($content) || empty($title)) { //判断用户名和内容是否存在
	header("location:public/skip/skip_bad.php");	//跳转至失败页
} else { //写入留言内容
	$query = $db->insert(PRE."web_star","username,title,content,time","'$user','$title','$content','$time'");
	if($user != "平民") { //判断是否登录
		$result = $db->select(PRE."user","where username='$user'");
		while($row = $db->fetch_array($result)){
			$point = $row['point']; //该用户积分
			$g_count = count($WEB_GRADES); //官职数量
			for($i=0;$i<$g_count;$i++) { //循环判断用户积分，改变其等级,$grades在配置文件config.php中配置
				if($point >= $i*10) {
					$grade = $WEB_GRADES[$i];
					break;
				}
			}
		}
		$q2 = $db->update(PRE."user","point=point+1,grade='$grade'","username='$user'"); //积分写入数据库
	}
	header("location:public/skip/skip_well.php"); //跳转至成功页
}