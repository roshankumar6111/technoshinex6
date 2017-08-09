<?php

$errors="";
$VALUES=[];


function check() {
    global $VALUES;
    global $DB;
    global $USER;
    global $errors;
    
    //===========FIRST NAME
    if( !isset($_POST['firstname']) || empty($_POST['firstname']) ) {
        $errors="First Name not provided";
        return false;
    }
    $firstname=$_POST['firstname'];
    if(!preg_match("/^[a-zA-Z'-]+$/",$firstname)){
        $errors="Not a valid name name use only A-Z and a-z";
        return false;
    }
    $VALUES['firstname']=$firstname;
    
    //=========LAST NAME
    if( !isset($_POST['lastname']) || empty($_POST['lastname'])) {
        $errors="Last Name not provided";
        return false;
    }
    $lastname=$_POST['lastname'];
    if(!preg_match("/^[a-zA-Z'-]+$/",$lastname)) {
      $errors="Not a valid last name use only A-Z and a-z";
      return false;
  }
        
    $VALUES['Lastname']=$lastname;
    
    
    //======CONTACT
    if( !isset($_POST['contact']) || empty($_POST['contact'] ))
    {
        $errors="Contact not provided";
        return false;
    }
    $contact=$_POST['contact'];
    if(!preg_match("/^[0-9]{10}+$/",$contact) ||strlen($contact)>10 || strlen($contact)<10)
    {
            $errors = "not a valid contact number use 0-9";
            return false;
        }
    
    $VALUES['contact']=$contact;
    
    
    //========COLLEGE    
    if(!isset($_POST['college'])|| empty($_POST['college']))
    {
        $errors="College not provided";
        return false;
    }
    $college=$_POST['college'];
    if(!preg_match("/^[a-zA-Z\s&'-\.]+$/",$college)) {
        $errors="college not provided";
        return false;
    }
    $VALUES['college']=$college;
    
    // country
    $VALUES['country']=$_POST['country'];
  
    //========EMAIL    
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors = "Invalid format and please re-enter valid email"; 
        return false;
    }
    if($USER->exists($email)) {
        $error="user already exists";
        return false;
    }
    
    $VALUES['email']=$email;    
    
    if($_POST['password'] != $_POST['verifypassword'])
    {
        $errors="password not matching";
        return false;
        
    }
    $password=$_POST['password'];
    
    $VALUES['password']=$USER->hash_pass($password);
    
    return true;
}


