<?php
// Start the session
session_start();

setcookie('logged_in', 'false', time()-10000, '/'); // Expires in 1 hour

// Destroy the session.
if (session_destroy()) {
    
    // redirect to the login page
    header("Location: index.php");
    exit;
}
?>
