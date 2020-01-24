<?php


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function create_conn(){
$servername = "localhost";
$username = "mutkajoa";
$password ="DM8J2ZFGnG";
$dbname ="mutkajoa";
$conn = new mysqli($servername,$username,$password,$dbname);
$conn->set_charset('utf8');
      if($conn->connect_error){
        die("<p>CONNECTION FAILED: ".$conn->connect_error."</p>");
      }
      else{ 
        return $conn;
      };
    }
function count_lines($file){
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}
fclose($handle);
return $linecount;
}

function show_guestbook($guests){
$guestbook_array = array();
$comment = fopen($guests, "r");
while(!feof($comment)){
  $item = fgets($comment);
  array_unshift($guestbook_array, $item);
}
fclose($comment);
$stringBook = "<pre>".implode("\n",$guestbook_array)."</pre>";
return $stringBook;
}
?>