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
<?php
session_start();
include_once("conn/conn.php");
if(empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){
    echo "<script>alert('两次输入的密码均不能为空！！');history.go(-1);</script>";
}else{
    $pwdtwice=$_POST["newpwdtwice"];
    if($_POST["newpwd"]==$pwdtwice){
       $id =$_SESSION['id'];
        $sqlstrix="update meeting_user set userPwd='$pwdtwice' where userId=$id";
        $apwd_rst=$conn->Execute($sqlstrix);
        if($apwd_rst){
            session_destroy();
            echo "<script>alert('修改成功！！');location='index.php'</script>";
        }else{
            echo "<script>alert('修改失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('两次输入的密码不相同！！');history.go(-1);</script>";
    }
}
?>
    </body>
</html>