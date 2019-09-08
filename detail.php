<?php
/*session_start();
if(!$_SESSION['name']){
	header('location:login.php');
}*/
?>
<?php include("db.php");?>
<?php
$sql="select * from registration";
$run=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($run);
$name=$row['name'];
$class=$row['class'];
$path="images/".$row['file'];
$gender=$row['gender'];
$id=$row['id'];
$hobby1 = explode(",",$row['hobby']);
$email=$row['email'];
/*$pwd=md5($row['pwd']);*/
$mobile=$row['mobile'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration form</title>
</head>

<body>
<form action="update.php?update=<?php echo $id;?>" method="post" enctype="multipart/form-data">
<table border="2" bgcolor="#d9d9d9" align="center">
<tr>
<td><label for="name">Name: </label></td>
<td><input type="text" name="name" value="<?php echo $name?>" /></td></tr> 
<tr>
<td><label for="class">Class:</label></td>
<td><select name="class" value="">
  <option value="0"><?php echo $class ?></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select></td></tr>
<tr>
<td><label for="file">File:</label></td>
<td><input type="file" name="image" value="image"><img src="<?php echo $path?>" height="70px" width="70px"></td></tr>
<tr>
<td><label for="gender">Gender:</label></td>
<td><input type="radio" name="gender" value="male" <?php if($gender=='male') echo "checked" ;?> />Male &nbsp; <input type="radio" name="gender" value="Female" <?php if($gender=='Female') echo "checked";?> />Female</td></tr>
<tr>
<td><label for="hobby">Hobbies:</label></td>
<td><input type="checkbox" name="hobby[]" value ="cricket" <?php in_array ('cricket',$hobby1 )?print "checked":"";?> />cricket &nbsp; 
<input type="checkbox" name="hobby[]" value="football" <?php in_array ('football',$hobby1 )?print "checked":"";?>>football &nbsp;
<input type="checkbox" name="hobby[]" value="music" <?php in_array ('music',$hobby1 )?print "checked":"";?>>music &nbsp;
<input type="checkbox" name="hobby[]" value="snooker" <?php in_array ('snooker',$hobby1 )?print "checked":"";?>>snooker &nbsp; 
<input type="checkbox" name="hobby[]" value="kabbadi" <?php in_array ('kabbadi',$hobby1 )?print "checked":"";?>>kabbbadi &nbsp; 
  </td></tr>
<tr>
<td><label for="email">Email Id: </label></td>
<td><input type="text" name="email" value="<?php echo $email?>" /></td></tr>
<!--<tr>
<td><label for="password">Password:</label></td>
<td><input type="password" name="pwd" value="<?php echo $pwd?>" /></td></tr>-->
<tr>
<td><label for="mobile">Mobile No </label></td>
<td><input type="text" name="mobile" value="<?php echo $mobile ?>" /></td></tr>
<tr>
<td colspan="2" align="center" bgcolor="#99b3ff"><input type="submit" name="update" value="Update" /></td></tr>
<tr>
<td colspan="2" align="center" bgcolor="#4d4dff"><button><a href="delete.php?delete=<?php echo $id;?>">Delete</a></button></td>
</tr>
</table>
</form>
</body>
</html>
<?php 
/*if(isset($_POST['register']))
    {
		 $name=$_POST['name'];
		 $class=$_POST['class'];
		 /* image upload in image folder */
		 /*$image=$_FILES['image'] ['name'];
		 $tpm_name1=$_FILES['image']['tmp_name'];
         move_uploaded_file($tpm_name1,"images/".$image);
		 
		 $gender=$_POST['gender'];
		 
		 $hobby1 = implode(",",$_POST['hobby']);
		 
		 $email=$_POST['email'];
		 $pwd=md5($_POST['pwd']);
		 $mobile=$_POST['mobile'];
		
		 
         $query="INSERT INTO registration(name,class,file,gender,hobby,email,pwd,mobile,reg_time)VALUES('$name','$class','$image','$gender','$hobby1','$email','$pwd','$mobile',now())";
		 $run=mysqli_query($con,$query);
            if($run)
                    {
	                  echo "user created successfully";
                    }
	        else
	                {
		             echo "error in inserted".mysqli_error($run); 
		            }
	}*/
?>