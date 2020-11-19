<?php
require_once("dbconnect.php");

function addJob($stuid, $contact, $famstatus, $content, $status) {
	global $conn;
	$sql = "insert into student (stuid, contact, famstatus, content, status) values ('$stuid', '$contact', '$famstatus', '$content', '$status';";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update student set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($id, $stuid, $contact, $famstatus, $content, $status) {
	global $conn;
	if ($id== -1) {
		addJob($stuid, $contact, $famstatus, $content, $status);
	} else {
		$sql = "update student set stuid='$stuid', contact='$contact', famstatus='$famstatus', content='$content', status ='$status' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($bossMode) {
	global $conn;
	if ($bossMode == 1) {
		$sql = "select * from student;";
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
			"stuid" => "new title",
			"contact" => "job description",
			"famstatus" => "一般",
			"content" => "m",
			"status" => "0"
		];
	} else {
		$sql = "select id, stuid, contact, famstatus, content, status from student where id=$id;";
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