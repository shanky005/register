<?php include("db.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration form</title>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="http://jquery.bassistance.de/validate/additional-methods.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	alert('hellow');
$('#form').validate({
	          
	   rules:{
		       
			    name:{
					    required:true,
						minlength:4,
                        maxlength:20
				     },
				mobile:{

						required: true,
						number:true,
						minlength:10,
						maxlength:10
					  },
                file:{
						required: true,
					  },
                email:{
						required:true,
						email:true
					  }					  
	         },//rule ends here
        
        messages:{
						name:{
								required:"Name is Required",
								minlength:"Name Min 4 Char. long",
								maxlength:"Name Max 20 Char. long"
							
						     },
						mobile:{

								required: 'Number is required',
								number:'only number',
								minlength:'Name Min 10 Char. long',
								maxlength:'Name Min10 Char. long'
                              },
                        
						file:{

                                required: 'image is required',

                              },
						email:{
							required:"Email Required",
							email:"Invalid Email"
						}
					}		
      });	// validate function ends here
});//main function ends here
</script>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" id="form">
<table border="2" bgcolor="#d9d9d9" align="center">
<tr>
<td><label for="name">Name: </label></td>
<td><input type="text" name="name" id="name" /></td></tr> 
<tr>
<td><label for="class">Class:</label></td>
<td><select name="class">
  <option value="0">Select</option>
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
<td><input type="file" name="image" value="image"></td></tr>
<tr>
<td><label for="gender">Gender:</label></td>
<td><input type="radio" name="gender" value="male" >Male &nbsp; <input type="radio" name="gender" value="Female">Female</td></tr>
<tr>
<td><label for="hobby">Hobbies:</label></td>
<td><input type="checkbox" name="hobby[]" value ="cricket">cricket &nbsp; 
<input type="checkbox" name="hobby[]" value="football">football &nbsp;
<input type="checkbox" name="hobby[]" value="music">music &nbsp;
<input type="checkbox" name="hobby[]" value="snooker">snooker &nbsp; 
<input type="checkbox" name="hobby[]" value="kabbadi">kabbbadi &nbsp; 
  </td></tr>
<tr>
<td><label for="email">Email Id: </label></td>
<td><input type="text" name="email" id="email" /></td></tr>
<tr>
<td><label for="password">Password:</label></td>
<td><input type="password" name="pwd" id="registered pwd" /></td></tr>
<tr>
<td><label for="mobile">Mobile No </label></td>
<td><input type="text" name="mobile" id="mobile" /></td></tr>
<tr>
<td colspan="2" align="center" bgcolor="#99b3ff"><input type="submit" name="register" value="Registered" /></td></tr>
<tr>
<td colspan="2" align="center" bgcolor="#4d4dff"><button><a href="login.php">Login</a></button></td>
</tr>
</table>
</form>
</body>
</html>
<?php 
if(isset($_POST['register']))
    {
		 $name=$_POST['name'];
		 $class=$_POST['class'];
		 /* image upload in image folder */
		 $image=$_FILES['image'] ['name'];
		 $tpm_name1=$_FILES['image']['tmp_name'];
         move_uploaded_file($tpm_name1,"images/".$image);
		 
		 $gender=$_POST['gender'];
		 
		 $hobby1 = implode(",",$_POST['hobby']);
		 
		 $email=$_POST['email'];
		 $pwd=md5($_POST['pwd']);
		 $mobile=$_POST['mobile'];
		
		 /*$query="INSERT INTO registration (name,class,file,gender,hobby,email,pwd,mobile,reg-time)VALUES('$name','$class','$image','$gender','$hobby','$email','$pwd','$mobile',now())";*/
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
	}
	?>