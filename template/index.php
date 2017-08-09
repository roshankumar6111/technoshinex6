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
    <meta name="author" content="Sk Johev, Roshan, Uttam" />
    <meta property="og:image" content="http://www.cadnitd.co.in/images/thumbnail.png" />
    <!--    links for navigation    -->
    <!--    end of links for navigation -->
    <link rel="image_src" href="images/thumbnail.png" />
    <link rel="icon" type="image/png" href="images/nittablogo.png">
    <link rel="stylesheet" type="text/css" href="css/icons.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/mobile.css" />

    <link rel="stylesheet" type="text/css" href="css/homepage.css?v=1.1" />
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
    <script src="js/tether.min.js"></script>
    <script src="js/headingmm.js"></script>
</head>
<style>
    .js div#preloader { position: fixed; left: 0; top: 0; z-index: 100000; width: 100%; height: 100%; overflow: visible; background: #333 url('images/loader/hourglass.svg') no-repeat center center; }
    
    .uname{
        position: absolute;
        background: #e8a11c;
        color:white;
        top:50px;
        left:130px;
        padding:10px 30px;
        cursor:pointer;
        
    }
    a:focus,
    a:hover{
        color:white;
        text-decoration: none;
        
    }
   

</style>
<div class="js"><!--this is supposed to be on the HTML element but codepen won't let me do it-->
  <body>
    <div id="preloader"></div>
             <!-- ============================NOTIFICATION================== -->
        <div id="text-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->

            <div class="row">
                <div class="col-xs-offset-2 col-xs-8">
                    <div class="carousel-inner">
                        <?php
                            global $DB;
