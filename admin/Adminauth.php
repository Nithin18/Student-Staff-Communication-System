<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "admin_db");
$name = $_POST["uname1"];
$pass = $_POST["pwd1"];
$sql = "select * from admin_tbl";
$result = mysqli_query($conn, $sql);
$flag = 0;
while ($row = mysqli_fetch_array($result))
{
    if ($row['email'] == $name && $row['password'] == $pass)
    {
        $_SESSION['login'] = 1;
        $_SESSION['id'] = $row['email'];
        $flag = 1;
        header('location:TeachersList.php');
    }
}
if ($flag == 0)
{
    $_SESSION['login'] = 0;
    $flag = 0;
    header('location:AdminLogin.php?error=');
}
?>  