<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "admin_db");
$name = $_POST["stud_name"];
$pass = $_POST["stud_pwd"];
$sql = "select * from student_tbl";
$result = mysqli_query($conn, $sql);
$flag = 0;
while ($row = mysqli_fetch_array($result))
{
    if ($row['stud_id'] == $name && $row['stud_pwd'] == $pass)
    {
        $_SESSION['login'] = 1;
        $_SESSION['id'] = $row['stud_id'];
        $flag = 1;
        header('location:Information.php');
    }
}
if ($flag == 0)
{
    $_SESSION['login'] = 0;
    $flag = 0;
    header('location:StudentLogin.php?error=');
}
?>
