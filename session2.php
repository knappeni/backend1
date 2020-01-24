<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>BE CAREFUL!!! You have entered the Dark Web</h1>
    <?php include 'navbar.php'?>
<section>

</section>
<?php
if(isset($_SESSION["anvandare"])){
    print("<h3>Välkommen till dark web</h3>");
    print("<p>Du är inloggad som ".$_SESSION["anvandare"]." här är några memes: </p>");
    print("<img src='bilder/meme1.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme2.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme3.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme4.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme5.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme6.jpg' alt='meme' width='500' height='333'>");
    print("<img src='bilder/meme7.jpg' alt='meme' width='500' height='333'>");
    

    print("<br><a href='logout.php'>CLICKA HÄR FÖR ATT LOGGA UT</a>");
}else {print("<p>Du är inte inloggad weeb</p>");
      print("<p>Vill du logga in? <a href='session.php'>Tryck Här</a> </p>");}
?>
</body>
</html>
