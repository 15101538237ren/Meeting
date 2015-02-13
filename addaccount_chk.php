<?php
session_start();
include_once("conn/conn.php");
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>添加新用户</title>
    </head>
    <body>
<?php
session_start();
include_once("conn/conn.php");
$userName=$_POST['newuser'];
$acc_chk="select * from meeting_user where userName='$userName'";                                                         //判断帐号是否已经存在
$acc_rst_chk=$conn->Execute($acc_chk);
if(!$acc_rst_chk->EOF){
    echo "<script>alert('该帐号已存在！！');history.go(-1);</script>";
}else{
    if(empty($_POST["newuser"]) or $_POST["department"]=="请选择部门" or empty($_POST["newpwd"]) or empty($_POST["newpwdtwice"])){   //判断是否有留空
        echo "<script>alert('请正确填写信息');history.go(-1);</script>";
    }else if($_POST["newpwd"]==$_POST["newpwdtwice"]){
        $date='--------';
        $pwd=$_POST['newpwdtwice'];
        $depart=$_POST['department'];
        //$sqladdacc="insert into meeting_user(userName,userPwd,userLastLoginDate,userDepart,userLoginCount,userRight,userWhether)values('ren','123','2015年02月12日19时56分','技术部',0,0,0)";

        $sqladdacc="insert into meeting_user(userName,userPwd,userLastLoginDate,userDepart,userLoginCount,userRight,userWhether)values('$userName','$pwd','$date','$depart',0,0,0)";
        $addacc_rst=$conn->Execute($sqladdacc);
        if($addacc_rst==true){
            echo "<script>alert('帐号添加成功！！');window.close();</script>";
        }else{
//            var_dump($addacc_rst);
            echo "<script>alert('添加失败！！请重新添加');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('两次输入的密码不一样！！');history.go(-1);</script>";
    }
}
?>
    </body>
</html>