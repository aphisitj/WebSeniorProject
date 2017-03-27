<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Personal track and Criminal warning Application</title>
    <!-- Bootstrap -->
    <link href="<?php echo URL::asset('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL::asset('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo URL::asset('css/custom.css'); ?>" rel="stylesheet">
    <style>
    div.ridge {
        border-style: ridge;
    }
    
    ;
    </style>
</head>

<body style="background:#ffffff;">
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>
        <div align="center">
            <img src="images/Picture1.png" height="240" width="200">
        </div>
        <div id="wrapper">
            <div id="login" class=" form" action="check_login.php">
                <section class="login_content">
                    <form>
                        <h1>&nbsp;Admin</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" id="txtUsername" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" id="txtPassword" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" name="Submit" value="Login">&nbsp;Log in</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h4>Personal track and Criminal warning Application</h4>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <div id="register" class=" form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#tologin" class="to_register"> Log in </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
</body>

</html>
