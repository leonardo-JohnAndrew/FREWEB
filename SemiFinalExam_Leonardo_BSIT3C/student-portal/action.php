<?php
session_start();
include('./database.php');
// close notification
if (isset($_GET['delete'])) {
    //
    $db = new crud();
    //delete
    $db->remove($_GET['id']);
    //locate 
    header('location: view.php');
    exit;
}
if (isset($_GET['forget'])) {
    // clear cookie
    setcookie("name", "", time() - 3600, '/');

    // header('location: dashboard.php');
}
if (isset($_GET['logout'])) {
    // destroy session 
    session_destroy();
    session_unset();
    header('location: login.php');
}
