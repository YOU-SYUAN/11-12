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
<h1>秘書審核</h1>
<form method="post" action="commitcontrol.php">
	  <input type='hidden' name='id' value='<?php echo $id ?>'>
      stuid: <input name="stuid" type="text" id="msg" value="<?php echo htmlspecialchars($rs['stuid']);?>" readonly="readonly" /> <br>
      contact: <input name="contact" type="text" id="msg" value="<?php echo htmlspecialchars($rs['contact']);?>" readonly="readonly"/> <br>
	  famstatus: <input name="famstatus" type="text" id="msg" value="<?php echo htmlspecialchars($rs['famstatus']);?>" readonly="readonly"/> <br>
	  <!--<select  name="famstatus" type="select" id="famstatus" /> 
				<?php
					//echo "<option value='{$rs['famstatus']}'>{$rs['famtatus']}</option>";
				?>
					<option value='低收入戶'>低收入戶</option>
					<option value='中低收入戶'>中低收入戶</option>
					<option value='家庭突發因素'>家庭突發因素</option>
					</select> <br>-->
	  content: <input name="content" type="text" id="msg" value="<?php echo htmlspecialchars($rs['content']);?>" readonly="readonly"/> <br>
	  exresult:<input list = "exresult" name = "exresult", id ="msg">
	  <datalist  name="exresult" id="exresult" />
	  <option value='予以補助'>予以補助</option>
	  <option value='未符合補助條件'>未符合補助條件</option>
	  </datalist> <br>
	  commit:<input name="commit" type="text" id="msg" value="<?php echo htmlspecialchars($rs['commit']);?>" /> <br>
	   <input name="status" type="hidden" id="msg" value="<?php echo htmlspecialchars($rs['status']);?>" /> 
	  
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
