<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: StudentLogin.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../Index.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Change Password
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
        <li>
            <a href="./Information.php">
              <i class="now-ui-icons education_paper"></i>
              <p>Information</p>
            </a>
          </li>
          <li>
            <a href="./Marksheet.php">
              <i class="now-ui-icons ui-1_email-85"></i>
              <p>Marksheet</p>
            </a>
          </li>
          <li class="active">
            <a href="./Settings.php">
              <i class="now-ui-icons ui-1_settings-gear-63"></i>
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
            <!-- <a class="navbar-brand" href="#pablo">User Profile</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown w-100">
                <?php
              $conn = mysqli_connect("localhost", "root", "", "admin_db");
              $sql1 = "select count(*) from `notify`";
              $result1 = mysqli_query($conn, $sql1);
              $row1 = mysqli_fetch_array($result1);
              //echo $row1['count(*)'];
                ?>
                <a class="nav-link dropdown-toggle w-100" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons ui-1_bell-53"></i>
                  <p>
                    <span class="d-lg-6 d-md-block">Notification</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="width: 30rem;">
                <?php
							$sql2 = "select * from `notify`";
							$result = mysqli_query($conn, $sql2);
							while ($row = mysqli_fetch_array($result))
							{
						?>
                <div  class="dropdown-item" >
                  <div class="card w-100">
								<div class="card-body">
									<div class="row">
										<div class="col-4"> <img width="50px" height="50px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['nfile']); ?>" />
											<!-- Text -->
										</div>
										<div class="col-8">
											<p class="card-text">
												<?php echo $row['notification']; ?>
											</p>
										</div>
									</div>
									<!-- Button -->
									<!-- <a href="#" class="btn btn-primary">Button</a> --></div>
							</div>
                  </div>
                  <?php
								}
							?>
                </div>
              </li>

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
                <h5 class="title">Change Password</h5>
              </div>
              <div class="card-body">
              <?php
                        // session_start();
                        if (isset($_POST['changepwd']))
                        {
                            $conn = mysqli_connect("localhost", "root", "", "admin_db");
                            $oldpwd = $_POST['oldpassword'];
                            $newpwd = $_POST['newpassword'];
                            $cnfpwd = $_POST['cnfpassword'];
                            $id = $_SESSION['id'];
                            if ($newpwd == $cnfpwd)
                            {
                                $sql3 = "select * from `student_tbl` where stud_id ='" . $id . "'";
                                $result2 = mysqli_query($conn, $sql3);
                                $row3 = mysqli_fetch_array($result2);
                                if ($row3['stud_pwd'] == $oldpwd)
                                {
                                    $sql4 = "UPDATE student_tbl set stud_pwd= '".$newpwd."' where stud_id = '".$id."'";
                                    $result3 = mysqli_query($conn, $sql4);
                                    if ($result3)
                                    {
                                      echo "Changed Successfully";
                                        //header("location:Settings.php");
                                    }
                                }
                            }
                            else
                            {
                                echo "<script>alert('Password does not match');</script>";
                            }
                        }
                      ?>
                <form method="POST" action="" enctype='multipart/form-data'>
                  


                  <div class="row">
                    <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Old Password</label>
                        <input name="oldpassword" type="password" value="" id="materialSubscriptionFormPasswords" class="form-control">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                  <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>New Password</label>
                        <input name="newpassword" type="password" id="materialSubscriptionFormEmail" class="form-control">
                      </div>
                    </div>
                  
                    
                  </div>

                  <div class="row">
                  <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input name="cnfpassword" type="password" id="materialSubscriptionFormEmail" class="form-control">
                      </div>
                    </div>
                  
                    
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <!-- <button type="submit" name="save" class="btn btn-primary btn-round" value="About Product">Update Profile</button> -->
                      <input type="submit" name="changepwd"  value="Change Password"class="btn btn-primary btn-round">

                    </div>

                    
                  
                </form>
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