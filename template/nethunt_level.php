<?php

global $NETHUNT;
global $USER;

if(! $USER->logged_in() ) {
    redirect('/login');
}

if( $NETHUNT->get_level()!=$level ) {
    $NETHUNT->goto_level();
}

if($level > $NETHUNT->maxlevel) {
    redirect('/leaderboard');
}

$error="";
if(isset($_POST['submit']) && $_POST['submit']=="AM I RIGHT?"){
    global $error;
    
    $answer=$_POST["answer"];
    $answer=trim($answer);
    if($answer=="") {
        $error="Please enter Answer";
    }
    else if($NETHUNT->check_ans($level,$answer)){
        $NETHUNT->levelup();
        $NETHUNT->goto_level();
    }
    else {
        $error="WRONG ANSWER";
    }
}

//dump($level);
//die();

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?=$title?>
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0/css/font-awesome.min.css" />-->
        <link rel="stylesheet" type="text/css" href="../css/nethunt_level.css"/>
        
        <link async href="http://fonts.googleapis.com/css?family=Mrs%20Sheppards" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
         <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Bangers' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<!--           <link rel="stylesheet" type="text/css" href="../css/homepage.css" />-->
         
        </head>
        <style>
         .error, .message {
            color: #a10700;
             font-size: 15pt; 
            font-family: Montserrat;
            text-align: center;
            margin-top: 5px;
        }
        .message{
            color: dodgerblue;
            }
         
            
        </style>

    <body>
         <div id="container">
            <div id="header">
                <div class="net">Net Hunt</div>
              
<!--                <div class="relief">NET HUNT</div>-->
<!--                <p><a href="https://www.facebook.com/groups/264277007009318/" target="_blank"><i class="fa fa-question-circle"></i></a> - Keep Calm and Google - <a title="Leaderboard" target="_blank" href="leaderboard.php"><i class="fa fa-trophy"></i></a></p>-->
            </div>
         <div class="svg-container">
                <div class="bg">
      </div>
				
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
				  	<defs>
				  		<radialGradient id="gradBG" cx="300" cy="300" r="300" gradientUnits="userSpaceOnUse">
