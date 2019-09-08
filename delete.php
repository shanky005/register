<?php
/*session_start();
if(!$_SESSION['name']){
	header('location:login.php');
}*/
?>
<?php include("db.php");?>
<?php 
$delete_record=$_GET['delete'];
$img="select file from registration where id='".$delete_record."'";

$result=mysqli_query($con,$img);

$r=mysqli_fetch_array($result);

unlink("./images/".$r['file']);

$query="delete from registration where id='$delete_record'";
if(mysqli_query($con,$query))
{
echo "<p style='font-size: 25px;text-align: center; margin: 0px;    padding: 0px;'>Record Updated <p>";
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>