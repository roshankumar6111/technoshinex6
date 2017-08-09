<?php


if( isset($_POST['submit']) && $_POST['submit']=="RESULT" ){

    global $NETHUNT;
    global $USER;
    
    if(! $USER->logged_in() ) {
       redirect('/login');
    }
    
    $NETHUNT->register();
    redirect("/nethunt/".$NETHUNT->get_level());
}


?>

<!DOCTYPE html>
    <html>

    <head>
        <title>NetHunt</title>
        <meta charset="utf-8">
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0/css/font-awesome.min.css" />
         <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Bangers' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/nethunt.css?v=1.1">
          <link rel="stylesheet" type="text/css" href="css/homepage.css" />
        <link rel="stylesheet" type="text/css" href="../css/nethunt.css?v=1.1"/>
      
    </head>

    <body>
        <div id="container">
            <div id="header">
            <div class="bg">
        </div>
                            <div class="container">
	<div class="row ">
	<svg viewBox="0 0 960 300">
    <symbol id="s-text">
		<text text-anchor="middle" x="50%" y="80%" >NET HUNT </text>
	</symbol>

	<g class = "g-ants">
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>
		<use xlink:href="#s-text" class="text-copy"></use>

		<use xlink:href="#s-text" class="text-copy"></use>
        
		<use xlink:href="#s-text" class="text-copy"></use>

	</g>
</svg>
	</div>
    
    <div class="row">

        </div>
    </div>
                <div class="instructionbox">
               
            </div>
                <div class="nethunttitle">
                 <p><a href="https://www.facebook.com/groups/264277007009318/" target="_blank"><i class="fa fa-question-circle"></i></a> - Keep Calm and Google - <a title="Leaderboard" target="_blank" href="leaderboard.php"><i class="fa fa-trophy"></i></a></p>
                    </div>
            <div id="content">
                <div class="instructions swing">
                    <div class="displayins">
                    <h2>Instructions:</h2>
                    </div>
                    <div class="displaypoint">
                    <ul>
                        <li>- All characters should be in small letters</li>
                        <li>- Numbers should be entered</li>
                        <li>- There should be no space between words</li>
                        <li>- There is no time limit</li>
                    </ul>
                    </div>
                </div>
            </div>
            <div id="material-overlay"></div>
            <div id="footer">
                <div class="play-button">
                    <i class="fa fa-play"></i>
                </div>
            </div>
              <form id="submit_form" name="submit_form" method="post" action="<?=$GLOBALS['site.root']?>/nethunt/1">
                <input type="submit" name="submit" id="submit" class="btn2 btn2-dark overlay-btn overlay-wrapper " value="Play" />
            </form>
        </div>
        </div>
        <script src="../js/nethunt/nethunt.js"></script>
    </body>

    </html>