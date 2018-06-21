<?php
//  This file will redirect unauthenticated users to the login page
session_start();

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 3600)) {
    // last request was more than one hour ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['last_activity'] = time(); // update last activity time stamp

if (!isset($_SESSION['session_id'])) {
    // anonymous users are redirected to login page
    header('Location: login.php');
    die();
}