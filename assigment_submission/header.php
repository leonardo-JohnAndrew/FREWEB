<?php
session_start();
include_once('./database.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Assignment Submission Portal</title>
</head>

<style>
    body {
        background-color: #171414;
        padding: 0%;
        margin: 0%;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        position: relative;
    }

    .header {
        position: absolute;
        top: 0;
        width: 100%;
        display: flex;
        background-color: #1b2d7c;


    }

    .title {
        padding: 5px;
        width: 500px;
        padding-left: 10px;
    }


    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: goldenrod;
        color: white;
        padding: 10px;
        width: 100%;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: ease-in-out background-color .5s;
    }

    input[type="submit"]:hover {
        background-color: #000;
        color: #ccc;
        outline: 2px white solid;
    }

    h3 {
        color: goldenrod;
    }

    form {
        padding: 0;
        margin: 0;
    }

    .button-logout {
        position: absolute;
        right: 20px;
        margin-top: 20px;
    }
</style>
<div class="header">
    <div class="title">
        <h3> Assignment Submission : Hello <?= isset($_SESSION['name']) ? $_SESSION['name'] : "No Account Login " ?>
        </h3>
    </div>
    <form action="action.php" method="POST">
        <div class="button-logout">
            <input type="submit" value="logout" name="logout">
        </div>
    </form>
</div>

</html>