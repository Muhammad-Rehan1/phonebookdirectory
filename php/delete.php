<?php 
	session_start();
	require_once("connect.php");
	
	$mobile = (int) $_POST['txtdelete'];
	$uid = $_SESSION['uid'];
	
	if(mysqli_query($con," delete from _contact where mobile=$mobile "))
	{
		$_SESSION['delete_success']="Contact Successfully Deleted !";
		header("Location: ..\delete.php ");
	}
	else
	{
		$_SESSION['delete_success']="Could Not Find Contact !";
		header("Location: ..\delete.php ");
	}

	mysqli_close($con);

?>