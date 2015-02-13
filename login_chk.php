<?php
/**
 * Created by PhpStorm.
 * User: ren
 * Date: 15/2/12
 * Time: 下午2:43
 */

session_start();
include_once("conn/conn.php");//加载数据库连接文件

if(empty($_POST['username']) or empty($_POST['password']))
{
   echo "用户名或密码不能为空";
}
else {
//    $username = 'admin';
//    $password ='admin';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sqltest = "select * from meeting_user where userName='$username';";
    $testrst =& $conn->Execute($sqltest);//执行查询操作
    //var_dump($testrst);
    if($testrst)
    {
        if (!$testrst->{"fields"}) {

            echo "用户不存在!";
        } else if(!($testrst->{"fields"}["userPwd"]===$password)){

            echo "密码错误!";
        }
        else if($testrst->{"fields"}["userWhether"]!=0)
        {
            echo "用户名被冻结,请联系管理员!";
        }
        else
        {
            $array=$testrst->{"fields"};
            $userId=$_SESSION['id']=$array["userId"];
            $_SESSION['name']=$array["userName"];
            $_SESSION['lasttime']=$array["userLastLoginDate"];
            $_SESSION['rights']=$array["userRight"];
            date_default_timezone_set('PRC');
            $loginDateTime=date(Y."年".m."月".d."日".G."时".i."分");//当前登录时间
            $loginCount=$array["userLoginCount"];
            $loginCount++;
            $sqlUpdate="update meeting_user set userLoginCount=$loginCount,userLastLoginDate='$loginDateTime' where userId=$userId;";
            $testrst=$conn->Execute($sqlUpdate);
            echo "登录成功";
        }
    }
    else
    {
       echo "内部错误!";
    }
}
