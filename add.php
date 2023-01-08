<?php
include('session.php');
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
if(isset($_POST['btnSubmit']))
{
	if(!empty($_FILES['photo']['name']))
	{
		$photo = "sms_".rand(0,9999999999)."_".$_FILES['photo']['name'];
		$mainPath = "images/".$photo;
		$tempPath = $_FILES['photo']['tmp_name'];
		move_uploaded_file($tempPath,$mainPath);
	}
	else
	{
		$photo= '';		
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
	$sql = "INSERT INTO `students`(`name`, `address`, `class`, `email`, `con_no`, `book_no`, `book`, `issued`, `returned`, `status`, `photo`) VALUES ('$stname','$staddress','$stclass','$stemail','$stcontactno','$stbookno','$stbook','$stissued','$streturned','$ststatus','$photo')";	
	$query = mysql_query($sql);
	if($query)
	{
		echo "Student Library Record Inserted Successfully ";
	}
	else
	{
		echo "Ooops ! Error In System !!!";
	}
	
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1>LIBRARY MANAGEMENT SYSTEM [ADD]</h1>
	<div class="form_wrap">
		<form id="student_formid" name="student_form" method="post" enctype="multipart/form-data">
			<p>
				<label for="name">Name:</label>
				<input type="text" name="name" id="nameid">
			</p>
			<p>
				<label for="address">Address:</label>
				<input type="text" name="address" id="addressid">
			</p>
			<p>
				<label for="class">Class:</label>
				<input type="text" name="class" id="classid">
			</p>
			<p>
				<label for="email">Email:</label>
				<input type="text" name="email" id="emailid">
			</p>
			<p>
				<label for="contactno">Contact no:</label>
				<input type="text" name="contactno" id="contactnoid">
			</p>
			<p>
				<label for="bookno">Book No:</label>
				<input type="text" name="bookno" id="booknoid">
			</p>
			<p>
				<label for="book">Book</label>
				<input type="text" name="book" id="book">
			</p>
			<p>
				<label for="issued">Issued:</label>
			  <input type="date" name="issued" id="issuedid">
			</p>
			<p>
			  <label for="returned">Returned:</label>
				<input type="date" name="returned" id="returned">
		  </p>
		  <p>
				<label for="status">Status:</label>
				<input type="radio" name="status" value="1" checked> Active 
            	<input type="radio" name="status" value="0"> Not Active 
			</p>
			<p>
				<label for="photo">Photo:</label>
				<input type="file" name="photo" id="photoid" required>
			</p>
			<p>
				<input type="submit" id="btnid" name="btnSubmit" value="SUBMIT">
				<input type="reset" value="CANCEL">  
			</p>
		</form>
	</div>
	<a href="index.php">Back</a>
</body>

</html>
<?php
mysql_close($conn);
?>