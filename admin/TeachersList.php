<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: Adminlogin.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../index.html');
}
?>


<?php
//session_start();
if ($_SESSION['login'] != 1)
{
    header("location:Adminlogin.php");
}
$conn = mysqli_connect("localhost", "root", "", "admin_db");
$sql = "select * from `staff_tbl` where `status`=1";
$result = mysqli_query($conn, $sql);
?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Teachers List
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
    <div class="logo">
        <a href="TeachersList.php" class="simple-text logo-mini">
          
        </a>
        <a href="TeachersList.php" class="simple-text logo-normal" style="font-size: xx-large;">
          SSCS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="active">
            <a href="./TeachersList.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Teachers List</p>
            </a>
          </li>
          <li>
            <a href="./StudentList.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Student List</p>
            </a>
          </li>
          <li>
            <a href="./AddTeachers.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Add Teacher</p>
            </a>
          </li>
          <li>
            <a href="./AddStudents.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Add Student</p>
            </a>
          </li>
          <li>
            <a href="./settings.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <!-- <a class="navbar-brand" href="#pablo">Table List</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="
    font-size: 0.8rem;
">
                <i class="now-ui-icons users_single-02"></i>
                <p>
                    <span class="d-lg-5 d-md-block"><?php echo $_SESSION['id'];?></span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <!-- <div class="dropdown-item" >
                    <?php echo$_SESSION['adminname']?>
                  </div> -->
                  <div  class="dropdown-item" >
                    <form method='post' action=""  >
                      <input type="submit"class="dropdown-item" value="LOGOUT" name="but_logout">
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Teacher List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                            <th>S.No</th>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Status</th>
							<th>Edit</th>
              <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php
                            $i = 1;
                            while ($row = mysqli_fetch_array($result))
                            {
                        ?>
							<tr>
								<td>
									<?php echo ($i); ?>
								</td>
								<td>
									<?php echo $row['uname']; ?>
								</td>
								<td>
									<?php echo $row['pwd']; ?>
								</td>
								<td>
									<?php echo $row['email']; ?>
								</td>
								<td>
									<?php echo $row['phone_no']; ?>
								</td>
								<td>
									<?php echo $row['status']; ?>
								</td>
								<td><a href="Teachersedit.php?id=<?php echo $row['email']; ?>" >Edit</a> </td>
                <td><a href="delete.php?id=<?php echo $row['email']; ?>" >Delete</a> </td>
							</tr>
							<?php
                                $i++;
                            }
?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
</body>

</html>