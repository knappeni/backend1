<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Sign Up</h1>
    <?php include 'navbar.php'?>
<article>
<form action="epost.php" method="get">
Epost: <input type="text" name="epost"><br>
Användarnamn: <input type="text" name="anvandare"><br>
<input type="submit" name="skicka" value="Registrera">
</form>

</article>
<?php
if(isset($_GET["skicka"])){
    $epost = $_GET["epost"];
    $anvandare = $_GET["anvandare"];
    $tecken = range("a","z");
    $storatecken = range("A","Z");
    $siffror = range(0,9);
    $special = array("!","@","?","{","}","#","%","&","(",")","/");
    $teckenochsiffror = array_merge($tecken,$siffror,$storatecken,$special);
    $losenord = "";
    for($i = 0; $i <= 16; $i++){
        $losenord = $losenord . $teckenochsiffror[rand(0,count($teckenochsiffror))];

    }
    
    if (filter_var($epost, FILTER_VALIDATE_EMAIL)){
        echo("<p>".$epost. " är en giltig e-postadress</p>");
        $subject = "Välkommen";
        $message = "Tack för att du registrerat dig! " .$losenord. " är ditt lösenord";
        mail($epost,$subject, $message);

    }
else {echo("<p>".$epost. " är inte en giltig e-postadress</p>");
}

}else echo("<p>Fyll i Registreringsformuläret</p>");
 

   
?>
</body>
</html>