$result = $DB->query('select `time`,info,href from notifications');
if(count($result)) {
    $cnt=0;
    foreach($result as $n) {
        $date = new DateTime($n["time"]);
        $date = $date->format("dS M 'y h:i A");
                        ?>
                            <div class="item<?=($cnt==0?" active":"")?>">
                                <div class="carousel-content">
                                    <a <?=(empty($n["href"])? "": "href=".$n["href"] )?>>
                                        <p><span class="n-time"><?=$date?></span> ~ <span class="n-info"><?=$n["info"]?></span></p>
                                    </a>
                                </div>
                            </div>
                            <?php
    ++$cnt;
    }
}
else { ?>
                                <div class="item active">
                                    <div class="carousel-content">
                                        <p>No notifications yet. Stay Tuned! <i class="fa fa-smile-o"></i></p>
                                    </div>
                                </div>
                                <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#text-carousel" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="right carousel-control" href="#text-carousel" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>

        </div>
        <!-- ============================NOTIFICATION DONE================== -->
<!--
    <nav style="z-index:10; background:#ffc861;" class="navbar navbar-default visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="background:#ff885c;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
-->
                <!--            <a class="navbar-brand" href="#">Project name</a>-->
<!--
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?=$GLOBALS['site.root']?>/#1">Home</a></li>
                    <li><a href="<?=$GLOBALS['site.root']?>/#2">Offline Event</a></li>
                    <li><a href="<?=$GLOBALS['site.root']?>/#3">Online Event</a></li>
                    <li><a href="<?=$GLOBALS['site.root']?>/#3">Team</a></li>
                    <li><a href="<?=$GLOBALS['site.root']?>/#4">Sponsors</a></li>
                    <li><a href="<?=$GLOBALS['site.root']?>/#5">Where?</a></li>
                </ul>

            </div>
-->
            <!--/.nav-collapse -->
<!--        </div>-->
        <!-- /.container-fluid -->
<!--    </nav>-->
    <!-- -->
    <div class="row">
        <div class="navbar navbar-default visible-xs">
            <div class="navbar-header">
                <span class="Position">Menu</span>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">MENU 1</a></li>
                    <li><a href="about.html">MENU 2</a></li>
                    <li><a href="food.html">MENU 3</a></li>
                    <li><a href="apparels.html">MENU 3</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal3">
        <input id="modal3" type="checkbox" name="modal3" tabindex="1">
        <div class="modal3__overlay">
            <label for="modal3"><i class="fa fa-close closebtnmember" style="z-index:1000;"></i>
            </label>
            <div class="container" id="about-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="about-video">

                        <iframe width="560" height="315" src="https://www.youtube.com/embed/xxpE7jyMh30" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12" id="about-desc">
                        <span style="color:dodgerblue">Technoshine X.6 </span>|The only TechFest by the post-graduates of CA Dept, NIT DGP, is a convergence of the technically inclined students from colleges all over India and abroad. The three-day fiesta consists of events showcasing the fun and brilliance of technology and also provides a platform to woo all with your hidden talents. From quizzes on diverse topics including technologies, general knowledge and computer applications to painting on your friend’s body and performing your heart out for the immensely cheerful crowd – it’s a fest that’ll pop up your adrenaline rush. There’s room for all- the coder, the dancer, the painter, the shutterbug or the super-nerd. With such innumerous events and participation from colleges all over India, Technoshine leads the light of instilling a culture of science, technology and innovation among the youth of the nation.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- body starts -->
    <div class="container demo-1">
        <div id="slider" class="sl-slider-wrapper">
            <!--event sponser-->
            <div class="sl-slider">
                <div class="sl-slide bg-1" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                    <div id="slide1bg"></div>
                    <script src="js/comic_back_css.js"></script>
                    <div class="sl-slide-inner">
                        <img src="images/cad_logo.png" alt="cadlogo" class="cadlogo">
                        <div class="nitlogoname">NIT Durgapur</div>
                       
                        <?php
                         global $USER;
                        if($USER->logged_in()){
                          $uname = $_SESSION["firstname"];
                          echo "<a class='uname'>Hi! $uname</a>";
                        }
                       ?>
                        <img src="images/nitlogo.png" alt="nitlogo" class="nitlogo">
                        <div class="cadlogoname"><span id="cadnamecenter">Centre for Application</span><br><span id="cadnamedev">Devlopment</span> </div>
                        <!-- end overlay -->
                        <div class="overlay-wrapper">
                            <?php 
                                global $USER;
                                if(!$USER->logged_in()){
                                
                            echo "<div style='cursor:pointer; margin-right:10px;'><a class='btn1 btn1-dark smargin overlay-btn overlay-btnhomeeffect' href='".$GLOBALS['site.root']."/register'>REGISTER</a></div>";
                                } 
                            else {
                                echo "<div style='cursor:pointer; margin-right:10px;'><a class='btn1 btn1-dark smargin overlay-btn overlay-btnhomeeffect' href='".$GLOBALS['site.root']."/nethunt'>PLAY NETHUNT</a></div>";
                            }
                            ?>
                            <label for="modal3">

                                <div style="cursor:pointer; margin-right:10px;"><a class="btn1 btn1-dark overlay-btn overlay-btnhomeeffect">WHAT?</a></div>


                            </label>
                            <div style="cursor:pointer">
                                <?php
    global $USER;
    $siteroot = $GLOBALS['site.root'];
    if($USER->logged_in()){
      
        echo "<a class='btn1 btn1-dark overlay-btn overlay-btnhomeeffect' href='$siteroot/logout'>LOGOUT</a>";
    }
    else
        echo "<a class='btn1 inout btn1-dark overlay-btn overlay-btnhomeeffect' href='$siteroot/login'>LOGIN</a>";
    ?> </div>
                        </div>
                        <div class="rotate">
                            <div class="heading rotatexy">
                                <div class="heading-bubble"></div>
                                <div class="heading-text">
<!--                                    <p class="eventtag">Tech Fest</p>-->
                                    Technoshine <span id="x6">X.6</span>
<!--                                    <p class="maintag">Opening the gateway to the world of Comics</p>-->
                                </div>
                            </div>
                        </div>

                        <!--                        <span class="heading ts-heading"><span id="tec">Tec</span><span id="hnoshine">hnoshine</span><span id="x6"> X.6</span></span>-->
                        <!-- button -->
                    </div>
                </div>
                <div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                    <div id="slide2bg"></div>
                    <div class="sl-slide-inner">
                        <div class="rotate">
                            <div class="heading rotatexy">
                                <div class="heading-bubble heading-thunder"></div>
                                <div class="heading-text">
                                    ONLINE <span id="x6">EVENTS</span>
<!--                                    <p class="eventtag">BAM! Let the game begin!</p>-->
                                </div>
                            </div>
                        </div>
                        <div style="font-size:30px;cursor:pointer"> <a href="<?=$GLOBALS['site.root']?>/online-event" class="btn2 btn2-dark overlay-btn overlay-wrapper overlay-btnclickeffect"> EXPLORE</a></div>

                    </div>
                </div>
                <div class="sl-slide bg-3" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                    <div id="slide3bg"></div>
                    <div class="sl-slide-inner">
                    </div>
                    <div class="rotate">
                        <div class="heading rotatexy">
                            <div class="heading-bubble heading-thunder2"></div>
                            <div class="heading-text">
                                <span id="x6">OFFLINE</span> EVENTS
<!--                                <p class="eventtag">Buckle your shoe!</p>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col three">
                            <div style="font-size:30px;cursor:pointer"> <a href="<?= $GLOBALS['site.root']?>/offline-event" class="btn2 btn2-dark overlay-btn overlay-wrapper overlay-btnclickeffect">EXPLORE</a> </div>
                        </div>
                    </div>
                </div>
                <div class="sl-slide bg-4" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="overlaymember-content">
                            <div class="container-fluid" style="padding-top:0px;">
                                <div class="row banner-heading" id="member-heading">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <p class="overlay-heading">TEAM</p>
                                       
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row" style="margin-top:100px;">
                                        <div class="col-lg-2 col-lg-offset-3  col-md-2 col-md-offset-3">
                                            <img class=" mebimg img-circle" src="images/team/mahesh.jpg">
                                            <p class="mebname">Mahesh Yadav</p>
                                            <p class="stylemeb"><em>President</em></p>
                                        </div>
                                         <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/snehasish.jpg">
                                            <p class="mebname">Snehasish Das Gupta</p>
                                            <p class="stylemeb"><em>Vice President</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class="mebimg img-circle" src="images/team/shristi.jpg">
                                            <p class="mebname">Shristi Parmanandka</p>
                                            <p class="stylemeb"><em>Vice President</em></p>
                                        </div>
                                     
                                     

                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1">
                                            <img class=" mebimg img-circle" src="images/team/souradeep.jpg">
                                            <p class="mebname">Souradeep Saha</p>
                                            <p class="stylemeb"><em>General Secretary</em></p>
                                        </div>
                                           <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/tiwari.jpg">
                                            <p class="mebname">Sourabh Tiwari</p>
                                            <p class="stylemeb"><em>Treasurer</em></p>
                                        </div>
                                     
                                             <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/manisha.jpg">
                                            <p class="mebname">Manisha Kumari</p>
                                            <p class="stylemeb"><em>Treasurer</em></p>
                                        </div>
                                          <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/johev.jpg">
                                            <p class="mebname">Sk Jhohev</p>
                                            <p class="stylemeb"><em>Development Head</em></p>
                                        </div>
                                         <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/sandeep.jpg">
                                            <p class="mebname">Sandeep Vani</p>
                                            <p class="stylemeb"><em>Designing Head</em></p>
                                        </div>
                                        
                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/bappa.jpg">
                                            <p class="mebname">Bappaditya Samanta</p>
                                            <p class="stylemeb">Online Activity Head</p>
                                        </div>
                                      
                                         <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/arpit.jpg">
                                            <p class="mebname">Arpit Mishra</p>
                                            <p class="stylemeb"><em>Management Head</em></p>
                                        </div>
                                       
                                          <div class="col-lg-2 col-md-2">
                                            <img class="mebimg img-circle" src="images/team/sonam.jpg">
                                            <p class="mebname">Sonam Agrawal</p>
                                            <p class="stylemeb"><em>Management Head</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/subham.jpg">
                                            <p class="mebname">Subham Majavdiya</p>
                                            <p class="stylemeb"><em>Development Coord.</em></p>
                                        </div>
                                         <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/umesh.jpg">
                                            <p class="mebname">Umesh Kumar</p>
                                            <p class="stylemeb"><em>Development Coord.</em></p>
                                        </div>
                                      
                                           <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/abhishek_agarwal.jpg">
                                            <p class="mebname">Abhishek Agarwal</p>
                                            <p class="stylemeb"><em>Group Coordinator</em></p>
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/oindrila.jpg">
                                            <p class="mebname">Oindrila Saha</p>
                                            <p class="stylemeb"><em>Designing Coordinator </em></p>
                                        </div>
                                      
                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/ankit.jpg">
                                            <p class="mebname">Ankit Singh Rajput</p>
                                            <p class="stylemeb"><em>Designing Coordinator</em></p>
                                        </div>
                                          
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/mayank.jpg">
                                            <p class="mebname">Mayank Verma</p>
                                            <p class="stylemeb"><em>Fest Coordinator</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/nisha.jpg">
                                            <p class="mebname">Nisha Kumari</p>
                                            <p class="stylemeb"><em>Fest Coordinator</em></p>
                                        </div>
                                         
                                           <div class="col-lg-2 col-md-2">
                                            <img class="mebimg img-circle" src="images/team/tanushree.jpg">
                                            <p class="mebname">Tanushree Chakravarty</p>
                                            <p class="stylemeb"><em>Resource Manager</em></p>
                                        </div>

                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/saurabh_mishra.jpg">
                                            <p class="mebname">Saurabh Mishra</p>
                                            <p class="stylemeb"><em>Resource Manager</em></p>
                                        </div>


                                    </div>
                                    <div class="row" style="margin-top:20px;">
                                   
                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/roshan2.jpg">
                                            <p class="mebname">Roshan kumar</p>
                                            <p class="stylemeb"><em>Web Designing Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/uttam.jpg">
                                            <p class="mebname">Uttam Omar</p>
                                            <p class="stylemeb"><em>Web Development</em></p>
                                        </div>

                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/nishant.jpg">
                                            <p class="mebname">Nishant</p>
                                            <p class="stylemeb"><em>Data Structure Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/himanshu.jpg">
                                            <p class="mebname">Himanshu Kumari </p>
                                            <p class="stylemeb"><em>Data Structure Team</em></p>
                                        </div>
                                          <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/deepanshu.jpg">
                                            <p class="mebname">Deepanshu Sharma</p>
                                            <p class="stylemeb"><em>Android Team</em></p>
                                        </div>
                                        
                                           <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/Sujeet.jpeg">
                                            <p class="mebname">Sujeet Kumar Gupta</p>
                                            <p class="stylemeb"><em>Android Team</em></p>
                                        </div>



                                    </div>
                                    <div class="row" style="margin-top:20px;">

                                   


                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/saroj.jpg">
                                            <p class="mebname">Saroj Kumar</p>
                                            <p class="stylemeb"><em>Development Team</em></p>
                                        </div>
                                     
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/deblina.jpeg">
                                            <p class="mebname">Deblina Banerjee</p>
                                            <p class="stylemeb"><em>Development Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/ashu.jpg">
                                            <p class="mebname">Ashutosh Ranjan</p>
                                            <p class="stylemeb"><em>Development Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/manish.jpg">
                                            <p class="mebname">Manish Shaw</p>
                                            <p class="stylemeb"><em>Designing Team</em></p>
                                        </div>
                                       <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/rahul_ravi.jpg">
                                            <p class="mebname">Rahul Ravi Prakash</p>
                                            <p class="stylemeb"><em>Designing Team</em></p>
                                        </div>
                                          <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/sree.jpg">
                                            <p class="mebname">shirish seles</p>
                                            <p class="stylemeb"><em>Designing Team</em></p>
                                        </div>

                                    </div>

                                    <div class="row" style="margin:20px;">
                                      
                                     
                                       <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1">
                                            <img class=" mebimg img-circle" src="images/team/neha.jpg">
                                            <p class="mebname">Neha Chandra</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>

                                          <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/subhamjpg.jpg">
                                            <p class="mebname">Shubham Verma</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>

                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/krishnendu.jpg">
                                            <p class="mebname">Krishnendu Mukherjee</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>

                                      

                                        <div class="col-lg-2 col-md-2">
                                            <img class="img-circle mebimg" src="images/team/rajan.jpg">
                                            <p class="mebname">rajan priyadarshi</p>
                                            <p class="stylemeb"><em> Management Team</em></p>
                                        </div>
                                          <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/aakanksha.jpg">
                                            <p class="mebname">Aakanksha Kashyap</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>
                                      
                                    </div>
                                    <div class="row" style="margin:20px 0px 100px 0px;">
                                        <div class="col-lg-2 col-lg-offset-3  col-md-2 col-md-offset-3">
                                            <img class=" mebimg img-circle" src="images/team/sanjay.jpeg">
                                            <p class="mebname">Sanjay choudhary</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/tanya.jpg">
                                            <p class="mebname">Tanya Singh</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                            <img class=" mebimg img-circle" src="images/team/soumyajit.jpg">
                                            <p class="mebname">Soumyajit Das</p>
                                            <p class="stylemeb"><em>Management Team</em></p>
                                        </div>
                                      


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sl-slide bg-5" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="container-fluid">
                            <div class="row banner-heading" id="sponsor-heading">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p class="overlay-heading">SPONSORS</p>
                                  
                                </div>
                            </div>
                        
                            
                             <div class="container">  
                            <img id="sponsorsimg" src="images/sponsors/Sponsor.jpg" alt="img-sponsor" />
                                 </div> 
                            
                            
<!--
                            <div class="row">



                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <img class="sponsorimg center-block" alt="" src="images/sponsors/pantaloons.png">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/ubi.png">
                                </div>
                                <div class="col-lg-3 col-md-3 col-md-3 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/vatika.png">
                                </div>
                            </div>


                            <div class="row">
                                <div class="  col-lg-3 col-md-3 col-sm-3 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/hackerrank.png">
                                </div>
                                <div class="  col-lg-3 col-md-3 col-sm-3">
                                    <img alt="" class=" center-block sponsorimg" src="images/sponsors/dominos.png">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <img alt="" class="center-block sponsorimg" src="images/sponsors/cmc.jpg">
                                </div>

                                <div class=" col-lg-3 col-md-3  col-sm-3 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/code.jpg">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-4 col-md-4 col-sm-4 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/macintel.jpg">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/ananyas.png">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 ">
                                    <img alt="" class="sponsorimg center-block" src="images/sponsors/studioe.jpg">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                 <img alt="" class="sponsorimg center-block" src="images/sponsors/mageba.jpg">
                                </div>
                            
                            </div>
-->


                        </div>
                    </div>

                </div>
                <!-- /sl-slider -->
                <div class="sl-slide bg-6" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                    <div class="sl-slide-inner">
                        <div class="container-fluid">
                            <div class="row banner-heading" id="contact-heading">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p class="overlay-heading">WHERE?</p>
                                  
                                </div>
                            </div>
                            <div class="row" id="map-row">
                                <div id="map"></div>
                                <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA-Xh-7qkuvE3r8RlofFsgDuC_uydTCd80"></script>
                                <script>
                                    var map;
                                    var center;

                                    // Create an array of styles.
                                    var styles = [
                                        {
                                            stylers: [
                                                {
                                                    hue: "#00ffe6"
                                                },
                                                {
                                                    saturation: -20
                                                }]
                                        }, {
                                            featureType: "road",
                                            elementType: "geometry",
                                            stylers: [
                                                {
                                                    lightness: 100
                                                },
                                                {
                                                    visibility: "simplified"
                                                }]
                                        }, {
                                            featureType: "road",
                                            elementType: "labels",
                                            stylers: [
                                                {
                                                    visibility: "off"
                                                }]
                                        }];
                                    var styles_grey = [
                                        {
                                            "featureType": "all",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "saturation": 36
                                        }, {
                                                "color": "#000000"
                                        }, {
                                                "lightness": 40
                                        }]
                                    }, {
                                            "featureType": "all",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "on"
                                        }, {
                                                "color": "#000000"
                                        }, {
                                                "lightness": 16
                                        }]
                                    }, {
                                            "featureType": "all",
                                            "elementType": "labels.icon",
                                            "stylers": [{
                                                "visibility": "off"
                                        }]
                                    }, {
                                            "featureType": "administrative",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 20
                                        }]
                                    }, {
                                            "featureType": "administrative",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 17
                                        }, {
                                                "weight": 1.2
                                        }]
                                    }, {
                                            "featureType": "landscape",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 20
                                        }]
                                    }, {
                                            "featureType": "poi",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 21
                                        }]
                                    }, {
                                            "featureType": "road.highway",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 17
                                        }]
                                    }, {
                                            "featureType": "road.highway",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 29
                                        }, {
                                                "weight": 0.2
                                        }]
                                    }, {
                                            "featureType": "road.arterial",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 18
                                        }]
                                    }, {
                                            "featureType": "road.local",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 16
                                        }]
                                    }, {
                                            "featureType": "transit",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 19
                                        }]
                                    }, {
                                            "featureType": "water",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#000000"
                                        }, {
                                                "lightness": 17
                                        }]
                                    }];
                                    var styles_minimal = [
                                        {
                                            "featureType": "all",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "saturation": 36
                                            }, {
                                                "color": "#333333"
                                            }, {
                                                "lightness": 40
                                            }]
                                        }, {
                                            "featureType": "all",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "on"
                                            }, {
                                                "color": "#ffffff"
                                            }, {
                                                "lightness": 16
                                            }]
                                        }, {
                                            "featureType": "all",
                                            "elementType": "labels.icon",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "administrative.locality",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "administrative.neighborhood",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ff0000"
                                            }]
                                        }, {
                                            "featureType": "administrative.neighborhood",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "administrative.land_parcel",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ff0000"
                                            }, {
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "administrative.land_parcel",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "landscape",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#eae7e2"
                                            }]
                                        }, {
                                            "featureType": "landscape.man_made",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ebe8e3"
                                            }]
                                        }, {
                                            "featureType": "landscape.man_made",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "landscape.natural.landcover",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "landscape.natural.terrain",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "poi",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#f5f5f5"
                                            }, {
                                                "lightness": 21
                                            }]
                                        }, {
                                            "featureType": "poi.park",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#f4f3f0"
                                            }]
                                        }, {
                                            "featureType": "poi.park",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "road.highway",
                                            "elementType": "geometry.fill",
                                            "stylers": [{
                                                "color": "#aba9a9"
                                            }]
                                        }, {
                                            "featureType": "road.highway",
                                            "elementType": "geometry.stroke",
                                            "stylers": [{
                                                "color": "#ffffff"
                                            }, {
                                                "lightness": 29
                                            }, {
                                                "weight": 0.2
                                            }, {
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "road.highway",
                                            "elementType": "labels.text.fill",
                                            "stylers": [{
                                                "color": "#7a7874"
                                            }]
                                        }, {
                                            "featureType": "road.highway",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "road.arterial",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ffffff"
                                            }, {
                                                "lightness": 18
                                            }]
                                        }, {
                                            "featureType": "road.arterial",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "road.local",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#ffffff"
                                            }, {
                                                "lightness": 16
                                            }]
                                        }, {
                                            "featureType": "road.local",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }, {
                                            "featureType": "transit",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#f2f2f2"
                                            }, {
                                                "lightness": 19
                                            }]
                                        }, {
                                            "featureType": "water",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#c1bdb8"
                                            }]
                                        }, {
                                            "featureType": "water",
                                            "elementType": "labels.text.stroke",
                                            "stylers": [{
                                                "visibility": "off"
                                            }]
                                        }
                                                        ];
                                    var styles_cobalt = [
                                        {
                                            "featureType": "all",
                                            "elementType": "all",
                                            "stylers": [{
                                                "invert_lightness": true
                                            }, {
                                                "saturation": 10
                                            }, {
                                                "lightness": 30
                                            }, {
                                                "gamma": 0.5
                                            }, {
                                                "hue": "#435158"
                                            }]
                                        }
                                    ];
                                    var styles_lunar = [
                                        {
                                            "stylers": [{
                                                "hue": "#ff1a00"
                                            }, {
                                                "invert_lightness": true
                                            }, {
                                                "saturation": -100
                                            }, {
                                                "lightness": 33
                                            }, {
                                                "gamma": 0.5
                                            }]
                                        }, {
                                            "featureType": "water",
                                            "elementType": "geometry",
                                            "stylers": [{
                                                "color": "#2D333C"
                                            }]
                                        }
                                                     ];


                                    function initMap() {
                                        console.log("MAP RUNNING");

                                        center = new google.maps.LatLng(23.5509371, 87.2915547);
                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: center,
                                            zoom: 14,
                                            styles: styles_lunar
                                        });

                                        marker = new google.maps.Marker({
                                            map: map,
                                            position: new google.maps.LatLng(23.5509371, 87.2915547)
                                        });
                                        infowindow = new google.maps.InfoWindow({
                                            content: '<strong>National Institute of Technology</strong><br>Mahatma Gandhi Rd A-Zone Durgapur, West Bengal 713209 India<br>'
                                        });
                                        //                                         var infowindow = new google.maps.InfoWindow();
                                        //        var service = new google.maps.places.PlacesService(map);
                                        //
                                        //        service.getDetails({
                                        //          placeId: 'ChIJN1t_tDeuEmsRUsoyG83frY4'
                                        //        }, function(place, status) {
                                        //          if (status === google.maps.places.PlacesServiceStatus.OK) {
                                        //            var marker = new google.maps.Marker({
                                        //              map: map,
                                        //              position: new google.maps.LatLng(23.5509371, 87.2915547)
                                        //            });
                                        resizeMap();
                                    }

                                    google.maps.event.addDomListener(window, 'load', initMap);
                                    google.maps.event.addDomListener(window, "resize", resizeMap);
                                    //                                                                  google.maps.event.addListener(marker, 'click', function() {
                                    //              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                                    //                'Place ID: ' + place.place_id + '<br>' +
                                    //                place.formatted_address + '</div>');
                                    //              infowindow.open(map, this);
                                    //            });

                                    function resizeMap() {
                                        console.log("Map Resized");
                                        var center = map.getCenter();
                                        google.maps.event.trigger(map, "resize");
                                        map.setCenter(center);

                                        google.maps.event.addListener(marker, 'load', function () {
                                            infowindow.open(map, marker);
                                        });
                                        infowindow.open(map, marker);
                                    }
                                </script>
                            </div>
                            <div class="row contacts-box">
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-map-marker" style="cursor:default;">
                                        <i class="fa fa-code"></i>
                                    </a>
                                    <div class="contact-desc">
                                        <p>Web Dev Team @ CAD
                                        <br>(<a class="fb-link" href="https://www.facebook.com/profile.php?id=100001984642727" target="_blank">Roshan</a>, <a class="fb-link" target="_blank" href="https://www.facebook.com/uttam.omar">Uttam</a>, <a class="fb-link" target="_blank" href="https://www.facebook.com/johev09">Johev</a>)
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-envelope" style="cursor:default;">
                                        <i class="fa fa-envelope mail"></i>
                                    </a>
                                    <div class="contact-desc">
                                        <p>technoshine.ca@gmail.com</p>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-phone" style="cursor:default;">
                                        <i class="fa fa-phone phone"></i>
                                    </a>
                                    <div class="contact-desc">
                                        <p>+91-9007386263</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-social-icon btn-twitter" href="https://twitter.com/technoshinex6">
                                        <i class="fa fa-twitter iconcolor"></i>
                                    </a>
                                    <p>Twitter</p>
                                </div>
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/technoshinex.6/?pnref=story" target="_blank">
                                        <i class="fa fa-facebook fbiconcolor"></i>
                                    </a>
                                    <p>Facebook</p>
                                </div>
                                <div class="col-lg-2 col-md-2 social">
                                    <a class="btn btn-social-icon btn-youtube" href="https://www.youtube.com/embed/xxpE7jyMh30" target="_blank">
                                        <i class="fa fa-youtube yticoncolor"></i>
                                    </a>
                                    <p>YouTube</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /sl-slider -->
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev" data-toggle="tooltip" data-placement="right" title="Previous">Previous</span>
                    <span class="nav-arrow-next" data-toggle="tooltip" data-placement="left" title="Next">Next</span>
                </nav>

                <nav id="nav-dots" class="nav-dots">
                    <span class="nav-dot-current" data-toggle="tooltip" data-placement="top" title="Home"></span>
                    <span data-toggle="tooltip" data-placement="top" title="Online Event"></span>
                    <span data-toggle="tooltip" data-placement="top" title="Offline Event"></span>
                    <span data-toggle="tooltip" data-placement="top" title="Team"></span>
                    <span data-toggle="tooltip" data-placement="top" title="Sponsors"></span>
                    <span data-toggle="tooltip" data-placement="top" title="Where?"></span>
                </nav>
            </div>
            <!-- /slider-wrapper -->
        </div>
        <nav id="bt-menu" class="bt-menu" style="z-index:100;">
            <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
            <ul>
                <li>
                    <div id="trigger-overlay6" class="" style="cursor:pointer" data-icon=""><a class=" ">about</a></div>
                </li>
                <li><a href="#" class="bt-icon icon-windows">Work</a></li>
                <li><a href="#" class="bt-icon icon-windows">Work</a></li>
                <li><a href="#" class="bt-icon icon-windows">Work</a></li>

            </ul>
        </nav>
        <script type="text/javascript" src="js/jquery.ba-cond.min.js"></script>
        <script type="text/javascript" src="js/jquery.slitslider.js"></script>
        <script type="text/javascript">
            $(function () {
                var Page = (function () {
                    var left = ["Contact us", "Home", "Online Event", "Offline Event", "Members", "Sponsors"];
                    var right = ["Online Event", "Offline Event", "Members", "Sponsors", "Contact Us", "Home"];

                    var $navArrows = $('#nav-arrows'),
                        $navleft = $navArrows.children(':first'),
                        $navright = $navArrows.children(':last'),
                        $nav = $('#nav-dots > span'),
                        slitslider = $('#slider').slitslider({
                            onBeforeChange: function (slide, pos) {
                                $nav.removeClass('nav-dot-current');
                                $nav.eq(pos).addClass('nav-dot-current');
                                
                                setArrowText(pos);
                                //console.log(pos);                                
                                window.location.hash = pos;
                            },
                            onAfterChange: function (slide, pos) {
                                //setArrowText(pos);
                                if (pos == 5) {
                                    resizeMap();
                                }
                            }
                        }),
                        setArrowText = function (pos) {
                            //console.log($navArrows);
                            $navleft.tooltip('hide');
                            $navright.tooltip('hide');

                            $navleft.attr("title", "");
                            $navleft.attr("data-original-title", left[pos]);

                            $navright.attr("title", "");
                            $navright.attr("data-original-title", right[pos]);

                            //$('[data-toggle="tooltip"]').tooltip('show');
                        },
                        init = function () {
                            initEvents();

                            setArrowText(0);
                            if (window.location.hash != "") {
                                var pageno = window.location.hash.substr(1);
                                slitslider.jump(parseInt(pageno) + 1);
                                setArrowText(pageno);

                                //console.log(window.location.hash, pageno);
                            }
                            //slitslider.jump(6);
                        },
                        initEvents = function () {
                            // add navigation events
                            $navArrows.children(':last').on('click', function () {
                                slitslider.next();
                                return false;
                            });

                            $navArrows.children(':first').on('click', function () {
                                slitslider.previous();
                                return false;
                            });

                            $nav.each(function (i) {

                                $(this).on('click', function (event) {
                                    var $dot = $(this);

                                    if (!slitslider.isActive()) {
                                        $nav.removeClass('nav-dot-current');
                                        $dot.addClass('nav-dot-current');
                                    }

                                    slitslider.jump(i + 1);
                                    return false;
                                });
                            });
                        };

                 
                    
                    
                    window.onmousewheel = function(ev){
                        var slidestoscroll=[3];
                        if(slidestoscroll.indexOf(slitslider.current)!= -1)
                            return;
                        var down=(ev.wheelDelta<0);
                        if(down){
                            slitslider.next();
                        }
                        else{
                            slitslider.previous();
                        }
                    }
                    return {
                        init: init
                    };

                })();

                Page.init();
            });


            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            })
            
            jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
	$('#preloader').fadeOut('slow',function(){$(this).remove();});
});

});
        </script>
    </div>

</body>
<script src="js/classie.js"></script>
<script src="js/borderMenu.js"></script>
    </div>
</html>