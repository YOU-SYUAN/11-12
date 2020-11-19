<?php
require("todoModel.php");
$id=(int)$_POST['id'];
$stuid=mysqli_real_escape_string($conn,$_POST['stuid']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$famstatus=mysqli_real_escape_string($conn,$_POST['famstatus']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$status=mysqli_real_escape_string($conn,$_POST['status']);

if ($content) { //if title is not empty
	updateJob($id, $stuid, $contact, $famstatus, $content, $status);
	$msg="Message updateded";
} else {
	$msg= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$msg");
?>