<?php
session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/viewmeeting.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=tf-8" />
    <title>无标题文档</title>
</head>

<body>
<h3>会议信息浏览</h3>

<?php
$sqlview="select * from meeting_info";
$num=10;                                                 //每页显示最大记录数
if(isset($_GET['n_page'])){	                        //判断当前页码
    $c_page = $_GET['n_page'];					            //将$n_page赋给变量$c_apge
}else{
    $c_page = 1;								    //初始化变量$c_page
}
$l_rst = $conn -> PageExecute($sqlview,$num,$c_page);	//执行pageExecute函数
$rst_view = $conn->execute($sqlview);
$record=count($rst_view->GetRows());                    //获取总记录数
if($record==0){
    echo "<span class=\"norecord\">当前没有任何记录</span>";
}else{
?>

<table width="728" border="0" cellspacing="0" cellpadding="0" bordercolor="#66CC00">
    <tr class="tableheader">
        <td width="55" align="center" height="25">会议编号</td>
        <td width="60" align="center">会议名称</td>
        <td width="60" align="center">部门名称</td>
        <td width="80" align="center">会议地点</td>
        <td width="80" align="center">会议日期</td>
        <td width="45" align="center">主持人</td>
        <td width="60" align="center">出席人员</td>
        <td width="45" align="center">记录人</td>
        <td width="120" align="center">会议摘要</td>
        <td width="45" align="center">上传者</td>
        <td width="60" align="center">查看详情</td>
    </tr>
    <?php
    while(!$l_rst->EOF){
        ?>

        <tr>
            <td height="30"><?php echo $l_rst->fields['meeting_id']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_name']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_department']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_place']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_date']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_host']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_present']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_recorder']; ?></td>
            <td height="30"><?php echo $l_rst->fields['meeting_abstract']; ?></td>
            <td height="30">
                <?php
                $id= $l_rst->fields['uploader_id'];

                $sqlstr="select * from meeting_user WHERE userId=$id";
                $rst=$conn->execute($sqlstr);
                echo $rst->fields['userName'];
                ?></td>
            <td height="30" align="center"><a href="#" onclick="javascript:Wopen=open('showinfo.php?id=<?php echo $l_rst->fields[0]; ?>','','height=720,width=1004,scrollbars=no');"><img src="images/xiazai.gif" width="26" height="18" border="0" alt="详情"></a></td>
        </tr>
        <?php
        $l_rst->movenext();
    }

    ?>
</table>
<div class="sepa_page">
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
                ?><?php
                }
                ?>
            </td>
            <td width="100" align="right"><span style="color:#FF0000">点此导出报表>>></span></td>
            <td width="60">
                <a href="createform.php"><img align="bottom"src="images/out_15.jpg" width="48" height="20" border="0" /></a>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
