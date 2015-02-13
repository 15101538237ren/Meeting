<?php
session_start();
include_once("conn/conn.php");
$char=$_POST["characters"];
$type=$_POST["findtype"];
if($type==0){
    echo "<script>alert('请选择查找类型！');history.go(-1);</script>";
} else if($type==1){
    $sqlstrv="select * from meeting_info where meeting_id=$char";                  //按会议编号查找;
}else if($type==2){
    $sqlstrv="select * from meeting_info where meeting_name like '%".$char."%'";   // 按会议名称查找;

}
$l_rst = $conn->execute($sqlstrv);
$rst=$l_rst->GetRows();
$record=count($rst);
if($record==0){
    echo "没有匹配的查询结果！";
}else{
    ?>
    <h3>会议信息浏览</h3>
    <table width="722" border="0" cellspacing="0" cellpadding="0">
        <tr class="tableheader">
            <td width="50">会议编号</td>
            <td width="60">会议名称</td>
            <td width="60">部门名称</td>
            <td width="80">会议地点</td>
            <td width="80">会议日期</td>
            <td width="45">主持人</td>
            <td width="60">出席人员</td>
            <td width="45">记录人</td>
            <td width="120">会议摘要</td>
            <td width="45">上传者</td>
            <td width="60">查看详情</td>
        </tr>
        <?php
        for($i=0;$i<$record;$i++){
            ?>

            <tr>
            <td height="22"><?php echo $rst[$i]['meeting_id']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_name']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_department']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_place']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_date']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_host']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_present']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_recorder']; ?></td>
            <td height="22"><?php echo $rst[$i]['meeting_abstract']; ?></td>
            <td height="22">
                <?php
                $id= $rst[$i]['uploader_id'];

                $sqlstr="select * from meeting_user WHERE userId=$id";
                $rstl=$conn->execute($sqlstr);
                echo $rstl->fields['userName'];
                ?></td>
            <td height="22" align="center"><a href="#" onclick="javascript:Wopen=open('showinfo.php?id=<?php echo $rst[$i]['meeting_id']; ?>','','height=720,width=1004,scrollbars=no');"><img src="images/xiazai.gif" width="26" height="18" border="0" alt="详情"></a></td>
            </tr>
            <?php
        }
        ?>
    </table>
<?php
}
?>