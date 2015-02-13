<?php
session_start();
include_once("conn/conn.php");
if($_SESSION["rights"]!=1){
    echo "<script>alert('非法操作！！');history.go(-1);</script>";
}else{
$sqlstrx="select * from meeting_user";
$num=10;                                                 //每页显示最大记录数
if(isset($_GET['n_page'])){	                        //判断当前页码
    $c_page = $_GET[n_page];					            //将$n_page赋给变量$c_apge
}else{
    $c_page = 1;								    //初始化变量$c_page
}
$l_rst = $conn -> PageExecute($sqlstrx,$num,$c_page);	//执行pageExecute函数
$acc_rst=$conn->Execute($sqlstrx);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/acc_manager.css" type="text/css"  rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="center" bgcolor="#CCCCCC" width="30" height="16">ID：</td>
        <td align="center" bgcolor="#CCCCCC" width="70" height="16">用户名：</td>
        <td align="center" bgcolor="#CCCCCC" width="80" height="16">用户密码：</td>
        <td align="center" bgcolor="#CCCCCC" width="80" height="16">所属部门：</td>
        <td align="center" bgcolor="#CCCCCC" width="80" height="16">修改权限：</td>
        <td align="center" bgcolor="#CCCCCC" width="80" height="16">冻结帐户：</td>
        <td align="center" bgcolor="#CCCCCC" width="80" height="16">删除</td>
    </tr>
    <?php
    while(!$l_rst->EOF){
        ?>
        <form action="acc_manager_chk.php" method="post">
            <tr>
                <td height="26"><?php echo $l_rst->fields['userId']; ?> </td>
                <td><?php echo $l_rst->fields['userName']; ?></td>
                <td><?php echo $l_rst->fields['userPwd']; ?></td>
                <td><?php echo $l_rst->fields['userDepart']; ?></td>
                <td><input type="submit" name="select_action" value="<?php if($l_rst->fields['userRight']==0){echo "设置权限";}else {echo "取消权限";}?>" /></td>
                <td><input type="submit" name="select_action" value="<?php if($l_rst->fields['userWhether']==0){echo "冻结帐户";}else {echo "解冻帐户";}?>" /></td>
                <td><input type="submit" name="select_action" value="删除帐户" /></td>
            </tr>
            <input type="hidden"  name="select_id" value="<?php echo $l_rst->fields['userId'] ?>" />
        </form>
        <?php
        $l_rst->movenext();
    }
    ?>
</table>
<div>
    <table>
        <tr>
            <td>
                <font color='#999999'>当前是第<?php echo $l_rst -> absolutePage(); ?>页/一共<?php echo $l_rst -> LastPageNo(); ?>页</font>
                <?php


                if(!$l_rst -> AtfirstPage()){					//如果当前页不是首页
                    ?>
                    <!--  输出向上翻页超链接  -->
                    <a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=1" ?>"> 首页 </a>
                    <a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() - 1); ?>"> 上一页 </a>
                    <!--  ----------------------------  -->
                <?php
                }
                if(!$l_rst -> AtlastPage()){					//如果当前页不是尾页
                    ?>
                    <!--  输出向下翻页超链接  -->
                    <a href = "<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> absolutePage() + 1); ?>"> 下一页 </a>
                    <a href ="<?php echo "?lmbs=$_GET[lmbs]&n_page=".($l_rst -> LastPageNo());?>"> 尾页 </a>
                    <!--  -----------------------------  -->

                <?php
                }

                ?>&nbsp;&nbsp;
            </td>
            <td width="120"><span style="color:#FF0000">点此添加新用户>>></span></td>
            <td>
                <a href="#" onclick="javascript:Wopen=open('addaccount.php','','height=420,width=550,scrollbars=no');"><img src="images/append_15.jpg" width="48" height="20" border="0" /></a></td>
        </tr>
    </table>
</div>
</body>
<?php
}
?>
</html>
