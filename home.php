<?php
    session_start();
	require_once("php/connect.php");
    $update_msg="";
    if(!isset($_SESSION['uid']))
            {
                    header("location: index.php");
            }
    if(isset($_SESSION['update_success']))
    {
        $update_msg="Contact Successfully Updated !";
        unset($_SESSION['update_success']);
    }
    

    $uid = $_SESSION["uid"];
?>

<html>

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/jquery-1.12.2.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <title> Dashboard </title>
</head>

<body>

<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <a hre="#" class="navbar-brand" /> PhoneBook Directory </a>
        </div>

        <!-- Menu on Left -->
        <div>
            <ul class="nav navbar-nav">
                <li class="active"  > <a href="home.php"> Home </a> </li>
                <li  > <a href="create.php"> Create </a> </li>
                <li > <a href="delete.php"> Delete </a> </li>
                <li > <a href="search.php"> Search </a> </li>
			</ul>


            <!-- Menu on the right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $uid ; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="php/logout.php">Log-Out</a></li>

                    </ul>
                </li>

            </ul>


        </div>

    </div>

</nav>

<div class="container-fluid">

    <div class="row">

        <div class="col-xs-2" >

        </div>

        <div class="col-xs-8" style="background-color:white ">
            <div class="jumbotron" style="background-color:639694;color:white;opacity:0.6">
                <h1>eRozgar Telephone Directory</h1>
                <p>eRozgar offers users an easy way to create new contacts , manage existing and search for contacts based on criteria </p>
            </div>

            <br/><br/>
            <h3 align="center" class="text-success"><?php echo $update_msg ; ?></h3>

            <center><h1>Contacts</h1></center>
			<br><br><br>
			<table class="table table-hover"  width="50%" >

				<tr>
					<th class="col-xs-2">First Name  </th>
					<th class="col-xs-2">  Last Name  </th>
					<th class="col-xs-2">  Mobile  </th>
					<th class="col-xs-2">   </th>
					
				</tr>
				<?php
				$query = "SELECT cf_name,cl_name,mobile FROM _contact where email='$uid'";
				$result = mysqli_query($con, $query) or die(mysqli_error($con));
				$flag = FALSE;
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
					echo "<tr>
					<td>".$row['cf_name']."</td>
					<td>".$row['cl_name']."</td>
					<td>".$row['mobile']."</td>
					
					<td><a class='btn btn-primary col-xs-4' href='update.php' > Edit </a>
					 <a class='btn btn-success col-xs-4' href='#' > share </a>
					 <a class='btn btn-danger col-xs-4' href='delete.php' > Delete </a>
					</td>
					</tr>";
					$flag = TRUE;
					}
					echo "</table>";
				?>
				

			
          <!--  <div align="bottom">


                <br/><br/><br/></a> <br/><br/><br/>
                <a class="btn btn-default" href="create.php" > Create New Contact </a> <br/><br/><br/>
                <a class="btn btn-default" href="update.php" > Modify </a><br/><br/><br/>
                <a class="btn btn-default" href="search.html" > Search Contact </a> <br/><br/><br/>
                <a class="btn btn-default" href="delete.html" > Delete Contact </a> <br/><br/><br/>


            </div>  -->

        </div>

        <div class="col-xs-2" >

        </div>

    </div>

</div>


</body>

</html>