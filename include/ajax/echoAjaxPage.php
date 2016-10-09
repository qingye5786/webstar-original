<?php
require_once '../../config.php';
require_once '../../include/class/page.class.php';

//接收参数
$order  = $_POST['pageName'];
$tcon   = $_POST['conName'];
$userid = $_POST['userid'];

if($order == "show") {//查看留言页,show.php
	//查询数据表，获得数据总条数
	$sql      = $db->select(PRE."web_star");
	$total    = $db->num_rows($sql);
	$pagesize = 2;
	//实例化分页类
	$page     = new page($total,$pagesize,$tcon,$order);
	$result   = $db->select(PRE."web_star","order by id desc {$page->limit}");
	//查询
	if($result){
		while($rows = $db->fetch_array($result)){
			echo "<div class=\"message\">";
			echo "<div class=\"user_con\">";
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
			echo "<tr><td valign=\"middle\" height=\"200\">";
			echo "<table>";
			echo "<tr style=\"height:25px;\"><td>名称：</td><td>{$rows['username']}</td></tr>";
		    $sql2 = $db->select(PRE."user","where username='$rows[username]'");
		    while($rows2 = $db->fetch_array($sql2)) {
	             echo "<tr style=\"height:25px;\"><td>军衔：</td><td>{$rows2['grade']}</td></tr>";
	             echo "<tr style=\"height:25px;\"><td>贡献：</td><td>{$rows2['point']}</td></tr>";
	             echo "<tr style=\"height:25px;\"><td>声望：</td><td>{$rows2['popularity']}</td></tr>";
			}
			echo "</table>";
			echo "</td></tr></table></div>";
			echo "<div class=\"message_con\">";
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
			echo "<tr><td class=\"title\">{$rows['title']}</td></tr>";           
			echo "<tr><td>";   
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr>";        
			echo "<td class=\"content\">{$rows['content']}</td></tr>";
			echo "<tr><td class=\"time\">";
			echo "<span class=\"date\">".date('Y-m-d H:i:s',$rows['time'])."</span>";
			echo "<span class=\"good_comment\"><a href=\"javascript:setAjaxFunc('good','{$rows['id']}') \">送鲜花(+{$rows['good']})</a></span>";
			echo "<span class=\"good_comment\"><a href=\"javascript:setAjaxFunc('bad','{$rows['id']}') \">扔鸡蛋(+{$rows['bad']})</a></span>";              
			if(isset($_SESSION['name'])) {
				if($_SESSION['name'] == $rows['username'] || $_SESSION['name'] == $suppername){                 
					echo "<span class=\"del\"><a href=\"javascript:setAjaxFunc('del','{$rows['id']}') \">删除留言</a></span>";        
				} 
			}
			echo "</td></tr></table>";
			echo "</td></tr></table></div></div>";
	    }
	    echo "<div id=\"the_pa_ge\" style=\"display:none;\">{$page->pageCode()}</div>";
	    echo "<div id=\"page\">";
	    echo $page->fpage();
	    echo "</div>";
	}else {
		echo '<script type="text/javascript">alert("您还未发表任何留言！");</script>';
	}		   
}elseif($order == "index") {//用户页
	$sql = $db->select(PRE.'web_star',"where username='$_SESSION[name]'");
	$total = $db->num_rows($sql);
	$pagesize = 2;
	
	//实例化分页类
	$page = new page($total,$pagesize,$tcon,$order);
	$result = $db->select(PRE.'web_star',"where username='$_SESSION[name]' order by id desc {$page->limit}");
	
	echo "<div class=\"article\">";
	
	if($result) {
		while($rows = $db->fetch_array($result)){
			echo "<div class=\"article_con\">";
			echo "<h4>{$rows['title']}</h4>";
					echo "<div class=\"article_con_c\">";
				         echo $rows['content'];
		    	    echo "</div>";
		    	    echo "<div class=\"article_con_show\">";
		    			 echo "<a href=\"user.php?pg=Ushow&id={$rows['id']} \">查看</a>";
		    	    echo "</div>";
		    echo "</div>";
	   }
		   echo "</div>";
	   echo "<div class=\"page\">";
	    echo $page->fpage();
	   echo "</div>";
	}
}elseif($order == 'idcard') {//用户资料页
	echo "<div class=\"idcard\">";
	//查询用户资料
	$query = $db->select(PRE.'user',"where username='$_SESSION[name]'");
	while($rows = $db->fetch_array($query)){
	     echo "<h3>{$rows['username']}的个人资料</h3>";
	     echo "<div class=\"idcard_con\">";
			  echo "身&nbsp;&nbsp;&nbsp;&nbsp;份:{$rows['username']}<br /><br /><br />";
			  echo "军&nbsp;&nbsp;&nbsp;&nbsp;衔：{$rows['grade']}<br /><br /><br />";
			  echo "贡&nbsp;&nbsp;&nbsp;&nbsp;献：{$rows['point']}<br /><br /><br />";
			  echo "声&nbsp;&nbsp;&nbsp;&nbsp;望：{$rows['popularity']}<br /><br /><br />";
			  echo "联系邮箱：{$rows['email']}<br /><br /><br />";
	     echo "</div>";
	}
	echo "</div>";
}elseif($order == 'message') {//我的留言页面
	$sql = $db->select(PRE.'web_star',"where username='$_SESSION[name]'");
	$total = $db->num_rows($sql);
	$pagesize = 10;
	//实例化分页类
	$page = new page($total,$pagesize,$tcon,$order);
	$result = $db->select(PRE.'web_star',"where username='$_SESSION[name]' order by id desc {$page->limit}");
	
	echo "<div class=\"message\">";
	echo "<h1>留言列表</h1>";
	echo "<ul>";
	if($result) {
		while($rows = $db->fetch_array($result)){
			echo "<li><a href=\"user.php?pg=Ushow&id={$rows['id']} \">{$rows['title']}</a>&nbsp;&nbsp;<span class=\"date\">[".date("Y-m-d H:i:s",$rows['time'])."]</span></li>";
        }
	    echo "</ul>";
	    echo "</div>";
	    echo "<div class=\"page\">";
	    echo $page->fpage();
	    echo "</div>";
	}
}elseif($order == "super") {//管理留言页面
	$sql = $db->select(PRE.'web_star');
	$total = $db->num_rows($sql);
	$pagesize = 10;
	//实例化分页类
	$page = new page($total,$pagesize,$tcon,$order);
	$result = $db->select(PRE.'web_star',"order by id desc {$page->limit}");
	echo "<div class=\"message\">";
	echo "<h1>留言列表</h1>";
	echo "<ul>";
	if($result) {
		while($rows = $db->fetch_array($result)){
            echo "<li><a href=\"user.php?pg=Ushow&id={$rows['id']} \">{$rows['title']}</a>&nbsp;&nbsp;<span class=\"date\">作者:{$rows['username']}&nbsp;&nbsp;时间：".date("Y-m-d H:i:s",$rows['time'])." </span></li>";
		}
		echo "</ul>";
		echo "</div>";
		echo "<div class=\"page\">";
		echo $page->fpage();
		echo "</div>";
	}	                  
}elseif($order == 'Ushow'){
	$id = $userid;
	$query = $db->select(PRE.'web_star',"where id='$id'");
	if($query) {
		echo "<div class=\"show\">";
		while($row = $db->fetch_array($query)){
		    echo "<h2>{$row['title']}</h2>";
		    echo "<div class=\"show_article\">";
		    echo "<div class=\"show_article_con\">";
	        echo $row['content'];
		    echo "</div>";
		    echo "<div class=\"show_article_show\">";
		    echo "<a href=\"javascript:setUserAjaxFunc('del',{$row['id']},'UshowD') \">删除</a>";
		    echo "</div></div>";
	    }
		echo "</div>";
	}
}