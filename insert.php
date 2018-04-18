<?php
$con=mysqli_connect("localhost","root","password")or die("Not able to connect");
$dbcon=mysqli_select_db($con,"interview");
if(isset($_REQUEST["submit"])){
	 $user=$_REQUEST["username"];
	$pass=$_REQUEST["password"];
	$add=$_REQUEST["address"];
	$country=$_REQUEST["country"];
	$gender=$_REQUEST["gender"];
	$education=$_REQUEST["education"];
	$edu=implode(",",$education); 
	//$img = $_FILES["myfile"]; print_r($img); 
	if(!empty($_FILES["myfile"]["name"])){
		$file = $_FILES["myfile"];
		$ext = substr(strtolower(strchr($_FILES["myfile"]["name"],'.')),1);
		$ext_arr = array('jpg','jpeg','gif','png');
		if(in_array($ext,$ext_arr)){
		   if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"images/".$_FILES["myfile"]["name"])){
			   $img = $_FILES["myfile"]["name"];
		   }	
		}else{
			
		    echo 'Invalid File Format';
		}
	}
	//exit;
	mysqli_query($con,"insert into register (username,password,address,country,gender,education,image) values ('$user','$pass','$add','$country','$gender','$edu','$img')");
	header("Location:show.php");

}
?>


<html>
<title>Test</title>
<body>
<form method="post" action="" enctype="multipart/form-data">
Username:<input type="text" name="username"><br><br>
Password:<input type="password" name="password"><br><br><br>
Address:<textarea type="text" name="address"></textarea><br><br><br>
Country:<select name="country">
<option value="">Select Any Country</option>
<option value="india">India</option>
<option value="nepal">Nepal</option>
</select><br><br><br>
Gender:<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female<br><br><br>
Education:<input type="checkbox" name="education[]" value="deploma">Deploma
<input type="checkbox" name="education[]" value="degree">Degree
<input type="checkbox" name="education[]" value="other">Other<br><br><br>
Photo<input type="file" name="myfile"><br><br><br><br>
<input type="submit" name="submit" value="Save">
<input type="reset" name="reset" value="Reset">
</form>
</body>
</html>
