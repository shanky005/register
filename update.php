<?php
/*session_start();
if(!$_SESSION['name']){
	header('location:login.php');
}*/
?>
<?php include("db.php");?>
<?php 
if(isset($_POST['update']))
   {    
         $id=$_GET['update'];
	     $name=$_POST['name'];
		 $class=$_POST['class'];
		 /* image upload in image folder */
		 $image=$_FILES['image'] ['name'];
		 $tpm_name1=$_FILES['image']['tmp_name'];
         move_uploaded_file($tpm_name1,"images/".$image);
		 
		 $gender=$_POST['gender'];
		 
		 $hobby1 = implode(",",$_POST['hobby']);
		 
		 $email=$_POST['email'];
		 /*$pwd=md5($_POST['pwd']);*/
		 $mobile=$_POST['mobile'];
		 
		 if($image==''){
		 $sql="update registration set name='$name',class='$class',gender='$gender',hobby='$hobby1',email='$email',mobile='$mobile' where id='$id'";
		 $run=mysqli_query($con,$sql);
		 if($run)
		    {
				echo "<p style='font-size: 25px;text-align: center; margin: 0px; padding: 0px;'>Record Updated <p>";
	            echo "<meta http-equiv=\"refresh\" content=\"0;URL=detail.php\">";
			}
		 }	
			else
			{
				 $sql="update registration set name='$name',class='$class',file='$image',gender='$gender',hobby='$hobby1',email='$email',mobile='$mobile' where id='$id'";
		         $run=mysqli_query($con,$sql);
				 
				 if($run)
				    {
				     echo "<p style='font-size: 25px;text-align: center; margin: 0px; padding: 0px;'>Record Updated <p>";
	                 echo "<meta http-equiv=\"refresh\" content=\"0;URL=detail.php\">";
			        }
			}		
   }
	
?> 