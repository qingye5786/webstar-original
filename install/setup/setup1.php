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
     <img src="../images/jdt02.gif" />
   </div>
    <div class="left">
      <ul>
        <li>1、程序安装前言</li>
        <li class="g">2、运行环境检测</li>
        <li>3、文件权限检测</li>
        <li>4、账号信息设置</li>
        <li>5、程序安装完成</li>
      </ul>
    </div>
    <div class="right">
      <div class="op_en">
        <div class="jxxm">
          <ul>
            <li class="b">检查项目</li>
            <li>操作系统</li>
            <li>web 服务器</li>
            <li>php 版本</li>
            <li>支持 mysql</li>
            <li>gb 扩展</li>
            <li>zlib 扩展</li>
            <li>iconv 扩展</li>
            <li>allow_url_fopen</li>
          </ul>
        </div>
        <div class="dqhj">
          <ul>
            <li class="b">当前环境</li>
            <li><?=strtoupper(substr(PHP_OS,0,3)) === "WIN" ? "window操作系统" : "linux操作系统" ?></li>
            <li><?=$_SERVER['SERVER_SOFTWARE'] ?></li>
            <li><?=phpversion() ?></li>
            <li><?=extension_loaded('mysql') &&function_exists('mysql_connect')?'√支持Mysql':'×不支持Mysql'; ?></li>
            <li><?=extension_loaded('gd')&&function_exists('imagecreate')?'√支持GD库':'×不支持GD库'; ?></li>
            <li><?=extension_loaded('zlib') && function_exists('ob_gzhandler')?'√支持Gzip压缩':'×不支持Gzip压缩'; ?></li>
            <li><?=extension_loaded('iconv')?'√支持iconv拓展':'×不支持iconv拓展'; ?></li>
            <li><?=ini_get('allow_url_fopen') ? "√" : "X" ?></li>
          </ul>
        </div>
        <div class="azjy">
          <ul>
            <li class="b">安装建议</li>
            <li>Windows_NT/Linux/Freebsd</li>
            <li>Apache/IIS</li>
            <li>php 5.0.0 及以上</li>
            <li>必须支持</li>
            <li>建议开启</li>
            <li>建议开启</li>
            <li>必须支持</li>
            <li>建议打开</li>
          </ul>
        </div>
        <div class="gnyx">
          <ul>
            <li class="b">功能影响</li>
            <li class="r">√</li>
            <li class="r">√</li>
            <li class="r"><?=phpversion() ? "√" : "X" ?></li>
            <li class="r"><?=extension_loaded('mysql') ? "√" : "X" ?></li>
            <li class="r"><?=extension_loaded('gd') || function_exists('imagecreate') ? "√" : "不支持缩略图和水印" ?></li>
            <li class="r"><?=extension_loaded('iconv') || extension_loaded('mbstring') ? "√" : "字符集转换效率低" ?></li>
            <li class="r">√</li>
            <li class="r"><?=ini_get('allow_url_fopen') ? "√" : "X" ?></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottom">
     <input class="one" value="返回上一步" type="button" onclick="history.back(-1)" />
     <input class="two" value="通过检测继续" type="button" onclick="location.href='setup2.php'" />
    </div>
   </div>
</body>
</html>