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