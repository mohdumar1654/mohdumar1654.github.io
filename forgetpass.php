<?php

 $password="";
 $ermsg = "";
 include 'admin/config.php';
 if(isset($_POST['submit']))
  {
    if (isset($_POST['username']))
     {
        $user = $_POST['username'];
     }
     else
     {
        $ermsg = "<b>*  Username Required  *</b>";
     }

     $query = "SELECT `password`,`role` FROM users WHERE username= '".$user."' ";
     $result = mysqli_query($conn,$query);
     $row = mysqli_fetch_assoc($result);
     $password = $row['password'];
        
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
                        <span>Login</span>
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
                    <div class="login-form">
                        <h2>Login</h2>
                        <div>
                            <form action="forgetpass.php" method="POST">
                                <div class="group-input">
                                    <label for="username">Username or email address *</label>
                                    <input type="text" id="username" name="username"><span><?php echo $ermsg; ?></span>
                                </div>
                                <button type="submit" class="site-btn login-btn" name="submit">Submit</button>
                                <br />                           
                            </form>
                        </div>  
                        <div class="group-input" style="margin-top: 20px;">
                               <?php if($password!="") {  ?><label for="pass">Password *</label>
                                <input type="text" id="pass" value="<?php echo $password;  ?>" ><?php  } ?>
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