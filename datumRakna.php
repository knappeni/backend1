<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Här görs uträkningar</h1>
    <?php include 'navbar.php'?>
    <h3>Uppgift 3</h3>

<?php
include('handyfunctions.php');
date_default_timezone_set('Europe/Helsinki');

#Skriver ut när inmatade datumet är
#Kollar också att du bara matar in siffror

$dag = test_input($_GET["dag"]);
$manad = test_input($_GET["manad"]);
$ar = test_input($_GET["ar"]);
if((is_numeric($dag)) and (is_numeric($manad)) and (is_numeric($ar))){
    $maxDag = cal_days_in_month(CAL_GREGORIAN, $manad, $ar);
    if(($dag <= $maxDag) and ($dag > 0)){
        echo "<p> Inmatade datumet är: ".$dag. ".".$manad.".".$ar."</p>";
        echo("<p>Dagen ser ut att vara möjlig</p>");
        $tidnu = time();
        $giventid = mktime(0,0,0,$manad,$dag,$ar);
        echo("<p></p>Det är ".$tidnu." sekunder sedan 1 Januari 1970</p>");
        echo("<p>Det är " .$giventid." sekunder till 1 Januari 1970 från det datumet du angett</p>");
        $skillnad = $giventid - $tidnu;
        echo("<p>Det är ".$skillnad. " sekunder till angivna datumet</p>");
        $dygn = $skillnad/(24*60*60);
        $rest = $skillnad%(24*60*60);
        $timmar = $rest/3600;
        echo("<p>Det är ".floor($dygn)." dagar och ".floor($timmar). " timmar till det inmatade datumet</p>");
        if($dygn > 0){
            echo("<p>Datumet du har angett är i framtiden</p>");

        }
        else echo("<p>Datumet du har anget är i det förflutna</p>");
    }
    else echo("<p>Datumet du matat är inte giltigt</p>");
}
else echo("<p>Du måste mata in siffror...</p>")

?>
</body>
</html>
