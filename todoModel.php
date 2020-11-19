<?php
require_once("dbconnect.php");

function addJob($title,$msg, $urgent) {
	global $conn;
	$sql = "insert into student (title, content,urgent, addTime, status) values ('$title','$msg', '$urgent', NOW(),0);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update student set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($id,$title,$msg, $urgent) {
	global $conn;
	if ($id== -1) {
		addJob($title,$msg, $urgent);
	} else {
		$sql = "update student set title='$title', content='$msg', urgent='$urgent' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($bossMode) {
	global $conn;
	if ($bossMode == 1) {
		$sql = "select * from student order by status desc;";
	} else {
		$sql = "select * from student where status = 0;";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getJobDetail($id) {
	global $conn;
	if ($id == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"title" => "new title",
			"content" => "job description",
			"urgent" => "一般"
		];
	} else {
		$sql = "select id, title, content, urgent from student where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update student set status = 1 where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}

function rejectJob($jobID){
	global $conn;
	$sql = "update student set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function setClosed($jobID) {
	global $conn;
	$sql = "update student set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>