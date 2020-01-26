<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Filer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Filer</h1>
<?php include 'navbar.php'?>
<section>
<article>
<h3>Här kan du ladda upp filer
<form action="filer.php" method="post" enctype="multipart/form-data">
    <p>Välj en profilbild till ditt konto</p>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Ladda upp bild" name="submit">
    <p>Filen Skall vara en bild och mindre än 2MB</p>
</form>
</h3>

</article>
<?php
$katalog = "bilder/";
$target_file = $katalog . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo ("<p>Filen är en bild - " . $check["mime"] . ".</p>");
        $uploadOk = 1;
    } else {
        echo ("<p>Filen är inte en bild</p>");
        $uploadOk = 0;
    }

// Se om filen redan finns
if (file_exists($target_file)) {
    echo ("<p>Filen med det här namnet finns redan.</p>");
    $uploadOk = 0;
}
// Tillåt endast filer under 2MB
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "<p>Din fil är för stor (max 2MB)</p>";
    $uploadOk = 0;
}
// Tillåt endast vissa filtyper
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<p>Endast JPG, JPEG, PNG & GIF filer är tillåtna</p>";
    $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo ("<p>Ett fel uppstod vid uppladning av filen</p>");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo ("<p>Filen ". basename( $_FILES["fileToUpload"]["name"]). " har laddats upp.</p>");
    } else {
        echo ("<p>Ett fel uppstod vid uppladdning av filen</p>");
        }
    }
}
print("<p>I bilder katalogen finns nu bilderna: </p>");

$innehall = scandir($katalog);
?>
<div class="row"><?php
foreach ($innehall as $rad) {
   if(($rad != ".") && ($rad != "..")) {
       $i = 1;
       print("<div class='column'>
       <img src=".$katalog.$rad." alt=".$rad." onclick='openModal();currentSlide(".$i.")' style='width:100%;max-width:300px' class='hover-shadow cursor'>
       </div>");
        }
    }
?>
</div>
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
    <?php
    foreach ($innehall as $rad) {
    if(($rad != ".") && ($rad != "..")) {
       $i = 1;
       print("<div class='mySlides'>
       <div class='numbertext'>".$i."</div>
       <img src=".$katalog.$rad." style='width:100%'>
     </div>");
        }
    }
    
    ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
    <?php
        foreach ($innehall as $rad) {
            if(($rad != ".") && ($rad != "..")) {
               $i = 1;
               print("<div class='column'>
               <img class='demo cursor' src=".$katalog.$rad." style='width:100%' onclick='currentSlide(".$i.")' alt=".$rad.">
             </div>");
                }
            }
   ?>
  </div>
</div>
<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</section>
</body>
</html>