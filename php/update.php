<?php
	session_start();
	require_once("connect.php");
	$uid = $_SESSION['uid'];
	
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$mobile=$_POST['txtmobile'];
	$landline=$_POST['txtlandline'];
	$email=$_POST['txtemail'];
	
	$res=mysqli_query($con,"update _contact set cf_name='$fname',cl_name='$lname',contactEmail='$email', landline=$landline where mobile=$mobile ") or die("UPdate failed"+mysqli_error($con));
	if($res!=0)
	{
		$_SESSION['update_success']=true;
		header("location:../home.php");
		mysqli_close($con); 
	}
	else
		echo "Update Failed : Error in query";
	
?>