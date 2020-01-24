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
    <?php   include 'navbar.php';
            include 'handyfunctions.php'?>
<section>
<h3>Uppgift 8</h3>
<p>Besökräknaren. Loggar totalt antal besök och tidpunkter för besök i en fil på servern</p>

<?php
date_default_timezone_set('Europe/Helsinki');
$ip = $_SERVER["REMOTE_ADDR"];
//från och med PHP 7 är det här sättet hur man inte får en varning för $_SERVER['REMOTE_HOST']
$user = $_SERVER['REMOTE_HOST'] ?? gethostbyaddr( $_SERVER["REMOTE_ADDR"]);
$time = date("H:i:s j.n.Y");
$logString = "user: ".$user." | ip: ".$ip." | time: ".$time."\n";
echo("<p>Strängen som skapades: ".$logString."</p>");
$myfile = fopen("besok.log","a+") or die("Filen gick inte att öppna");
fwrite($myfile, $logString);
fclose($myfile);
$filestring = "besok.log";
print("<p>Totala antalet besök på sidan: ".count_lines($filestring)."</p>");

echo ("<h3>Uppgift 9</h3>");
?>

<form action="logg.php" method="get">
Namn: <input type="text" name="guestNamn"><br>
Epost: <input type="text" name="guestEpost"><br>
Kommentar: <input type="text" name="guestKommentar"><br>
<input type="submit" name="send" value="Skicka">
<input type="submit" name="getcomments" value="Visa kommentarer">
</form>
<?php
if(isset($_GET["send"])){
    $guest_name = test_input($_GET["guestNamn"]);
    $guest_email = test_input($_GET["guestEpost"]);
    $guest_comment = test_input($_GET["guestKommentar"]);
    if ($guest_name != "" and $guest_email !="" and $guest_comment !=""){
        if (filter_var($guest_email, FILTER_VALIDATE_EMAIL)){
            $guestString = "Timestamp: ".$time." |  Name: ".$guest_name." | Email: ".$guest_email." | Comment: ".$guest_comment."\n";
            $my_file = fopen("guestbook.log","a+") or die("Filen gick inte att öppna");
            fwrite($my_file, $guestString);
            fclose($my_file);
            echo "Din kommentar har tagits emot";
        } else echo "Eposten är inte giltig";
    } else echo "Du måste fylla i alla fält";
}
if(isset($_GET["getcomments"])){
    $my_file = "guestbook.log";
    print("<p>Comments in the guestbook: ".show_guestbook($my_file)."</p>");
}
?>
</section>
</body>
</html>
