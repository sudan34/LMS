<?php
include('session.php');
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
if(isset($_POST['btnSubmit']))
{
	$id = $_POST['id'];
	$imgStatus = $_POST['imgStatus'];
	if($imgStatus == 1)
	{
		$result  = mysql_query("SELECT * FROM `students WHERE `id` = '$id' ");
		$row = mysql_fetch_array($result);
		$photo = $row['photo'];
	}
	else
	{
		if(!empty($_FILES['photo']['name']))
		{
			$photo = "sms_".rand(0,99999999)."_".$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$photo);
		}
		else
		{
			$photo = '';		
		}
	}
	$stname = $_POST['name'];
	$staddress = $_POST['address'];
	$stclass = $_POST['class'];
	$stemail = $_POST['email'];
	$stcontactno = $_POST['contactno'];
	$stbookno = $_POST['bookno'];
	$stbook = $_POST['book'];
	$stissued = $_POST['issued'];
	$streturned = $_POST['returned'];
	$ststatus = $_POST['status'];
	$sql = 
		"
		UPDATE `students` SET
		`name`='$stname',
		`address`='$staddress',
		`class`='$stclass',
		`email`='$stemail',
		`con_no`='$stcontactno',
		`book_no`='$stbookno',
		`book`='$stbook',
		`issued`='$stissued',
		`returned`='$streturned',
		`status`='$ststatus',
		`photo`='$photo'
		WHERE `id`='$id'
		";	
	$query = mysql_query($sql);
	if($query)
	{
		echo "Student Record Updated Successfully ";
		?>
        <meta http-equiv="refresh" content="2;URL='index.php'">
        <?php
	}
	else
	{
		echo "Ooops ! Error In System !!!";
	}
	
}

$id = $_GET['id'];

if(isset($_GET['deleteImage']))
{
	$photo = $_GET['deleteImage'];
	
	if(!empty($photo) && file_exists("images/".$photo))
	{
		unlink("images/".$photo);
		$sql = 
		"
		UPDATE
			`students`
		SET
			`photo` = ''
		WHERE 
			`id` = '$id'
		";	
		mysql_query($sql);	
	}
}




$sql = "SELECT * FROM `students` WHERE `id` = '$id'";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
   <link href="style.css" rel="stylesheet" type="text/css">
    <title>Welcome to edit page</title>
    <style type="text/css">
</style>
  </head>
  <body>
    <center>
      <h1>Library Information System [ Edit Library ]</h1>
      <a href="index.php">Back</a>
	  <form name="frm1" action="" method="post" enctype="multipart/form-data">
      <table cellpadding="10" cellspacing="1" border="1" width="1000">
        <tr>
          <th>Name</th>
          <td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
        </tr> 
        <tr>
          <th>Address</th>
          <td><input type="text" name="address" value="<?php echo $row['address']; ?>"></td>
        </tr> 
        <tr>
          <th>Class</th>
          <td><input type="text" name="class" value="<?php echo $row['class']; ?>"></td>
        </tr> 
        <tr>
          <th>Email</th>
          <td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
        </tr>
        <tr>
          <th>Contact No</th>
          <td><input type="text" name="contactno" value="<?php echo $row['con_no']; ?>"></td>
        </tr>
        <tr>
          <th>Book No</th>
          <td><input type="text" name="bookno" value="<?php echo $row['book_no']; ?>"></td>
        </tr> 
        <tr>
          <th>Book</th>
          <td><input type="text" name="book" value="<?php echo $row['book']; ?>"></td>
        </tr> 
        <tr>
          <th>Issued</th>
          <td><input type="date" name="issued" value="<?php echo $row['issued']; ?>"></td>
        </tr>  
        <tr>
          <th>Returned</th>
          <td><input type="date" name="returned" value="<?php echo $row['returned']; ?>"></td>
        </tr>
		<tr>
          <th>Status</th>
          <td>
            <input type="radio" name="status" value="1" <?php if($row['status'] == 1){ echo "checked"; } ?>> Active 
            <input type="radio" name="status" value="0" <?php if($row['status'] == 0){ echo "checked"; } ?>> Not Active 
          </td>
        </tr>
        <tr>
          <th>Photo</th>
          <td>
          <?php 
		  $photo= $row['photo'];
		  if(!empty($photo) && file_exists("images/".$photo))
		  {
			?>
            <img src="images/<?php echo $photo; ?>" width="75"> 
            <a href="edit.php?id=<?php echo $_GET['id']; ?>&deleteImage=<?php echo $row['photo']; ?>" title="Delete Image" onClick="return confirm('Are you sure to delete the Image ? ')">Delete</a>
            <input type="hidden" name="imgStatus" value="1">
			<?php   
		  }
		  else
		  {
			?>
            <input type="file" name="photo">
            <input type="hidden" name="imgStatus" value="0">
			<?php  
		  }
		  ?>
          </td>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <td>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <input type="submit" value="UPDATE" name="btnSubmit">
			<input type="reset" value="CANCEL">          
          </td>
        </tr>
      </table>
      </form>
    </center>
  </body>
</html>
<?php
mysql_close($conn);
?>