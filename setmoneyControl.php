<?php
require("todoModel.php");
$id=(int)$_POST['id'];
$money=(int)$_POST['money'];

if ($id) { //if title is not empty
	setmoney($id,$money);
	$msg="Updateded";
} else {
	$msg= "Message stuid cannot be empty";
}
header("Location: todoListView.php?m=$msg");
?>