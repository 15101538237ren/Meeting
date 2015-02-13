<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="js/amendinfo.js"></script>
    <link href="css/amendinfo.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户信息修改</title>
</head>
<body>
<?php
$id=$_SESSION['id'];
$sqlstrvii="select * from meeting_user where id =$id";
$a_rstuserinfo=$conn->Execute($sqlstrvii);
?>
<table>
    <tr>
        <td colspan="2">修改密码</td>
    </tr>
    <form id="insertpwd" action="amendinfo_chk.php" method="post" onSubmit="return check_submit()";>
    <tr>
        <td height="22">用户名:</td>
        <td align="left"><span style="color:#0033FF"><?php echo $_SESSION["name"];//$i_rstuserinfo->fields[1]; ?></span></td>
    </tr>
    <tr>
        <td height="22">输入原密码:</td>
        <td><input style="border:1px solid #CCCCCC" type="password" name="olderpwd"></td>
    </tr>
    <tr>
        <td  height="22" colspan="2"><input class="ame_btn1" type="submit" value="" />&nbsp;&nbsp;<input class="ame_btn2"type="reset" value="" /></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    </form>
</table>
</body>
</html>
