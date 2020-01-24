<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Sessioner</h1>
    <?php include 'navbar.php'?>
<article>
<form action="session.php" method="get">
Användarnamn: <input type="text" name="anv">(tips: pepe)<br>
Lösenord:  <input type="password" name="losen">(tips: feelsbadman)<br>
<input type="submit" name="login" value="Logga In">
</form>

</article>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if(!isset($_SESSION['anvandare'])){
        if(isset($_GET["login"])){
            $anv = test_input($_GET["anv"]);
            $losen = test_input($_GET["losen"]);
            if (($anv == "pepe") && ($losen == "feelsbadman")){
                $_SESSION["anvandare"] = $anv;
                print("<p> Du har nu tillgång till <a href='session2.php'>DARK WEB</a></p>");
            
            }else{echo("<p>Fel användarnamn eller lösenord</p>");}
}}else{ print("<p>Du är inloggad som: ".$_SESSION['anvandare']."<br>Du har nu tillgång till <a href='session2.php'>DARK WEB</a></p>");}
   
?>
</body>
</html>
