<?php
$con=mysqli_connect("localhost","root","password")or die("Not able to connect");

$dbcon=mysqli_select_db($con,"interview");
	
if(isset($_REQUEST['delid'])){
	$delid=$_REQUEST['delid'];
	$query=mysqli_query($con,"delete from register where id='$delid'");
	header('Location:show.php');
}

?>