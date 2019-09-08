<?php 
session_start();
?>
<?php include("db.php");?>
<html>
<head>
	<title>Student registrtion </title>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){

});// validate function ends here

</script>
</head>
<body>
<form id="form"  method="post" enctype="multipart/form-data">
<table border="1" align="center"  bgcolor="#d9d9d9">
<tr>
<td>Student Name </td>
<td><input type="text" name="name" placeholder="Your Name" /></td>
</tr>

<tr>
<td>Student Password </td>
<td><input type="password" name="pwd" placeholder="Your Password"/></td>
</tr>


<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" value="Login"/>
</td>
</tr>
<tr>
<td colspan="2" align="center">
<button><a href="index.php">Register</a></button>
</td>
</tr>
</table>
</form>
</body>
</html>	
<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];          
	$pwd=md5($_POST['pwd']);
	
	$_SESSION['name']=$name;
    $_SESSION['pwd']=$pwd;
	
	$sql="select * from registration where name='$name' and pwd='$pwd'";
	$run=mysqli_query($con,$sql);
	if(mysqli_num_rows($run)>0)
	                  {
                         header('location:detail.php');

                      }
                      else{
                             echo"<script>alert('username or pass is incorrect')</script>";
                          }
}
?>