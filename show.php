<?php
$con=mysqli_connect("localhost","root","password")or die("Not able to connect");

$dbcon=mysqli_select_db($con,"interview");

$query=mysqli_query($con,"select * from register");

$rowcount=mysqli_num_rows($query);


?>
<a href="insert.php">Add User</a>

<form method="post" action="show.php">
    <input type="text" name="search" placeholder="Search for student">
    <input type="submit" value="Submit">
</form>




<?php 

$search_query = $_POST['search'];
$search_query = htmlspecialchars($search_query); 
// changes characters used in html to their equivalents, for example: < to &gt;
 $search_query = mysqli_real_escape_string($con,$search_query);
// makes sure nobody uses SQL injection		
$raw_results = mysqli_query($con,"SELECT * FROM register
            WHERE `username` LIKE '%".$search_query."%'") or die(mysql_error());
if(mysqli_num_rows($raw_results) > 0){ 
            while($results = mysqli_fetch_array($raw_results)){
                echo "<p><h3>".$results['username']."</h3>".$results['address']."</p>";     
            }   
        }
        else{ 
            echo "No results";
        }
?>
<br><br>
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
<?php } ?>
</table>


