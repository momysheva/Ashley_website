<?php
session_start(); // Starting session for storing some info until the browser is not closed. Data will be lost once the browser is closed. 
$_SESSION = array();//declared a session array
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,//remove all session data of the current user
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}//This will destroy the session, and not just the session data
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:index.php");//returns to the main page
?>

