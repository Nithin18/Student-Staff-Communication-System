<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "admin_db");
$name = $_POST["staff_name"];
$pass = $_POST["staff_pwd"];
$sql = "select * from staff_tbl";
$result = mysqli_query($conn, $sql);
$flag = 0;
while ($row = mysqli_fetch_array($result))
{
    if ($row['email'] == $name && $row['pwd'] == $pass)
    {
        $_SESSION['login'] = 1;
        $_SESSION['id'] = $row['email'];
        $_SESSION['temp'] = $row['uname'];
        $flag = 1;
        header('location:sendInformation.php');
    }
}
if ($flag == 0)
{
    $_SESSION['login'] = 0;
    $flag = 0;
    header('location:TeacherLogin.php?error=');
}
?>
