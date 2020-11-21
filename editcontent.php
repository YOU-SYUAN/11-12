<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']!="teacher") {
	header("Location: loginForm.php");
} 

require("todoModel.php");

$id = (int)$_GET['id'];
$rs = getJobDetail($id);
if (! $rs) {
	echo "no data found";
	exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>導師訪視說明</h1>
<table width="200" border="1">
<form method="post" action="todoUpdControl.php">
<input type='hidden' name='id' value='<?php echo $id ?>'>
		<tr><td>stuid</td><td><input name="stuid" type="text" id="msg" value="<?php echo htmlspecialchars($rs['stuid']);?>" readonly="readonly" /></td></tr>
	  <tr><td>contact</td><td><input name="contact" type="text" id="msg" value="<?php echo htmlspecialchars($rs['contact']);?>" readonly="readonly"/></td></tr>
	  <tr><td>famstatus</td><td><input name="famstatus" type="text" id="msg" value="<?php echo htmlspecialchars($rs['famstatus']);?>" readonly="readonly"/></td></tr>
	<tr><td>content</td><td><input name="content" type="text" id="msg" value="<?php echo htmlspecialchars($rs['content']);?>" /> </td></tr>
	
	  <!--<select  name="famstatus" type="select" id="famstatus" /> 
				<?php
					//echo "<option value='{$rs['famstatus']}'>{$rs['famtatus']}</option>";
				?>
					<option value='低收入戶'>低收入戶</option>
					<option value='中低收入戶'>中低收入戶</option>
					<option value='家庭突發因素'>家庭突發因素</option>
					</select> <br>-->
					<tr><td colspan="2"align="center"><input type="submit" name="Submit" value="送出" /></td></tr>
	</form>
	</table>
  </tr>
</table>
</body>
</html>
