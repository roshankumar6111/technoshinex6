<?php

class User {
    
    private $db;
    public $uname;
    public $name;
    public $location;

    public function __construct($db){
        $this->db = $db; 
    }
    
    public function get_location() {
        if(!isset($_SESSION['location'])) {
            $query="SELECT location FROM authors WHERE aid=:aid";
            $rows=$this->db->query($query,["aid"=>$this->get_uid()]);
            $_SESSION['location']=$rows[0]['location'];
        }
        return $_SESSION['location'];
    }
    
    public function logged_in() {
        return isset($_SESSION['loggedin'])? $_SESSION['loggedin']: false;
    }
    
    public function exists($username) {
        $query="SELECT email FROM users WHERE email=:email";
        $rows=$this->db->query($query,array("email"=>$username));
        
        return count($rows)>0? true: false;
    }
    
    private function password_verify($pass,$hash) {
        return md5($pass)==$hash;
    }
    public function activate($email,$hash) {
        $sql = "SELECT hash FROM users WHERE email=:email";
        $result = $this->db->query($sql, ["email"=>$email] );
        
        if(count($result)) {
            if($hash==$result[0]['hash']) {
                $sql = "UPDATE users SET active=1 WHERE email=:email";
		$this->db->update($sql, ["email"=>$email] );
//	        dump($result);
//	        die();
                return true;
            }
            return false;
        }
        
        return false;
    }
    
    public function login($email,$password) {
        $sql = "SELECT uid, email, firstname, lastname, active FROM users WHERE email=:email AND password=:password";
        
        $password = $this->hash_pass($password);
        
        $params = ["email"=>$email,
            "password"=>$password];

        $resultarr = $this->db->query($sql,$params);
        
        $return = ["success"=>false,
                    "message"=>"Username or Password is incorrect"];
        //dump($resultarr);
        //die();

        //comment for local
        
          if(count($resultarr)) {
            if(!$resultarr[0]['active']){
               $this->send_mail($email);
               
               $return["success"]=false;
               $return["message"]="User not Activated. Mail has been sent again";
               return $return;
            }
            $_SESSION['uid']=$resultarr[0]['uid'];
            $_SESSION['email']=$resultarr[0]['email'];
            $_SESSION['firstname']=$resultarr[0]['firstname'];
            $_SESSION['lastname']=$resultarr[0]['lastname'];
            $_SESSION['loggedin'] = true;
            
            $return["success"]=true;
            return $return;
        }
        
        return $return;
    }
    
    public function hash_pass($password) {
        return md5($password);
    }
    
    public function register($values) {
        $hash=md5($values['email'].time());
        
        $values['hash']=$hash;
        return $this->db->insert('users',$values);
    }
    
    public function get_details($email) {
        $sql="SELECT uid, email, hash, firstname, lastname, contact, college, country, active FROM users
        WHERE email=:email";
        $params=["email"=>$email];
        
        $result = $this->db->query($sql,$params);
        return $result[0];
    }
    
    public function get_email() {
        return $_SESSION['email'];
    }
    
    
    public function get_uid() {
        return $_SESSION['uid'];
    }
    public function get_fname() {
        return $_SESSION['fname'];
    }
    public function get_lname() {
        return $_SESSION['lname'];
    }
    public function get_name() {
        return $this->get_fname()." ".$this->get_lname();
    }
    
    public function logout() {
        session_destroy();
    }

    function send_reset_mail($email) {
    
    	if(!$this->exists($email))
         	return;
        
        $details = $this->get_details($email);
        //dump($details);
        //die();
        require "PHPMailer-master/PHPMailerAutoload.php";

        $mail = new PHPMailer();

//        $mail->SMTPDebug = 2;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
       	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'technoshine.ca@gmail.com';                 // SMTP username
        $mail->Password = 'club@nitdgp';                           // SMTP password
        $mail->SMTPSecure = 'tls';//'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;//465                                    // TCP port to connect to

        $mail->SetFrom('technoshine.ca@gmail.com', 'Technoshine X.6');
        $mail->AddAddress($email, $details['firstname']);
        //$mail->AddReplyTo('technoshine.ca@gmail.com', 'Technoshine X.6');
        //$mail->addCC('technoshine.ca@gmail.com');
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Technoshine X.6 - Password Reset';

        $message = "Hi,<br><br>
        To Reset your Technoshine X.6 Registration Password, please click on this<br><br>";
        $message .= "<a href='";
        $message .= "http://www.cadnitd.co.in/forgotpassword?email=".urlencode($details['email'])."&hash=".$details['hash'];
        $message .= "'>RESET PASSWORD</a>";       
        $message .= "<br><br>Have a Code-tastic Day!!!";
        
        $mail->Body    = $message;

        if(!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
        }
	//die();
	}	
    
    
    
    function send_mail($email) {
    
    	if(!$this->exists($email))
         	return;
        
        $details = $this->get_details($email);
        //dump($details);
        //die();
        require "PHPMailer-master/PHPMailerAutoload.php";

        $mail = new PHPMailer();

//        $mail->SMTPDebug = 2;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
       	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'technoshine.ca@gmail.com';                 // SMTP username
        $mail->Password = 'club@nitdgp';                           // SMTP password
        $mail->SMTPSecure = 'tls';//'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;//465                                    // TCP port to connect to

        $mail->SetFrom('technoshine.ca@gmail.com', 'Technoshine X.6');
        $mail->AddAddress($email, $details['firstname']);
        //$mail->AddReplyTo('technoshine.ca@gmail.com', 'Technoshine X.6');
        //$mail->addCC('technoshine.ca@gmail.com');
        
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Technoshine X.6 - Account Activation';

        $message = "Hi,<br><br>
        To Activate your Technoshine X.6 Registration, please click on this<br><br>";
        $message .= "<a href='";
        $message .= "http://www.cadnitd.co.in/activate?email=".urlencode($details['email'])."&hash=".$details['hash'];
        $message .= "'>VERIFY</a>";       
        $message .= "<br><br>Have a Code-tastic Day!!!";
        
        $mail->Body    = $message;

        if(!$mail->Send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
        }
	//die();
	}	
}
