<?php
$con=mysqli_connect("localhost","root","password")or die("Not able to connect");
$dbcon=mysqli_select_db($con,"interview");
 $unameErr = $passErr = $genderErr = "";
         $user = $pass = $add = $gender = "";
if(isset($_REQUEST["submit"])){

	
		 
            if (empty($_POST["username"])) {
               $unameErr = "Email is required";
            }else {
              
               // check if e-mail address is well-formed
               if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
                  $unameErr = "Invalid email format"; 
               }else{
				    $user = test_input($_POST["username"]);
			   }
            }
			
			if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_REQUEST["password"])) {
				$passErr = 'the password does not meet the requirements!';
				}else {
					$pass = test_input($_POST["password"]); 
            }
			
			if (empty($_POST["gender"])) {
				$genderErr = "Gender is required";
			  } else {
				$gender = test_input($_POST["gender"]);
			  }
			  
         if(!empty($user) and !empty($pass) and !empty($gender)){
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
            
	
 
}
function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>


<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Test</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
Username:<input type="text" name="username"><span class = "error">* <?php echo $unameErr;?></span><br><br>

Password:<input type="password" name="password"><span class = "error">* <?php echo $passErr;?></span><br><br><br>

Address:<textarea type="text" name="address"></textarea><br><br><br>

Country:<select name="country">
<option value="">Select Any Country</option>
<option value="india">India</option>
<option value="nepal">Nepal</option>
</select><br><br><br>

Gender:<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="female">Female<br><span class = "error">* <?php echo $genderErr;?></span><br><br>

Education:<input type="checkbox" name="education[]" value="deploma">Deploma
<input type="checkbox" name="education[]" value="degree">Degree
<input type="checkbox" name="education[]" value="other">Other<br><br><br>

Photo<input type="file" name="myfile"><br><br><br><br>

<input type="submit" name="submit" value="Save">
<input type="reset" name="reset" value="Reset">
</form>

</body>
<?php
$con=mysqli_connect("localhost","root","password")or die("Not able to connect");

$dbcon=mysqli_select_db($con,"interview");

$query=mysqli_query($con,"select * from register");

$rowcount=mysqli_num_rows($query);


?>
<a href="insert.php">Add User</a>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Address</th>
<th>Country</th>
<th>Gender</th>
<th>Education</th>
<th>Image</th>
<th>Action</th>
</tr>
<?php for($i=1;$i<=$rowcount;$i++){
	$show=mysqli_fetch_array($query);
	
	?>
	<tr>
	<td><?php echo $show['id'];?></td>
	<td><?php echo $show['username'];?></td>
	<td><?php echo $show['address'];?></td>
	<td><?php echo $show['country'];?></td>
	<td><?php echo $show['gender'];?></td>
	<td><?php echo $show['education'];?></td>
	<td><img src="images/<?php echo $show['image'];?>" width="50" height="50"></td>
	<td><a href="delete.php?delid=<?php echo $show['id'];?>">Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit.php?editid=<?php echo $show['id'];?>">Edit</a></td>
	
	</tr>
<?php }?>
</table>

num1:<input type="text" id="txtn1" name="num1"><br><br>
num2:<input type="text" id="txtn2" name="num2"><br><br><br>
ans:<input type="text" id="txtn3" name="ans"><br><br><br>
<input type="button" name="submit" id="btnadd" value="Save">

<script type="text/javascript">
    $(document).ready(function () {
        $('#btnadd').on('click', function () {
            var n1 = parseInt($('#txtn1').val());
            var n2 = parseInt($('#txtn2').val());
            var r = n1 + n2;
			$('#txtn3').val(r);
            //alert("sum of 2 No= " + r);
            return false;
        });
        $('#btnclear').on('click', function () {
            $('#txtn1').val('');
            $('#txtn2').val('');
            $('#txtn1').focus();
            return false;
        });
    });
</script>
</html>
