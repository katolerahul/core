<?php 
$con=mysqli_connect("localhost","root","password") or die("unable to connect");
mysqli_select_db($con,"interview");
if(isset($_REQUEST['editid'])){
	$editid=$_REQUEST['editid'];
	$query=mysqli_query($con,"select * from register where id='$editid'");
	$row=mysqli_fetch_array($query);
	$exp = $row['education'];
	$check = explode(',', $exp);


}
if(isset($_POST['submit'])){
	
	$user=$_POST['username'];
	$add=$_POST['address'];
	$country=$_POST['country'];
	$gender=$_POST['gender'];
	$edu=$_POST['education'];
	$img = $_POST['myfile'];
	$implo=implode(',',$edu);
	if(!empty($_FILES['editefile']['name'])){
		$file = $_FILES['editefile'];
		$ext = substr(strtolower(strchr($_FILES['editefile']['name'],'.')),1);
		$ext_arr = array('jpg','jpeg','png','gif');
		if(in_array($ext,$ext_arr)){
			if(move_uploaded_file($_FILES['editefile']['tmp_name'],"images/".$_FILES['editefile']['name'])){
				$img = $_FILES['editefile']['name'];
			}
		}else{
			echo 'Invalid File Format';
		}
		
	}else{
		$img = $_POST['myfile'];
	}
	$qry=mysqli_query($con,"update register set username='$user' , address='$add', country='$country', gender='$gender', education='$implo', image='$img' where id='$editid'");
	
	if($qry){
		echo 'success';
	}else{
		echo 'fail';
	}
	
}	

?>


<html>
<title>Test</title>
<body>
<form method="post" action="" enctype="multipart/form-data">
Username:<input type="text" name="username" value="<?php echo $row['username'];?>"><br><br>

Address:<textarea type="text" name="address" <?php echo $row['address'];?>></textarea><br><br><br>
Country:<select name="country">
<option value="">Select Any Country</option>
<option value="india" <?php if($row['country']==0){echo 'selected';}?>>India</option>
<option value="nepal" <?php if($row['country']==1){echo 'selected';}?>>Nepal</option>
</select><br><br><br>
Gender:<input type="radio" name="gender" value="male" <?php if($row['gender']=='male'){echo 'checked';}?>>Male
<input type="radio" name="gender" value="female" <?php if($row['gender']=='female'){echo 'checked';}?>>Female<br><br><br>
Education:<input type="checkbox" name="education[]" value="deploma" <?php if(in_array('deploma',$check)){echo 'checked';}?>>Deploma
<input type="checkbox" name="education[]" value="degree" <?php if(in_array('degree',$check)){echo 'checked';}?>>Degree
<input type="checkbox" name="education[]" value="other" <?php if(in_array('other',$check)){echo 'checked';}?>>Other<br><br><br>
<input type="hidden" name="myfile" value="<?php echo $row['image'];?>">
Photo<input type="file" name="editefile"><br>
<img src="images/<?php echo $row['image'];?>" width="100" height="100"><br><br><br>
<input type="submit" name="submit" value="Save">
<input type="reset" name="reset" value="Reset">
</form>
</body>
</html>