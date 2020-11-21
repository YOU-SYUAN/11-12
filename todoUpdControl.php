<?php
require("todoModel.php");
$id=(int)$_POST['id'];
$stuid=mysqli_real_escape_string($conn,$_POST['stuid']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$famstatus=mysqli_real_escape_string($conn,$_POST['famstatus']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
//$exreslut=mysqli_real_escape_string($conn,$_POST['exresult']);
//$commit=mysqli_real_escape_string($conn,$_POST['commit']);

if ($stuid) { //if title is not empty
	updateJob($id, $stuid, $contact, $famstatus, $content);
	$msg="Updateded";
} else {
	$msg= "Message stuid cannot be empty";
}
header("Location: todoListView.php?m=$msg");
?>