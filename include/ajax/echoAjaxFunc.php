<?php
require_once '../../config.php';

//接收参数
$o_name = $_POST['name'];
$id   = $_POST['id'];

//删除留言
if($o_name == 'del'){
	$rsdel = $db->delete(PRE."web_star","id='$id'");
}

//删除留言
if($o_name == 'del'){
	$rsdel = $db->delete(PRE."web_star","id='$id'");
	echo "<div class=\"the_load2\">该留言已被删除！<a href=\"javascript:history.back()\">点此可以返回</a></div>";
}

//送鲜花
if($o_name == 'good') {
	$qu = $db->select(PRE."web_star","where id='$id'");//查询该id相关资料
	while($row = $db->fetch_array($qu)) {
		$user = $row['username'];
	}
	//更新数据
	$q = $db->update(PRE."web_star","good=good+1","id='$id'");
	if($q){
		$db->update(PRE."user","popularity=popularity+1","username='$user'");
	}
}

//扔鸡蛋
if($o_name == 'bad') {
	$qu = $db->select(PRE."web_star","where id='$id'");//查询该id相关资料
	while($row = $db->fetch_array($qu)) {
		$user = $row['username'];
	}
	//更新数据
	$q = $db->update(PRE."web_star","bad=bad+1","id='$id'");
	if($q) {
		$db->update(PRE."user","popularity=popularity-1","username='$user'");
	}
}