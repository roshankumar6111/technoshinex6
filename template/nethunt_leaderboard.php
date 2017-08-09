<?php


$user_answer="";
$error="";
global $USER;
global $DB;
global $NETHUNT;


//LEADERBOARD==============
$query="SELECT u.firstname, u.lastname, n.level FROM nethunt n, users u WHERE n.uid=u.uid ORDER BY n.level DESC, n.time LIMIT 30";
$result = $DB->query($query);


  
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
       
        <link rel="stylesheet" type="text/css" href="css/style.css" />
      
        <link rel="stylesheet" type="text/css" href="css/homepage.css" />
   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Bangers' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/onlineeventone.css" />
        <!-- //offline overlay -->
   
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
      
        <link rel="stylesheet" type="text/css" href="css/eventcss.css" />
      <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

          
body{
     overflow-x:hidden;              
          }
tr:nth-child(even){background-color: #f2f2f2}
          tr:nth-child(odd){background-color:white;}

th {
    background-color: rgba(234, 101, 31, 0.9);
    color: white;
}
          .leaderBoard{
              margin-top:20px;
/*              padding:0px 100px;*/
          }
</style>
    </head>
    <body>
        <div class="container-fluid">
             <div class="backbtn2"> 
            
<!--            <a href="<?=$GLOBALS['site.root']?>/nethunt/<?=$NETHUNT->get_level()?>"> <i class="fa fa-arrow-left"></i></a>-->

                 <?php 
                     global $USER;
                    if(!$USER->logged_in()){
                     echo "<a href='".$GLOBALS['site.root']."/nethunt'><i class='fa fa-arrow-left'></i></a>";
                    }
                    else{
                            echo "<a href='".$GLOBALS['site.root']."/'><i class='fa fa-arrow-left'></i></a>";
                        
                    }
                 
                 ?>

        </div>
         <div class="row banner-heading" id="member-heading">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="overlay-heading">LEADER BOARD</p>
                </div>
             </div>
    <div class="container leaderBoard">
              <table style="margin:auto; width:60%">
  <tr>
    <th align="center">Rank</th>
    <th align="center">Name</th>
    <th align="center">Current Level</th>
  </tr>
<?php
    $rank=1;
    foreach($result as $row) {?>
            <tr>
                <td ><?=$rank?></td>
                <td><?=$row["firstname"]." ".$row["lastname"]?></td>
                <td><?=$row["level"]?></td>
            </tr>
<?php
    $rank++;
    }
?>
</table>
            </div>
            </div>
           
            
    
    </body>
</html>