if(isset($_POST['submit']) && $_POST['submit']=="REGISTER" && check()){
//   $_POST['submit']=="REGISTRATION" && checkVals()){
    global $DB;
    global $USER;
    global $VALUES;
    global $error;

  
    //dump($VALUES);
    //die();
    //$uid = $DB->insert('users',$VALUES);
    if( $USER->register($VALUES) ) {
        $USER->send_mail($VALUES['email']);
        redirect("/email-sent");
    }
    else {
        $error="Registration unsuccessful. Try later.";
    }
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

        <script>
            function checkuser() {
                var email_input = document.querySelector('#email'),
                    email = email_input.value;

                if (email == "")
                    return;

                var xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXobject("microsoft.XMLHTTP");

                xmlhttp.onreadystatechange = function () {
                    //on success
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        var json = xmlhttp.responseText;
                        var response = JSON.parse(json);

                        //console.log(response);

                        if (response["exist"]) {
                            //exists
                            email_input.parentElement.classList.add("input-error");
                        } else {
                            //doesnt exists
                            email_input.parentElement.classList.remove("input-error");
                        }
                    }
                }

                var url = "<?=$GLOBALS['site.root']?>/user";
                //console.log(url);

                xmlhttp.open("POST", url, true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var params = "email=" + email;
                xmlhttp.send(params);

                //                $.ajax({
                //                    method:'post',
                //                    url:asfasf,
                //                    params:[],
                //                    onsucces: function() {
                //                        
                //                    }
                //                })


            }
        </script>
    </head>

    <style>
        select.input-lg {
            border: none;
            height: 48px;
            width: 291px;
            line-height: 46px;
            color: darkgrey;
        }
        
          select:valid {
            color: black;
        }
        
        option {
            color: black;
        }
        .input-style {
            border: 0px;
            border-bottom: 2px dashed #ffc75e;
        }
        
        .input-error {
            border-bottom: 2px dashed crimson;
        }
        
        .wrapper {
            overflow: hidden;
        }
        
        .formcenter {
            margin: 100px auto;
            width: 700px;
        }
        
        textarea:focus,
        input:focus {
            outline: none;
        }
        
        input:not([type="submit"]) {
            border: none;
        }
        
        select:focus,
        input:focus {
            outline: none;
        }
        
        .input-icon {
            display: inline-block;
            text-align: center;
            width: 40px;
            font-size: 14pt;
            color: #cecece;
        }
        
        .error {
            color: crimson;
            /* font-size: 10pt; */
            font-family: Montserrat;
            text-align: center;
            margin-top: 30px;
        }
    </style>

    <body>
        <div class="container-fluid">
            <div class="row banner-heading" id="sponsor-heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="overlay-heading">REGISTRATION</p>
                </div>
            </div>

            <div class="row">
                <form class="form-signin" action="<?=$_SERVER['REQUEST_URI']?>" method="post" onsubmit="return validateForm()" name="reg_form" role="form">
                    <div class="form-content formcenter">
                        <div class='wrapper'>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                                        <input class="input-lg" type="text" name="firstname" placeholder="First Name" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                                        <input class="input-lg" type="text" name="lastname" placeholder="Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                                        <input class="input-lg" type="text" name="contact" placeholder="Contact" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-university"></i>
                        </span>
                                        <input class="input-lg" type="text" name="college" placeholder="College" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-flag"></i>
                        </span>
                                        <select class="input-lg" name="country" required>
                                            <option value="" disabled selected hidden >Country</option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote D'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                            <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style">
                                        <span class="input-icon">
                    <i class="fa fa-envelope"></i>
                </span>
                                        <input class="input-lg" type="email" name="email" id="email" onblur="checkuser()" placeholder="Email" />
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style ">
                                        <span class="input-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                                        <input class="input-lg" type="password" name="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="input-style">
                                        <span class="input-icon">
                    <i class="fa fa-lock"></i>
                </span>
                                        <input class="input-lg" type="password" name="verifypassword" placeholder="Verify Password" />
                                    </div>
                                </div>
                            </div>
                            <div class="error">
                                <?php
                                    global $errors;
                                    echo $errors;
                                ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" style="bottom:46px;" class="btn2 btn2-dark overlay-btn overlay-wrapper " value="REGISTER" />
                </form>
            </div>
        </div>

        <script>
            function validateForm() {
                var error = document.querySelector(".error");

                // FIRSTNAME
                var firstname = document.reg_form.firstname.value;
                if (firstname == "") {
                    error.innerHTML = "Please Enter a first name.";
                    return false;
                }
                validation = /^[a-zA-Z'-]+$/;
                if (!validation.test(firstname)) {
                    error.innerHTML = "Use only alphabets in fisrt name";
                    return false;
                }

                //LASTNAME
                var lastname = document.reg_form.lastname.value;
                if (lastname == "") {
                    error.innerHTML = "Please Enter a Last name";
                    return false;
                }
                validation = /^[a-zA-Z'-]+$/;
                if (!validation.test(lastname)) {
                    error.innerHTML = "Use only alphabets in last name";
                    return false;
                }

                //CONTACT
                var contact = document.reg_form.contact.value;
                if (contact == "") {
                    error.innerHTML = "PLease Enter a Contact Number";
                    return false;
                }
                pnoval = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
                var contact = document.reg_form.contact.value;
                if (!pnoval.test(contact)) {
                    error.innerHTML = "Enter a valid Contact No";
                    document.reg_form.contact.value = "";
                    return false;
                }
                
                //COLLEGE
                
                 var college = document.reg_form.college.value;
                if (college == "") {
                    error.innerHTML = "PLease Enter a College Name";
                    return false;
                }
                var clg = document.reg_form.college.value;
                clgname = /^[a-zA-z\s&'\.]+$/;
                if (!clgname.test(clg)) {
                    error.innerHTML = " Enter a valid College Name";
                    return false;
                }
                
                //EMAIL
                var email = document.reg_form.email.value;
                if (email == "") {
                    error.innerHTML = "Please Enter a Email";
                    return false;
                }
                
                //PASSWORD
                 var password = document.reg_form.password.value;
                if (password == "") {
                    error.innerHTML = "PLease Enter a Password";
                    return false;
                }
                
                //VERIFYPASSWORD
                var verifypassword = document.reg_form.verifypassword.value;
                if (verifypasswordpassword == "") {
                    error.innerHTML = "PLease Enter a VerifyPassword";
                    return false;
                }
                
                //PASSWORD MATCH
                var pass = document.reg_form.password.value;
                var cpass = document.reg_form.verifypassword.value;
                if (pass != cpass) {
                    error.innerHTML = "The password doesn't match";
                    return false;
                }

                



                return true;
            }
        </script>

    </body>

    </html>