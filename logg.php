<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gästbok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Gästbok</h1>
    <?php include 'navbar.php'?>
<section>
<h3>Besöksräknaren</h3>
<p>Loggar totalt antal besök och tidpunkter för besök i en fil på servern</p>
</section>
<?php
$ip = $_SERVER["REMOTE_ADDR"];
//från och med PHP 7 är det här sättet hur man inte får en varning för $_SERVER['REMOTE_HOST']
$user = $_SERVER['REMOTE_HOST'] ?? gethostbyaddr( $_SERVER["REMOTE_ADDR"]);
$time = date("H:i:s j.n.Y");
$logString = "user: ".$user." | ip: ".$ip." | time: ".$time."\n";
echo("<p>Strängen som skapades: ".$logString."</p>");
$myfile = fopen("besok.log","a+") or die("Filen gick inte att öppna");
fwrite($myfile, $logString);
fclose($myfile);

?>
</body>
</html>
