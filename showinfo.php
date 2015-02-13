<?php
//session_start();
include_once("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="css/showinfo.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会议详情</title>
</head>
<body>
<?php
$id=$_GET["id"];
$sqlstriii="select * from meeting_info where meeting_id =$id";
$s_rst=$conn->Execute($sqlstriii);
?>
<div class="infoshow">
    <table width="560" border="0" cellspacing="0" cellpadding="0">
        <form action="printwindow.php" method="post">
            <tr><td colspan="4" align="center"><h3 class="ht">北航软件学院会议记录详情</h3></td></tr>
            <tr>
                <td width="134"><div align="right">会议编号：</div></td>
                <td width="340"><?php echo $s_rst->fields['meeting_id']?></td>
                <td width="135"><div align="right">会议名称：</div></td>
                <td width="341"><?php echo $s_rst->fields['meeting_name']?></td>
            </tr>
            <tr>
                <td><div align="right">部门名称：</div></td>
                <td><?php echo $s_rst->fields['meeting_department']?></td>
                <td><div align="right">会议地点：</div></td>
                <td><?php echo $s_rst->fields['meeting_place']?></td>
            </tr>
            <tr>
                <td><div align="right">会议日期：</div></td>
                <td><?php echo $s_rst->fields['meeting_date']?></td>
                <td><div align="right">会议主持人：</div></td>
                <td><?php echo $s_rst->fields['meeting_host']?></td>
            </tr>
            <tr>
                <td><div align="right">出席人员：</div></td>
                <td><?php echo $s_rst->fields['meeting_present']?></td>
                <td><div align="right">会议记录人：</div></td>
                <td><?php echo $s_rst->fields['meeting_recorder']?></td>
            </tr>
            <tr>
                <td><div align="right">会议摘要：</div></td>
                <td colspan="3"><div align="left"><?php echo $s_rst->fields['meeting_abstract']?></div></td>
            </tr>

            <tr>
                <td height="23"><div align="right">会议内容：</div></td>
                <td height="23" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td height="200" colspan="4">
                    <div class="content">
                        <?php
                        $address=$s_rst->fields['meeting_file_path'];
                        $myfile=fopen("$address","r");
                        $myline=fgets($myfile);
                        echo $myline;
                        fclose($myfile);
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" align="center"><input type="hidden" name="id"  value="<?php echo $id; ?>"/></td>
            </tr>

    </table>
</div>
<div class="printbutton">
    <input  type="submit" value="打印预览" name="printview" />
    &nbsp;&nbsp;
    <input type="submit" value="打印"  name="print" />

    </form>
</div>
</body>
</html>
