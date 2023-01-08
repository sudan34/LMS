<?php
include('session.php');
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
$id = $_GET['id'];
$sql = "SELECT * FROM `students` WHERE `id` = '$id'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View the Students</title>
<style type="text/css">
table tr:hover{ background-color:#D8E82E}
</style>
</head>

<body>
<center>
    <h1>[View Student Library Information]</h1>
    <a href="index.php">Back</a>
    <a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit : <?php echo $row['name']; ?>">Edit </a>    
    <table cellpadding="10" cellspacing="1" border="1" width="500">
    <tr>
    	<th>Roll</th>
        <td><?php echo $row['id']; ?></td>
    </tr>
    <tr>
    	<th>Name</th>
        <td><?php echo $row['name']; ?></td>
    </tr>
    <tr>
    	<th>Address</th>
        <td><?php echo $row['address']; ?></td>
    </tr>
    <tr>
    	<th>Class</th>
        <td><?php echo $row['class']; ?></td>
    </tr>
    <tr>
    	<th>Email</th>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <tr>
    	<th>Contact</th>
        <td><?php echo $row['con_no']; ?></td>
    </tr>
    <tr>
    	<th>Book No:</th>
        <td><?php echo $row['book_no']; ?></td>
    </tr>
    
    <tr>
    	<th>Book</th>
        <td><?php echo $row['book']; ?></td>
    </tr>
    <tr>
    	<th>Issued</th>
        <td><?php echo $row['issued']; ?></td>
    </tr>
    <tr>
    	<th>Returned</th>
        <td><?php echo $row['returned']; ?></td>
    </tr>
    <tr>
    	<th>Status</th>
        <td><?php echo ($row['status'] == 1)?"Active":"Not Active"; ?></td>
    </tr>
    <tr>
    	<th>Photo</th>
        <td><?php 
			$photo = $row['photo'];
			if(!empty($photo) && file_exists("images/".$photo))
			{
				?>
                <img src="images/<?php echo $photo; ?>" width="75" />
                <?php 
			}
			else
			{
				echo "No Photo Available";
			}
			
				?>
        </td>
    </tr>
    </table>
    <a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit : <?php echo $row['name']; ?>">Edit </a>
</center>
</body>
</html>
<?php
mysql_close($conn);
?>