<link type="text/css" rel="stylesheet" href="<?php echo PUB;?>static/css/login.css" />
<script type="text/javascript" src="<?php echo PUB;?>static/js/login.js"></script>
<div id="login_bo" style="display:none;">
    <div id="beijing"></div>
    <div id="l_bo">
        <div class="top">
           <h3>用户登录</h3>
           <a title="关闭" href="javascript:close_log();" class="close" id="closeLoginBoxBtn">关闭</a>
        </div>
        <form action="login_do.php" method="post" name="form1" onSubmit="return check_login(this);">
        <div class="con">
          <div class="in">
           <input type="text" name="username" value="账号" onFocus="onf_text(this,'账号')" onBlur="onb_text(this,'账号')" />
           <input type="text" name="password" value="密码" onFocus="onf_text(this,'密码','password')" onBlur="onb_text(this,'密码','text')"/>
          </div>
          <div class="sub_con">
           <input type="submit" id="sub" name="sub" value="" />&nbsp;&nbsp;没有账号？&nbsp;<a href="register.php">注册一个</a>
          </div>
        </div>
        </form>
    </div>
  </div>