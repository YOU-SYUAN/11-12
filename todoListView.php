<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
//校長
if ($_SESSION['uID']=='boss'){
	$bossMode = 1;
}
//導師秘書
else if($_SESSION['uID']=='secret') {
	$bossMode = 2;
//學生
} else {
	$bossMode=0;
}
require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}



$result=getJobList($bossMode);
//$jobStatus = array('未完成','已完成','已結案','已取消');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo List !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="loginForm.php">login</a> | <a href="todoEditForm.php?id=-1">申請補助</a> <br>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>stuid</td>
    <td>contact</td>
	<td>famstatus</td>
    <td>content</td>
	<td>status</td>
	<td>-</td>
  </tr>
<?php
while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['stuid']}</td>";
	echo "<td>" , htmlspecialchars($rs['contact']), "</td>";
	echo "<td>" , htmlspecialchars($rs['famstatus']), "</td>";
	echo "<td>{$rs['content']}</td>" ;
	echo "<td>{$rs['status']}</td><td>";
	switch($rs['status']) {
		//審核中
		case 0:
			if ($bossMode == 1) {
				echo "<a href='todoSetControl.php?act=finish&id={$rs['id']}'>Agree</a>  ";	
				echo "<a href='todoSetControl.php?act=reject&id={$rs['id']}'>Disagree</a>  " ;
			}
			else if($bossMode == 2) {
				echo "<a href='todoEditForm.php?id={$rs['id']}'>Edit</a>  ";
			}
			/*else {
				echo "<a href='todoSetControl.php?act=finish&id={$rs['id']}'>Add</a>  ";
				echo "<a href='todoSetControl.php?act=finish&id={$rs['id']}'>Search</a>  ";
			}*/

			break;
		//結案
		case 1:
			echo "退回";
			break;
		case 2:
			if($bossMode == 1){
			//echo "<a href='todoSetControl.php?act=reject&id={$rs['id']}'>Reject</a>  ";
				echo "<a href='todoSetControl.php?act=cancel&id={$rs['id']}'>Close</a>  ";
			}
			break;
		default:
			break;
	}
	echo "</td></tr>";
}
?>
</table>
</body>
</html>
