<?php
include('session.php');
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
$sql = "SELECT * FROM `students` ORDER By `name` DESC";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome : Library Management System</title>
	<link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/styleCommon.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <style>
    table, td, th {
    border: 3px solid black;
	text-align: center;
	color: black;
	background-color: #CCCACA;
		}

table {
   border-collapse: collapse;
   width: 100%;
}

th {
   height: 70px;
}
</style>
	
	    <!---navigation bar-->
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:antiquewhite;
	background-image: url("images\library.jpg");
}

li {
	margin: 5px, 5px, 0px, 0px;
  padding: 5px, 0px, 0px, 0px;
  float: left;
}

li a {
	
  display: block;
  color: black;
  text-align: center;
  padding: 10px 90px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
	input {
    width: 100px;
		height: 40px;
		margin-top: 12px;
}
</style>
</head>

<body style="background-size:100%" background="images/library.jpg">

	<div id="mainWrap">
		<div id="imglog">
		<div id="add">
		<div class="container">
	
    <div><b id="welcome" align="center" ><h4>Welcome :<i><?php echo $login_session ; ?></i> </h4> </b>
			<b id="logout" align="right" color="white"><a href="logout.php"><h3>Log Out</h3></a></b></div>
		</div>
</head>


<body>
	<div id="mainWrap">
		<center>
      <h1>LIBRARY MANAGEMENT SYSTEM</h1>
      <a href="add.php" title="add new student">ADD</a>
	  <?php
      if($count>=1)
	  {
	  ?>
      <table cellpadding="10" cellspacing="1" border="1" width="1000">
        <tr>
          <th>Student Roll</th>
          <th>Name</th>
          <th>Address</th>
          <th>Class</th>
          <th>Email</th>
          <th>Contact No:</th>
          <th>Book No:</th>
          <th>Book</th>
          <th>Issued</th>
          <th>Returned</th>
          <th>Status</th>
          <th>Photo</th>
          <th>Action</th>
        </tr>
        <?php
        $sn = 0;
		while($row = mysql_fetch_array($result))
	    {
		?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['class']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['con_no']; ?></td>
          <td><?php echo $row['book_no']; ?></td>
          <td><?php echo $row['book']; ?></td>
          <td><?php echo $row['issued']; ?></td>  
          <td><?php echo $row['returned']; ?></td> 
          <td><?php echo ($row['status'] == 1)?"Active":"Not Active";?></td>
          <td><?php 
		  $photo = $row['photo'];
		  if(!empty($photo) && file_exists("images/".$photo))
		  {
			?>
            <img src="images/<?php echo $photo; ?>" width="75">
            <?php   
		  }
		  else
		  {
			echo "No image Preview";  
		  }
		  ?>
          </td>
          <td>
            [
            <a href="view.php?id=<?php echo $row['id']; ?>" title="View : <?php echo $row['name']; ?>">View</a>  |
            <a href="edit.php?id=<?php echo $row['id']; ?>" title="Edit : <?php echo $row['name']; ?>">Edit </a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" title="Delete : <?php echo $row['name']; ?>" onClick="return confirm('Are you sure to delete  <?php echo $row['name']; ?>');">Delete</a>
			]
          </td>
        </tr>
        <?php
		}
		?>
      </table>
      <?php
	    echo "No of student record  = ".$count;
	  }
	  else
	  {
		echo "<h2>Sorry ! No student record found in our System</h2>";  
	  }
	  ?>
    </center>
	</div>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/customscript.js"></script>
</body>
</html>
<?php
mysql_close($conn);
?>