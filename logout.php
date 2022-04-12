<?php

session_start();

if (isset($_SESSION)) {
    // Remove all session variables.
    session_destroy();
}

// Redirect user back to the login page.
header('Location: login.php');
