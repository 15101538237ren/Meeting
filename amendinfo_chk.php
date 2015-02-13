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
session_start();
include_once("conn/conn.php");
$pwd=$_POST["olderpwd"];
if(!empty($pwd)){
    $id=$_SESSION['id'];
    $sqlchk="select userPwd from meeting_user where userId =$id";
    $amend_rst=$conn->Execute($sqlchk);
    if($pwd==$amend_rst->fields[0]){
        echo "<meta http-equiv=\"refresh\" content=\"0;url=manager.php?lmbs=修改密码\" />";
        ?>
        <form action="amendpwd.php">
            <input type="hidden" name="amendpwd">
        </form>
    <?php
    }else{
        echo "<script>alert('原密码输入错误，请输入正确的密码！！');history.go(-1);</script>";
    }
}else{
    echo "<script>alert('请输入原密码！！');history.go(-1);</script>";
}
?>
</body>
</html>