<?php
require_once("dbconnect.php");

function addJob($stuid, $contact, $famstatus, $content) {
	global $conn;
	$sql = "insert into student (stuid, contact, famstatus, content, status) values ('$stuid', '$contact', '$famstatus', '$content', 0);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update student set status = 3 where id=$jobID and status =2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($id, $stuid, $contact, $famstatus, $content,$exresult,$commit) {
	global $conn;
	if ($id== -1) {
		addJob($stuid, $contact, $famstatus, $content);
	} /*else if($bossMode == 2){
		$sql = "update student set commit='$commit',exresult='$exresult' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}*/ else {
		$sql = "update student set content='$content' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error");
	}
}
function editcommit($id, $stuid, $contact, $famstatus, $content,$exresult,$commit) {
	global $conn;
	$sql = "update student set commit='$commit',exresult='$exresult' where id=$id;";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error");
}
function getJobList($bossMode) {
	global $conn;
	if ($bossMode == 1) {
		$sql = "select * from student;";
	} else {
		$sql = "select * from student where status = 0 or status = 1 or status=2;";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getJobDetail($id) {
	global $conn;
	if ($id == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"stuid" => "studentID",
			"contact" => "Your contacter",
			"famstatus" => "低收入戶",
			"content" => "",
			"commit" => "",
			"status" => "0"
		];
	} else {
		$sql = "select id, stuid, contact, famstatus, content,commit, status from student where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update student set status = 2 where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}

function rejectJob($jobID){
	global $conn;
	$sql = "update student set status = 1 where id=$jobID and status = 0;";
	mysqli_query($conn,$sql);
}


?>