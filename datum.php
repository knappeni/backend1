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
    <h1>Datum</h1>
    <?php include 'navbar.php'?>
<article>
<form action="datumRakna.php" method="get">
Dag: <input type="text" name="dag"><br>
Månad: <input type="text" name="manad"><br>
År: <input type="text" name="ar"><br>
<input type="submit" name="skicka" value="Räkna">
</form>

</article>
</body>
</html>
