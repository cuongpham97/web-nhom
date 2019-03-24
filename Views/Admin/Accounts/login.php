<!DOCTYPE html>
<html>
<?php include PATH_VIEW . '/Admin/Share/Header.php'?>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <!--div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div-->
                <div class="login-form">
                    <form action="<?= WEB_FOLDER ?>/admin/Accounts/login" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" autocomplete class="form-control">
                        </div>
                        <!--div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div-->
                        <p class="text-right" style="color:red"><?php if(isset($error)) echo $error ?></p>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <!--button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button-->
                            </div>
                        </div>
                        <!--div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div-->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include PATH_VIEW . '/Admin/Share/Footer.php' ?>;
</body>
</html>
