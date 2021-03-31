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
$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'admin_db');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
$id=$_REQUEST['id'];
$query = "SELECT * from staff_tbl where email='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error($connection));
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Edit Teacher
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>

<body class="user-profile">
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
        <li class="active ">
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
            <!-- <a class="navbar-brand" href="#pablo">User Profile</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <!-- <div class="dropdown-item" >
                    <?php echo$_SESSION['adminname']?>
                  </div> -->
                  <div  class="dropdown-item" >
                    <form method='post' action=""  >
                      <input type="submit"class="dropdown-item" value="Logout" name="but_logout">
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
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Teacher</h5>
              </div>
              <div class="card-body">
          
              <?php
                  $status = "";
                  if(isset($_POST['save']) )
                  {
                    $name = $_REQUEST['uname2'];
                    $pwd = $_REQUEST['pwd2'];
                    $email = $_REQUEST['email1'];
                    
                      $phno = $_REQUEST['phone1'];
    
                              
                  $update="UPDATE staff_tbl SET uname='$name',pwd='$pwd',email='$email',phone_no='$phno' WHERE email='$id'";
                  mysqli_query($connection, $update) or die(mysqli_error($connection));
                  echo"Succesfully Updated";
                 }else {
                  ?>



                <form method="POST" action="" enctype='multipart/form-data'>
                  


                  <div class="row">
                    <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="uname2"  placeholder="Username" value="<?php echo $row['uname'];?> " >
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                  <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control"  name="pwd2" placeholder="Password" value="<?php echo $row['pwd'];?> ">
                      </div>
                    </div>
                  
                    
                  </div>

                  <div class="row">
                  <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control"  name="email1" placeholder="Email" value="<?php echo $row['email'];?> ">
                      </div>
                    </div>
                  
                    
                  </div>

              


                  <div class="row">
                    <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="phone1" placeholder="Mobile Number" value="<?php echo $row['phone_no'];?> ">
                      </div>
                    </div>
                    
                   
                    
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <!-- <button type="submit" name="save" class="btn btn-primary btn-round" value="About Product">Update Profile</button> -->
                      <input type="submit" name="save"  value="Update"class="btn btn-primary btn-round">

                    </div>
                  
                </form>
                <?php } ?>
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