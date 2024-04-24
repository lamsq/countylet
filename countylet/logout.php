<?php
// Start the session
session_start();

setcookie('logged_in', 'false', time()-10000, '/'); // Expires in 1 hour
 

$msg = "Successfully logged out";
setcookie('loggedout_msg', $msg, time()+15, '/', '', true, true);

// Destroy the session.
if (session_destroy()) {
    
    // redirect to the login page
    
    if(isset($_COOKIE["current_page"]) ){
        
    }
    header("Location: index.php");
    exit;
}
?>
