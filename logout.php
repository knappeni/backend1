<?php
session_start();
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();
print("<h2>Du har loggats ut</h2>");
header("refresh:3;url=session.php");
?>