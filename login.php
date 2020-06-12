<?php

include 'admin/config.php';
global $guest;

    if (isset($_POST['submit'])) 
    {
        $uname = $_POST['username'];
        $pword = $_POST['password'];
        $query = "SELECT * FROM `users` WHERE `username`= '$uname'
         AND `password` = '$pword' ";
        $result = mysqli_query($conn, $query);
        $row=mysqli_fetch_assoc($result);
        
        if ($row['role']=='user') {
            $guest=$uname;
            header("location:index.php");
        }
       else
        {
            echo " INCORRECT USERNAME/PASSWORD ";
        }
    }
    include "header.php";
    $_SESSION['guest']=$guest;
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
                        <form action="login.php" method="POST">
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="text" id="username" name="username">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="forgetpass.php" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn" name="submit">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="./register.php" class="or-login">Or Create An Account</a>
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