<?php
    session_start();

   require_once("connect.php");
    
    $email = $_POST['txtuname'];
    $pass = $_POST['txtpass'];
     
	/* $sql = "select * from _users where email='$email'";
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_array($result);
	

 if ($data['email']==$email){
	 
	 echo "email";
    // output data of each row
    if($data['pass']== md5($pass))
        {
            $_SESSION['uid']=$email;
            header('Location: ..\home.php') or die(" Error ");
        }else{
			echo "password not match";
		}
		} else {
    echo "0 results";  
} */
    # Validate login credentials
    
   $result = mysqli_query($con,"select * from _users where email='$email'") or die(" Error ");
   $data = mysqli_fetch_array($result);
 
 if($data['email']!=$email){
	 
	 echo "email does not match";
 }else{
	 echo "email match";
	 if($data['pass']!=md5($pass))
	 {
		 echo "password not matched";
	 }else{
		$_SESSION['uid']=$email;
        header('Location: ..\home.php') or die(" Error ");
	 }
	 
 }
	
   /*  if ($data['email']==$email){
		echo "email";
        if($data['pass']==md5($pass))
        {
            $_SESSION['uid']=$email;
            header('Location: ..\home.php') or die(" Error ");
        }
        
    }
        $_SESSION['login_error']=true; 
        header("Location: ..\index.php") or die(" Error ");  */
    mysqli_close($con);
  

?>