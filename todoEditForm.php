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
<h1>Edit Task</h1>
<form method="post" action="todoUpdControl.php">

	  <input type='hidden' name='id' value='<?php echo $id ?>'>
      title: <input name="stuid" type="text" id="msg" value="<?php echo htmlspecialchars($rs['stuid']);?>" /> <br>
      task content: <input name="contact" type="text" id="msg" value="<?php echo htmlspecialchars($rs['contact']);?>" /> <br>
	  task content: <input name="famstatus" type="text" id="msg" value="<?php echo htmlspecialchars($rs['famstatus']);?>" /> <br>
	  task content: <input name="content" type="text" id="msg" value="<?php echo htmlspecialchars($rs['content']);?>" /> <br>
	  task content: <input name="status" type="text" id="msg" value="<?php echo htmlspecialchars($rs['status']);?>" /> <br>

      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
