<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="js/amendpwd.js"></script>
    <link href="css/amendpwd.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>
<body>
<table>
    <tr>
        <td align="center" colspan="2" height="26">修改密码</td>
    </tr>
    <form  id="amendpwd" action="amendpwd_chk.php" onSubmit="return check_submit();" method="post">
        <tr><td align="right" height="26">新密码：</td><td><input  style="border:1px solid #CCCCCC"type="password" name="newpwd" /></td></tr>
        <tr><td align="right" height="26">确认密码：</td><td><input style="border:1px solid #CCCCCC"type="password" name="newpwdtwice" /></td></tr>
        <tr><td colspan="2"><input class="pwd_btn1" type="submit" value="" />&nbsp;&nbsp;<input class="pwd_btn2" type="reset" value="" /></td></tr>
    </form>
</table>
</body>
</html>
