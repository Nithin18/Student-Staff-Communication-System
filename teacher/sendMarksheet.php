<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: TeacherLogin.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../index.html');
}
?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Send Marksheet
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
      <a href="sendInformation.php" class="simple-text logo-mini">
          
          </a>
          <a href="sendInformation.php" class="simple-text logo-normal" style="font-size: xx-large;">
            SSCS
          </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li>
            <a href="./sendInformation.php">
              <i class="now-ui-icons education_paper"></i>
              <p>Send Information</p>
            </a>
          </li>
          <li class="active">
            <a href="./sendMarksheet.php">
              <i class="now-ui-icons ui-1_email-85"></i>
              <p>Send Marksheet</p>
            </a>
          </li>
          <li>
            <a href="./sendNotification.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Send Notification</p>
            </a>
          </li>
          <li>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Marksheet Panel</h4>
              </div>
              <div class="card-body">
                <form action="" method="POST" enctype='multipart/form-data'>
                
                <div class="row">
                    <div class="col-md-5 pr-2">
                      <div class="form-group">
                        <label>Register No.</label>
                        <input type="text" class="form-control" name="regno"  placeholder="Register Number" >
                      </div>
                    </div>
                    
                  </div>
                

                <div class="row">
                  <div class="col-md-5 pr-2">
                    <div class="form-group">
                      <h4>Class:</h4>
                      <div class="form-check form">
					            <input type="radio" value="I" class="form-check-input" name="radio"> I Year </div>
      
				            <div class="form-check form">
					            <input type="radio" value="II" class="form-check-input" name="radio"> II Year </div>
                        
				            <div class="form-check form">
					            <input type="radio" value="III" class="form-check-input" name="radio"> IIIYear </div>                        
                  </div>                  
                </div>
                </div>
    

                <div class="row">
                  <div class="col-md-5 pr-2">
                    <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left"> <span>Choose files</span>
						        <input type="file" name="mark_file"> </div>
                    </div>
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-md-5 pr-2">
                    <div class="form-group">
                      <label>Created Date</label>
                      <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
					            <input placeholder="Select date" name="markcreateddate" type="datetime-local" id="example" class="form-control"> </div>
                    </div>
                  </div>              
                </div>

                <div class="row">
                  <div class="update ml-auto mr-auto">
                    <!-- <button type="submit" name="save" class="btn btn-primary btn-round" value="About Product">Update Profile</button> -->
                    <input type="submit" name="sendMarksheet"  value="Send Marksheet"class="btn btn-primary btn-round">
                  </div>                                 
                </div>
                                        <?php
                                          $connection = mysqli_connect('localhost', 'root', '');
                                          if (!$connection){
                                              die("Database Connection Failed" . mysqli_error($connection));
                                          }
                                          $select_db = mysqli_select_db($connection, 'admin_db');
                                          if (!$select_db){
                                              die("Database Selection Failed" . mysqli_error($connection));
                                          }
                                          if(isset($_POST['sendMarksheet']))
                                          {	 
                                            $year = $_POST['radio'];
                                            $image = $_FILES['mark_file']['tmp_name'];
                                            $imageContent = addslashes(file_get_contents($image));
                                            $date = $_POST['markcreateddate'];
                                            $regno = $_POST['regno'];
                                            
                                            
                                              
                                            //$sql = "insert into `student_tbl`(`stud_id`,`stud_name`,`stud_pwd`,`stud_mail`,`stud_phone`) values('" . $_POST['stud_id'] . "','" . $_POST['stud_uname'] . "','" . $_POST['stud_pwd'] . "','" . $_POST['stud_email'] . "','" . $_POST['stud_phone'] . "')";

                                            $sql = "INSERT INTO mark_tbl (stud_id,acd_year,marksheet_file,created_dt)
                                            VALUES ('$regno','$year','$imageContent','$date')";
                                            if (mysqli_query($connection, $sql)) {
                                              echo"Succesfully Sent";
                                            }
                                            else {
                                              echo "Failed to send";
                                            }
                                            mysqli_close($connection);
                                          // }
                                        }?>
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