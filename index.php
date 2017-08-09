<?php
ob_start();
require "config.php";
require "vendor/autoload.php";

$app = new Silex\Application();

$app->get('/', function () use($TEMPLATE) {
    $params = ["title" => "Technoshine X.6 | Techfest of NIT Durgapur"];
    return $TEMPLATE->render('index',$params);
});



$app->post('/user', function() use ($USER) {
    $email=$_POST['email'];
    
    $response=[];
    $response["email"] = $email;
    $response['exist'] = $USER->exists($email);
    
    return json_encode($response);
});

$app->match('/login', function () use($TEMPLATE,$DB) { 
    $message="";
    if( isset($_GET["message"]) ) {
        $message=$_GET["message"];
        seturl("/login");
    }
    return $TEMPLATE->render('login',
                             ["title" => "Login | Technoshine X.6",
                              "message"=>$message] );
});

$app->get('/email-sent', function () use($TEMPLATE,$DB) {    
    redirect("/login",["message"=>"Verification Mail has been sent to your email"]);
});

$app->match('/logout', function () use($USER) {
    $USER->logout();
    redirect('/');
    //return "";
});

$app->match('/register', function () use($TEMPLATE,$DB){
    return $TEMPLATE->render('register',["title"=> "Register | Technoshine x.6"]);

});

//==================== ANDROID CODE =================
$app->match('/android_register',function() use($DB,$USER) {
    $VALUES=$_POST;
    $VALUES['password']=md5($VALUES['password']);

    $response=[];
    $response["success"]="false";
    $response["message"]="chala?";
        
    if( $USER->exists($VALUES['email']) ) {
        $response["success"]=false;
        $response["message"]="Email already exist";
    }
    else if( $USER->register($VALUES) ) {
        $USER->send_mail($VALUES['email']);
        $response["success"]=true;
        $response["message"]="Verification Mail has been sent to your mail. Please verify email";
    }
    else {
        $response["success"]=false;
        $response["message"]="Registration Failed. Please try again later";
    }
    
    return json_encode($response);
});
$app->match('/android_login',function() use($DB,$USER) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    //dump ($_POST);
    $return = [];
    $return = $USER->login($email,$password);
    $return["sess_id"]=session_id();
    $return["firstname"]=$USER->get_fname();
    
    return json_encode($return);
});
$app->match('/android_logout',function() use($DB,$USER) {
    if(isset($_POST['sess_id'])) {
        $sess_id=$_POST['sess_id'];
        session_destroy();
        session_id($sess_id);
        session_start();
        session_destroy();
    }
    $response=[];
    $response["success"]=true;
    $response["message"]="User logged out";
    
    return json_encode($response);
});
$app->match('/android_getlevel',function() use($NETHUNT,$DB,$USER){
    if(isset($_POST['sess_id'])){
        $sess_id=$_POST['sess_id'];
        session_destroy();
        session_id($sess_id);
        session_start();
        if(!$USER->logged_in()){
           $USER->login($_POST["email"],$_POST["password"]);
        }
        
        $NETHUNT->register();
        
        $question=[];
        //comment line
       if($NETHUNT->finish()) {
           $question["level"]=-1;
           $question["question"]="";
            $question["type"]="";
            $question["sess_id"]= session_id();
        }
        else {
          //end  
            $question = $NETHUNT->get_question($NETHUNT->get_level());
            $question["sess_id"] = session_id();
           // $question["level"]=-2;
           // $question["question"]="";
           // $question["type"]="";
       }
        
        return json_encode($question);
    }
    return "";
});
$app->match('/android_chkans',function() use($NETHUNT,$DB,$USER){
    if(isset($_POST['sess_id'])){
        $sess_id=$_POST['sess_id'];
        session_destroy();
        session_id($sess_id);
        session_start();
        
        if(!$USER->logged_in()){
            $USER->login($_POST["email"],$_POST["password"]);
        }
        
        $response=[];
        $level=$_POST["level"];
        $answer=$_POST["answer"];
        $chekans= $NETHUNT->check_ans($level,$answer);
        if($chekans){
            $NETHUNT->levelup();
            $response["success"]=true;
            $response["sess_id"]= session_id();
        }
        else{
            $response["success"]=false;
            $response["sess_id"]= session_id();
        }
        
        return json_encode($response);
    }
    return "";
});
//================= ANDROID CODE END ======================


$app->get('/online-event', function () use($TEMPLATE) {
    $titleholder = ["title" => "Online Events | Technoshine X.6"];
    return $TEMPLATE->render('onlineevent',$titleholder);
});

$app->get('/offline-event', function () use($TEMPLATE) {
    return $TEMPLATE->render('offlineevent');
});


$app->get('/activate', function () use ($USER,$TEMPLATE) {
    if( isset($_GET['email']) && isset($_GET['hash']) ) {
        
        $email=$_GET['email'];
        $hash=$_GET['hash'];
        
        //dump($_GET);
        //die();
        
        if($USER->activate($email,$hash)) {
	        redirect('/login',["message" => "Your account is activated. Please Login"]);
           /* return $TEMPLATE->render('login',
                             ["title" => "Login | Technoshine X.6",
                             "message" => "Your account is activated. Please Login"]);*/
        }
        else {
            redirect('/');
        }
    }
    else
        redirect('/');
});


$app->match('/forgotpassword', function () use($TEMPLATE,$DB,$USER) {
    if(isset($_GET["email"]) && isset($_GET["hash"])) {
        $email=trim($_GET["email"]);
        $hash=trim($_GET["hash"]);
        seturl("/forgotpassword");
        return $TEMPLATE->render('forgotpassword',["title"=>"Forgotpassword | Technoshine x.6",
                                                   "email" => $email, "hash" => $hash,
                                                  "reset"=>true]);
    }
    else {
        return $TEMPLATE->render('forgotpassword',["title"=> "Forgotpassword | Technoshine x.6",
                                               "message" => "",
                                                  "reset"=>false]);
    }

});
$app->match('/nethunt', function() use ($TEMPLATE,$DB,$USER) {    
    return $TEMPLATE->render('nethunt',["title"=> "Welcome | Net Hunt"]);
});
$app->match('/nethunt/{level}', function($level) use ($TEMPLATE,$USER,$DB) {
        
    return $TEMPLATE->render('nethunt_level',
                                ["title"=>"Level $level | Net Hunt",
                                "level"=>$level]);
});
$app->match('/leaderboard', function() use ($TEMPLATE,$USER,$DB) {
        
    return $TEMPLATE->render('nethunt_leaderboard',
                                ["title"=>"LeaderBoard | Net Hunt"]);
});

$app->run();
