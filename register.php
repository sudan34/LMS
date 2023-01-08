<?php
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
if(isset($_POST['btnSubmit']))
{
	$username = $_POST['user'];
	$userpass = $_POST['pass'];
	$sql = "INSERT INTO `users`(`user_name`, `user_pass`) VALUES ('$username','$userpass')";	
	$query = mysql_query($sql);
	if($query)
	{
		echo "User Record Inserted Successfully ";
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
	<title>Register</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1>LIBRARY MANAGEMENT SYSTEM [ADD]</h1>
	<div class="form_wrap">
		<form id="student_formid" name="student_form" method="post" enctype="multipart/form-data">
			<p>
				<label for="name">Username:</label>
				<input type="text" name="user" id="nameid">
			</p>
			<p>
				<label for="address">Password:</label>
				<input type="text" name="pass" id="addressid">
			</p>
			<p>
				<input type="submit" id="btnid" name="btnSubmit" value="SUBMIT">
				<input type="reset" value="Clear">  
			</p>
		</form>
	</div>
</body>

</html>
<?php
mysql_close($conn);
?>