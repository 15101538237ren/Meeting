<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="js/found.js"></script>
    <link href="css/found.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>
<body>
<table border="0">
    <tr>
        <td align="center" colspan="2" height="32">
            查找会议记录
        </td>
    </tr>
    <form id="found" name="found" action="manager.php?lmbs=查找会议结果" method="post" onSubmit="return check_submit()">
        <tr><td height="26">查询内容：</td><td><input class="input_found"name="characters" type="text" /></td></tr>
        <tr>
            <td height="26">查找类型：</td>
            <td  align="left">
                <select name="findtype">
                    <option value="0"><-查找类型-></option>
                    <option value="1">会议编号</option>
                    <option value="2">会议名称</option>
                </select>
            </td></tr>
        <tr>
            <td height="26" colspan="3" align="center"><input class="found_btn" type="submit" value="" /></td>
        </tr>
    </form>
</table>
</body>
</html>