<!--					    	<stop  offset="0" stop-color="#FA4B00"/>-->
                            <stop  offset="0" stop-color="transparent"/>
							<stop  offset="1" stop-color="transparent"/>
					    </radialGradient>

					    <radialGradient id="gradBody" cx="300" cy="348.476" r="65.719" gradientTransform="matrix(1 0 0 1.034 0 -11.877)" gradientUnits="userSpaceOnUse">
						    <stop offset=".501" stop-color="#FFF"/>
						    <stop offset=".684" stop-color="#FCFCFC"/>
						    <stop offset=".815" stop-color="#F3F3F4"/>
						    <stop offset=".928" stop-color="#E3E5E6"/>
						    <stop offset="1" stop-color="#D5D7D9"/>
						</radialGradient>

						<radialGradient id="gradHead" cx="300.012" cy="258.826" r="91.565" gradientTransform="matrix(1 0 0 .716 0 73.539)" gradientUnits="userSpaceOnUse">
						    <stop offset=".702" stop-color="#FFF"/>
						    <stop offset=".811" stop-color="#FCFCFC"/>
						    <stop offset=".889" stop-color="#F3F3F4"/>
						    <stop offset=".957" stop-color="#E3E5E6"/>
						    <stop offset="1" stop-color="#D5D7D9"/>
						</radialGradient>
					</defs>
					<rect id="BG" fill="url(#gradBG)" width="600" height="600"/>

					<g id="panda">
					<path id="arm2" fill="#231F20" d="M312.685 361.92c12.25 45.717 34.26 43.597 60.247 36.634 25.986-6.963 46.108-16.133 33.858-61.85s-32.462-80.023-69.233-70.17c-36.77 9.853-37.122 49.67-24.872 95.386z"/>
					<path id="arm1" fill="#231F20" d="M287.34 361.92c-12.25 45.717-34.26 43.597-60.247 36.634s-46.108-16.133-33.858-61.85 32.462-80.023 69.233-70.17c36.77 9.853 37.122 49.67 24.872 95.386z"/>
					
					<path id="bodyBlack" fill="#231F20" d="M385.78 363.252c0 38.138-38.406 69.055-85.78 69.055s-85.78-30.917-85.78-69.055 38.406-108.28 85.78-108.28 85.78 70.142 85.78 108.28z"/>
					
					<path id="leg2" fill="#231F20" d="M348.62 367.74c2.277 0 29.148-11.386 66.493 2.277 6.83-6.376 18.217-8.198 16.85 4.554-1.365 12.753-6.83 50.554-21.404 55.564-14.575 5.01-89.72.91-99.285-7.742-9.565-8.653 37.345-54.652 37.345-54.652z"/>
					<path id="leg1" fill="#231F20" d="M251.38 367.74c-2.276 0-29.147-11.386-66.492 2.277-6.83-6.376-18.217-8.198-16.85 4.554 1.365 12.753 6.83 50.554 21.404 55.564s89.72.91 99.284-7.742c9.564-8.653-37.345-54.652-37.345-54.652z"/>

					<path id="bodyPanda" fill="url(#gradBody)" d="M369.05 363.93c0 30.7-30.915 55.587-69.05 55.587s-69.05-24.887-69.05-55.587 30.915-87.16 69.05-87.16 69.05 56.46 69.05 87.16z"/>
					<path id="belly" fill="#FFF" d="M356.957 348.665c0 25.323-25.5 45.852-56.957 45.852s-56.957-20.53-56.957-45.852 25.5-71.897 56.957-71.897 56.957 46.573 56.957 71.897z"/>

					
					<path id="ear2" fill="#231F20" d="M317.808 190.34c-4.9 16.237 4.68 32.876 21.395 37.163 16.717 4.288 34.24-5.4 39.138-21.633 4.9-16.235-4.68-32.874-21.395-37.16-16.718-4.29-34.24 5.397-39.137 21.63z"/>
					<path id="ear1" fill="#231F20" d="M282.196 190.34c4.9 16.237-4.68 32.876-21.395 37.163-16.716 4.288-34.238-5.4-39.137-21.633-4.898-16.235 4.68-32.874 21.396-37.16 16.717-4.29 34.238 5.397 39.136 21.63z"/>

					<path id="head2" fill="url(#gradHead)" d="M393.992 272.088c0 49.79-78.897 53.63-93.98 53.63s-93.98-3.84-93.98-53.63 36.024-90.154 93.98-90.154 93.98 40.364 93.98 90.154z"/>
					<path id="head1" fill="#FFF" d="M384.175 266.752c0 45.74-70.656 49.265-84.163 49.265-13.507 0-84.163-3.527-84.163-49.265s32.26-82.817 84.162-82.817 84.163 37.078 84.163 82.817z"/>
					
					<g id="face">
						<ellipse id="snout" fill="#D5D7D9" cx="300.012" cy="270.669" rx="29.233" ry="22.958"/>
						<path id="nose" fill="#231F20" d="M300.494 252.763c-6.2-.052-16.62 1.39-16.702 9.6-.062 7.205 11.83 12.46 16.505 12.46 4.676 0 16.64-4.82 16.712-12.15.082-8.21-10.317-9.848-16.516-9.91z"/>
						<path id="shine" fill="#FFF" d="M310.036 262.294c-4.212-3.51-14.914-3.787-19.28-.15-1.313-7.496 20.76-7.264 19.28.15z"/>
						
						<path id="mouth2" fill="#231F20" d="M312.323 282.46c6.008 0 10.986-4.902 11.868-11.3.093.665.14 1.344.14 2.036 0 7.364-5.376 13.334-12.007 13.334-6.632 0-12.007-5.97-12.007-13.334 0-.692-.06-1.372.032-2.035.883 6.4 5.967 11.3 11.975 11.3z"/>
						<path id="mouth1" fill="#231F20" d="M288.48 282.46c-6.008 0-10.986-4.902-11.868-11.3-.092.665-.14 1.344-.14 2.036 0 7.364 5.377 13.334 12.008 13.334s12.007-5.97 12.007-13.334c0-.692-.048-1.372-.14-2.035-.88 6.4-5.86 11.3-11.867 11.3z"/>
						
						<path id="black2" fill="#231F20" d="M343.256 223.487c-14.95-9.78-31.917-10.296-36.952-2.598-5.036 7.696 2.23 23.038 17.18 32.818 14.947 9.78 28.476 8.044 33.512.347 5.037-7.697 1.208-20.788-13.74-30.568z"/>
						<circle id="eye2" fill="#FFF" cx="317" cy="227.546" r="5.974"/>
						<circle id="pupil2" fill="#231F20" cx="315.69" cy="228.323" r="1.867"/>
						
						<path id="black1" fill="#231F20" d="M256.768 223.487c14.95-9.78 31.917-10.296 36.952-2.598 5.036 7.696-2.23 23.038-17.18 32.818-14.947 9.78-28.476 8.044-33.512.347-5.036-7.697-1.208-20.788 13.74-30.568z"/>
						<circle id="eye1" fill="#FFF" cx="283.025" cy="227.546" r="5.974"/>
						<circle id="pupil1" fill="#231F20" cx="284.334" cy="228.323" r="1.867"/>
					</g>
					</g>
					<g class="BTNA">
						<circle id="btnP" cx="50%" cy="85%" r="17" fill="#fff" stroke="#231F20" stroke-width="3"></circle>
						
					</g>

				</svg>
			</div>
       
               <div class="eventlevel">
                        
                            <?php
                               global $NETHUNT;
                                $level = $NETHUNT->get_level();
                                echo "LEVEL- ".$level;
                             ?>
                           
                          </div>
             <div class="queryform">
             
                          
                     <a href="https://www.facebook.com/groups/264277007009318/?__mref=message_bubble" target="_blank"> <i class="fa fa-question-circle-o"></i> HELP</a>
                
                
             </div>
               
          
            <div id="content">
                        
           
                         <div class="question">
                        <?php
                        global $NETHUNT;
                        
                        $question = $NETHUNT->get_question($level);
                       
        
                        
                        if($question['type']=="text")
                            echo $question['question'];
                        else {
                            echo "<img class='nethunt-img' src='".$question['question']."'></img>";
                        }
                    ?> </div>
                  <form method="post" class="form1" name="nethuntform" action="<?=$GLOBALS['site.root']?>/nethunt/<?=$level?>" onsubmit="return validate();">
                    <a href="<?=$GLOBALS['site.root']?>/leaderboard" class="overlay-btn overlay-wrapper">LEADER BOARD</a>
                    <input type="text" autocomplete="off" name="answer" class="input-style input-lg" value="" autofocus placeholder="Answer"/>
                    <input type="submit" name="submit" id="submit" class="btn2 btn2-dark overlay-btn overlay-wrapper" value="AM I RIGHT?"  /> </form>
                
                <div class="error">
                    <?php
                    global $error;
                    echo $error;
                    ?>
                </div>
            </div>
                
        </div>


        <script>
            //document.nethuntform.answer.focus();
            function validate() {
                var result = document.nethuntform.answer.value;
                result = result.trim();
                document.nethuntform.answer.value = result;
                var error = document.querySelector(".error");
                if (result == "") {
                    error.innerHTML = "Please enter Answer";
                    return false;
                }
                error.innerHTML = "";
                return true;
            }
        </script>
                    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>

        <script src="../js/index.js"></script>
    </body>

    </html>