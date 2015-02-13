<?php
session_start();
include_once("conn/conn.php");
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <body>
<?php
session_start();
include_once("conn/conn.php");
$selectType=$_POST["select_action"];

$select_id=$_POST['select_id'];
if($selectType=="删除帐户"){
    $sqlstract="delete from meeting_user where userId=$select_id";
    if($_POST["select_id"]!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
        if($del_rst){
            echo "<script>alert('删除成功！！');history.go(-1);</script>";
        }else{
            echo "<script>alert('删除失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('该帐户禁止被操作！！');history.go(-1);</script>";
    }
}
if($selectType=="冻结帐户"){
    $sqlstract="update meeting_user set userWhether=1 where userId=$select_id";
        $del_rst=$conn->Execute($sqlstract);
        if($del_rst){
            echo "<script>alert('该用户已冻结！！');history.go(-1);</script>";
        }else{
            echo "<script>alert('操作失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('该帐户禁止被操作！！');history.go(-1);</script>";
    }
if($selectType=="解冻帐户"){
    $sqlstract="update meeting_user set userWhether=0 where userId=$select_id";
    if($select_id!=1){
        $del_rst=$conn->Execute($sqlstract);
        if($del_rst){
            echo "<script>alert('该用户已解冻！！');history.go(-1);</script>";
        }else{
            echo "<script>alert('操作失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('该帐户禁止被操作！！');history.go(-1);</script>";
    }
}

if($selectType=="设置权限"){
    $sqlstract="update meeting_user set userRight=1 where userId=$select_id";
    if($select_id!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
        if($del_rst){
            echo "<script>alert('设置成功！该用户已成为管理员！');history.go(-1);</script>";
        }else{
            echo "<script>alert('操作失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('该帐户禁止被操作！！');history.go(-1);</script>";
    }
}
if($selectType=="取消权限"){
    $sqlstract="update meeting_user set userRight=0 where userId=$select_id";
    if($select_id!=1 && $_POST["select_id"]!=$_SESSION["id"]){
        $del_rst=$conn->Execute($sqlstract);
        if($del_rst){
            echo "<script>alert('取消成功！该用户已被取消管理员！');history.go(-1);</script>";
        }else{
            echo "<script>alert('操作失败！！');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('该帐户禁止被操作！！');history.go(-1);</script>";
    }
}

?>
    </body>
</html>