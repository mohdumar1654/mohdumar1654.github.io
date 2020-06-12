<?php   
 include 'admin/config.php';
  $err ="";
  $result ="";
  $error = "";
 if (isset($_POST['submit'])) {
     $uname = $_POST['username'];
     $pword = $_POST['password'];
     $conpass = $_POST['con-pass'];
     
     if ($pword!= $conpass) {
         $err = "<b> * The password does not match *</b>";
     }
     else
     {
        $query = "INSERT INTO users (username,password,role) VALUES ($uname,$pword,'guest')";
        $result =mysqli_query($conn,$query);
        if ($result)
         {
            $success = "you have been registerd";
         }
         else
         {
            $error =  "*  there was some problem with the registration  *";
         }

     }
     $query1 = "INSERT INTO users (username,password,role) VALUES ($uname,$pword,'guest')";
        $result1 =mysqli_query($conn,$query1);
 }

include "header.php";
?>



    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="register.php" method="POST">
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="text" id="username" name="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con-pass" name="con-pass"><span style="color: red;"><?php echo $err; ?></span>
                            </div>
                            <button type="submit" class="site-btn register-btn" name="submit">REGISTER</button><span><?php if ($result)
                             {
                                echo $success;
                             }
                             else
                             {
                                echo $error;
                             }
                              ?></span>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <?php
   include "footer.php";
   ?>