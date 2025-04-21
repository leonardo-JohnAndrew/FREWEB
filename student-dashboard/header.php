<?php
session_start();
// authorization
if (isset($_SESSION['permission']) && $_SESSION['permission'] == false) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        transition: background-color 0.3s, color 0.3s;
    }

    header {
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    header h3 {
        margin: 0;
        font-size: 24px;
    }

    header span {
        display: block;
        font-size: 14px;
        margin-top: 5px;
    }

    .content {
        padding: 20px;
    }

    .course {
        margin-top: 20px;
        padding-left: 25%;
        border-radius: 10px;
        font-weight: bold;
        white-space: pre-wrap;
    }

    footer {
        text-align: center;
        padding: 20px;
        border-top: 1px solid #ccc;
        margin-top: 40px;
    }

    footer form input[type="submit"] {
        margin: 0 10px;
        padding: 10px 20px;
        cursor: pointer;
        border: none;
        border-radius: 6px;
        font-size: 14px;
    }

    select,
    input[type="submit"] {
        margin-top: 10px;
        padding: 8px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    /* ===== LIGHT THEME ===== */
    body.light-theme {
        background-color: #f9f9f9;
        color: #333;
    }

    body.light-theme header {
        background-color: #ffffff;
        color: #222;
    }

    body.light-theme .course {
        background-color: #ffffff;
        color: #222;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    body.light-theme footer {
        background-color: #f1f1f1;
    }

    body.light-theme footer form input[type="submit"] {
        background-color: #e0e0e0;
        color: #333;
    }

    /* ===== DARK THEME ===== */
    body.dark-theme {
        background-color: #1e1e1e;
        color: #e0e0e0;
    }

    body.dark-theme header {
        background-color: #2c2c2c;
        color: #fff;
    }

    body.dark-theme .course {
        background-color: #2a2a2a;
        color: #e0e0e0;
        box-shadow: 0 2px 8px rgba(255, 255, 255, 0.05);

    }

    body.dark-theme footer {
        background-color: #1a1a1a;
    }

    body.dark-theme footer form input[type="submit"] {
        background-color: #3a3a3a;
        color: #fff;
    }
</style>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<header>
    <h3>Welcome To Student Dashboard: <span>You can view your course enrolled to you! </span></h3>
</header>

</html>