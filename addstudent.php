<?php
session_start();
		if(isset($_SESSION['uid']))
		{
			echo "";
		}
		else{
			header('location: ../login.php');
		}
?>
<?php
include('header.php');
include('titlehead.php');
?>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
<table align="center" border="1" style="width:70%; margin-top:40px;">
<tr>
<th>Roll No</th>
<td><input type="text" name="rollno" placeholder="Enter your Rollno" required></td>
</tr>
<tr>
<th>Full Name</th>
<td><input type="text" name="name" placeholder="Enter your full Name" required></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" name="city" placeholder="Enter your City" required></td>
</tr>
<tr>
<th>Parents Contact no</th>
<td><input type="text" name="pcon" placeholder="Enter the Contact number of your parents" required></td>
</tr>
<tr>
<th>Standard</th>
<td><input type="number" name="standard" placeholder="Enter Standard" required></td>
</tr>
<tr>
<th>Image</th>
<td><input type="file" name="simg" required></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	include('../dbcon.php');
	$rollno=$_POST['rollno'];
	$name=$_POST['name'];
	$city=$_POST['city'];
	$pcon=$_POST['pcon'];
	$std=$_POST['std'];
	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];
	
	move_uploaded_file($tempname,"../dataimg/$imagename");
	
	$qry="INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standard`,'image') VALUES (NULL,'$rollno','$name','$city','$pcon','$std','$imagename')";
	$run=mysqli_query($con,$qry);

	$run=mysqli_query($con,$qry);
   
   if($run == true)
   {
	   ?><script>alert('Data Inserted succesfully');
	   </script><?php
   }
	}
	?>