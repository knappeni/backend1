<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Intressant Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Datum</h1>
    <?php include 'navbar.php'?>
<?php

    echo ("<p>Uppgift 1</p>");
    echo ("Script owner: " . get_current_user());
    $manadarray = ["Januari","Februari", "Mars", "April", "Maj","Juni","Juli","Augusti","September","Oktober","November","December"];
    $dagarray = ["Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag"];
    $serverport = $_SERVER["SERVER_PORT"];
    echo("<p>Din IP adress är: ".$_SERVER["REMOTE_ADDR"]."</p>");
    echo("<p>Servern heter: ".$_SERVER["SERVER_NAME"]."</p>");
    echo ("<p>Server porten är nr: " . $serverport . "</p>");
    echo("<p>Serverns IP adress är: ".$_SERVER["SERVER_ADDR"]."</p>");
    echo("<p>Apache och PHP version på servern: ".apache_get_version()." PHP: ".phpversion()." (<-- this is sad *Sadface*) </p>");

    
    echo ("<p>Uppgift 2</p>");
    date_default_timezone_set('Europe/Helsinki');
    $tid = strftime($dagarray[date(w)]." %d ".$manadarray[(date(m)-1)]. " %Y Veckonummer: %V Kl: %T");
    echo ("<p>Tiden när du öppnade denna sida: " . $tid ."</p>");
    echo("<p>Samma tid i ett simplare format: ".date("H:i:s j.n.Y")."</p>");
    
   
?>
</body>
</html>
