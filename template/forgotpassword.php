<?php

$error="";

if( isset($_POST['submit']) && $_POST['submit']=="RESET PASSWORD" ) {
    global $DB;
    global $USER;
    global $error;
    
    // check if $_POST['email'] isset or empty or not
    if(!isset($_POST['email']) || trim($_POST['email'])=="" ) {
        $error="Email is Empty";
    }
    else {
        $email = trim($_POST['email']);
        
        if(!$USER->exists($email)) {
            $error="Email doesnt exist";
        }
        else {        
            $USER->send_reset_mail($email);
            redirect("/login",["message"=>"Mail has been sent to your email for Reset Password"]);
        }
    }
}

$VALUES=[];
function check() {
    global $VALUES;
    global $DB;
    global $USER;
    global $errors;

    if($_POST['password'] != $_POST['verifypassword']) {
        $errors="password not matching";
        return false;
        
    }
    $password=trim($_POST['password']);
    
    $VALUES['password']=$USER->hash_pass($password);
    return true;
}
if(isset($_POST['submit']) && $_POST['submit']=="RESET" && check()){

    global $DB;
    global $USER;
    global $VALUES;
    global $error;
   
    $VALUES['email']=trim($_POST['email']);
    $query= "update users set password=:password WHERE email=:email";
    $uid = $DB->update($query,$VALUES);
    redirect("/login",["message" => "Your Password has been Reset please Login"]);
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            <?=$title ?>
        </title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="description" content="Technoshinex.6" />
        <meta name="keywords" content="technoshinex6, technoshine, cad, nitdurgapur" />
        <meta name="author" content="roshan" />
        <link rel="icon" type="image/png" href="images/nittablogo.png">
        <link rel="stylesheet" type="text/css" href="css/icons.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/sponser.css" />
        <link rel="stylesheet" type="text/css" href="css/homepage.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.79639.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Bangers' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/onlineeventone.css" />
        <!-- //offline overlay -->
        <link rel="stylesheet" type="text/css" href="css/stylecustom.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/aboutusoverlay.css" />
        <link rel="stylesheet" type="text/css" href="css/eventcss.css" />
        <script src="js/snap.svg-min.js"></script>

        <script src="js/headingmm.js"></script>
    </head>
    <style>
        .wrapper-email {
            border: 0px;
            border-bottom: 2px dashed #ff885c;
            /*            position: absolute;*/
            /*            bottom: 50vh;*/
            /*
            left: 50%;
            transform: translateX(-50%);
*/
            margin-bottom: 20px;
        }
        
        .wrapper-password {
            border: 0px;
            border-bottom: 2px dashed #ff885c;
            /*            position: absolute;*/
            /*            bottom: 38vh;*/
            /*
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 20px;
*/
        }
        
        .wrapper {
            overflow: hidden;
            /*
              position: absolute;
            bottom: 38vh;
            left: 50%;
            transform: translateX(-50%);
*/
        }
        
        .formcenter {
            margin: 100px auto;
            width: 350px;
        }
        
        textarea:focus,
        input:focus {
            outline: none;
        }
        
        input:not([type="submit"]) {
            border: none;
        }
        
        .input-icon {
            display: inline-block;
            text-align: center;
            width: 40px;
            font-size: 14pt;
            color: #cecece;
        }
        
        .error,
        .message {
            color: crimson;
            /* font-size: 10pt; */
            font-family: Montserrat;
            text-align: center;
            margin-top: 30px;
        }
        
        .message {
            color: dodgerblue;
        }
    </style>

    <body>
        <div class="container-fluid">
            <div class="row banner-heading" id="member-heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="overlay-heading">FORGOT PASSWORD?</p>
                </div>
            </div>
            <div class="row">
                <?php
                if($reset) {
                    ?>
                    <form class="form-signin" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
                        <div class="form-content formcenter">
                            <div class='wrapper'>
                                <div class="wrapper-password">
                                    <span class="input-icon">
                               <i class="fa fa-lock"></i>
                                 </span>
                                    <input class="input-lg" type="password" required name="password" placeholder="Password" />
                                </div>
                                <div class="wrapper-password">
                                    <span class="input-icon">
                                    <i class="fa fa-lock"></i>
                                    </span>
                                    <input class="input-lg" type="password" required name="verifypassword" placeholder="Verify Password" />
                                </div>
                                <input type="hidden" name="email" value="<?=$email?>" />
                            </div>
                            <div class="error">
                                <?php global $error; echo $error;?>
                            </div>
                            <div class="message">
                                <?=$message?>
                            </div>
                        </div>

                        <input type="submit" name="submit" class="btn2 btn2-dark overlay-btn overlay-wrapper " value="RESET" />

                    </form>



                    <?php } else { ?>
                        <form class="form-signin" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
                            <div class="form-content formcenter">
                                <div class='wrapper'>
                                    <div class="wrapper-email ">
                                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                                        <input class="input-lg" type="email" required name="email" placeholder="Email" />
                                    </div>

                                </div>
                                <div class="error">
                                    <?php global $error; echo $error;?>
                                </div>
                                <div class="message">
                                    <?=$message?>
                                </div>
                            </div>

                            <input type="submit" name="submit" class="btn2 btn2-dark overlay-btn overlay-wrapper " value="RESET PASSWORD" />

                        </form>
                        <?php } ?>
            </div>
        </div>
        <script>
            function validateForm() {
                var error = document.querySelector(".error");

                //EMAIL
                var email = document.reg_form.email.value;
                if (email == "") {
                    error.innerHTML = "Please Enter a Email";
                    return false;
                }



                return true;
            }
        </script>

    </body>

    </html>