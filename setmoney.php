<?php
session_start();
//if (! isset($_SESSION['uID']) or $_SESSION['uID']!="boss") {
//	header("Location: loginForm.php");
//} 

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
<h1>秘書審核補助金額</h1>
<table width="200" border="1">
<form method="post" action="setmoneyControl.php">
	  <input type='hidden' name='id' value='<?php echo $id ?>'>
      <tr><td>stuid</td><td><?php echo htmlspecialchars($rs['stuid']);?></td></tr>
      <!--stuid: <?php //echo htmlspecialchars($rs['stuid']);?><br>-->
      <tr><td>contact</td><td><?php echo htmlspecialchars($rs['contact']);?></td></tr>
      <!--contact:<?php //echo htmlspecialchars($rs['contact']);?> <br>-->
      <tr><td>famstatus</td><td><?php echo htmlspecialchars($rs['famstatus']);?></td></tr>
	  <!--famstatus: <?php //echo htmlspecialchars($rs['famstatus']);?><br>-->
	  <!--<select  name="famstatus" type="select" id="famstatus" /> 
				<?php
					//echo "<option value='{$rs['famstatus']}'>{$rs['famtatus']}</option>";
				?>
					<option value='低收入戶'>低收入戶</option>
					<option value='中低收入戶'>中低收入戶</option>
					<option value='家庭突發因素'>家庭突發因素</option>
					</select> <br>-->
      <tr><td>content</td><td><?php echo htmlspecialchars($rs['content']);?></td></tr>
	  <!--content: <input name="content" type="text" id="msg" value="<?php //echo htmlspecialchars($rs['content']);?>" readonly="readonly"/> <br>-->
	  <tr><td>exresult</td><td><?php echo htmlspecialchars($rs['exresult']);?></td></tr>
      <!--exresult: <input name="exresult" type="text" id="msg" value="<?php //echo htmlspecialchars($rs['exresult']);?>" readonly="readonly"/> -->
	  <tr><td>money</td><td><input name="money" type="text" id="msg" value="<?php echo htmlspecialchars($rs['money']);?>" /> </td></tr>
      <tr><td>commit</td><td><?php echo htmlspecialchars($rs['commit']);?></td></tr>
      <!--commit:<input name="commit" type="text" id="msg" value="<?php //echo htmlspecialchars($rs['commit']);?>" /> <br>-->
	   <!--<input name="status" type="hidden" id="msg" value="<?php //echo htmlspecialchars($rs['status']);?>" /> -->
      <tr><td colspan="2"align="center"><input type="submit" name="Submit" value="送出" /></td></tr>
	</form>
    </table>
  </tr>
</table>
</body>
</html>
