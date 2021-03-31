<?php
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'admin_db');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
echo"<script>alert('Are you sure??');</script>";
$id=$_REQUEST['id'];

$query="UPDATE staff_tbl SET status='0' WHERE email='$id'";
$result = mysqli_query($connection,$query) or die ( mysqli_error($connection));
header("Location: Teacherslist.php"); 
?>