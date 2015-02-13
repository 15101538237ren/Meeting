<?php session_start();
include_once("conn/conn.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="js/add_meeting.js"></script>
    <link href="css/addmeeting.css" type="text/css" rel="stylesheet" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>
<body>
<div class="add_m_info">
    <table cellpadding="0" cellspacing="0" border="0">
        <form  id="theForm" name="theForm" action="addmeeting_chk.php" method="post" onSubmit="return check_submit();" enctype="multipart/form-data">
            <tr><td colspan="3" height="32"><h1 align="center">添加会议记录</h1></td></tr>
            <tr>
                <td width="120" height="28"><div align="center">会议名称:</div></td>
                <td><input class="input2"  type="text" name="meeting_name" /></td>
                <td align="left" width="180" ><span class="sp1">*填写会议记录名称</span></td>
            </tr>

            <tr>
                <td height="28"><div align="center">部门名称:</div></td>
                <td>
                    <div align="left">
                        <select class="upload" name="department">
                            <option>请选择部门</option>
                            <?php
                            $sqlstr="select depart_name from meeting_depart";

                            $l_rst = $conn->Execute($sqlstr);
                            while(!$l_rst->EOF){
                                ?>
                                <option value="<?php echo $l_rst->fields[0]; ?>"><?php echo  $l_rst->fields[0]; ?></option>
                                <?php
                                $l_rst->movenext();
                            }
                            ?>
                        </select>
                    </div></td>
                <td  align="left" width="180"><span class="sp1">*选择举行会议部门</span></td>
            </tr>
            <tr>
                <td height="28"><div align="center">会议地点:</div></td>
                <td><input class="input2" type="text" name="meeting_place" /></td>
                <td align="left" width="180"><span class="sp1">*填写会议地点名称</span></td>
            </tr>
            <tr>
                <td height="28"><div align="center">会议日期:</div></td>
                <td>
                    <select  class="upload" name="b_y">
                        <?php
                        for($i=2015;$i<2025;$i++){
                            echo "<option value=".$i.">".$i."";
                        }
                        ?>
                    </select>年
                    <select name="b_m">
                        <?php
                        for($i=1;$i<13;$i++){
                            echo "<option value=".$i.">".$i."";
                        }
                        ?>
                    </select>月
                    <select name="b_d">
                        <?php
                        for($i=1;$i<32;$i++){
                            echo "<option value=".$i.">".$i."";
                        }
                        ?>
                    </select>日   </td>
                <td align="left" width="180"><span class="sp1">*选择会议召开日期</span></td>
            </tr>
            <tr>
                <td height="28"><div align="center">会议主持人:</div></td>
                <td><input class="input2" type="text" name="meeting_host" /></td>
                <td align="left" width="180"><span class="sp1">*填写会议主持人&nbsp;&nbsp;</span></td>
            </tr>
            <tr>
                <td height="28" ><div align="center">会议记录人:</div></td>
                <td><input class="input2" type="text" name="meeting_saver" /></td>
                <td align="left" width="180"><span class="sp1">*填写会议记录人</span></td>
            </tr>
            <tr>
                <td height="28"><div align="center">出席人员:</div></td>
                <td><input class="input2" type="text" name="meeting_present" /></td>
                <td align="left" width="180"><span class="sp1">*填写会议出席人员</span></td>
            </tr>
            <tr>
                <td height="28">上传会议内容</td><td><input class="upload" name="meeting_documents" type="file" size="16"></td>
                <td align="left" width="180"><span class="sp1">*上传txt格式会议文稿</span></td>
            </tr>

            <tr>
                <td ><div align="center">会议摘要:</div></td>
                <td height="70"><textarea  style="width:170px; border:1px solid #CCCCCC"name="textarea" rows="4"></textarea></td>
                <td align="left" width="180"><span class="sp1">*填写会议记录摘要</span></td>
            </tr>
            <tr>
                <td height="12"colspan="3"></td>
            </tr>
            <tr>
                <td  height="30" colspan="2"><center><input class="add_mbtn1" type="submit" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;<input class="add_mbtn2" type="reset" value="" /></center></td><td></td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>
