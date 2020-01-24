<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cookies</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Cookies</h1>
<?php include 'navbar.php'?>
<section>
<?php
date_default_timezone_set('Europe/Helsinki');
$user_name = "anvandare";
$user_value = $_SERVER['REMOTE_HOST'] ?? gethostbyaddr( $_SERVER["REMOTE_ADDR"]);
setcookie($user_name, $user_value, time()+(86400 * 30), "/");

if(isset($_COOKIE["anvandare"])){
    print("<p>Hejsan, ".$_COOKIE["anvandare"]."</p>");
    print("<p>Du var här senast: ".$_COOKIE["lastvisit"]."</p>");
}

$visited_name = "lastvisit";
$visited_time = date("H:i:s j.n.Y");
if (!isset($_COOKIE["firstVisit"])){
    $first_visit = "firstVisit";
    $first_time = date("H:i:s j.n.Y");
    setcookie($first_visit, $first_time, time() + (10 * 365 * 24 * 60 * 60));
    echo("<p>Det här är din första gång på denna webbsida!</p>");
}
else print("<p>Du var här första gången: ".$_COOKIE["firstVisit"]."</p>");
setcookie($visited_name, $visited_time, time()+(86400 * 30), "/");

?>
</section>
</body>
</html>