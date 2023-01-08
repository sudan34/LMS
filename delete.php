<?php
include('session.php');
$conn =  mysql_connect('localhost','root','') or die('Error: Unable to connect database'.mysql_errno());
$db  = mysql_select_db('db_lms') or die('Error: Unable to select database'.mysql_errno());
$id = $_GET['id'];
$sql = "DELETE FROM `students` WHERE `id`='$id' ";
$query = mysql_query($sql);
if($query)
{
  echo "Record Deleted Successfully";
}
else
{
   echo "OOops ! Sorry !! Something Error in system !!!";
}
?>