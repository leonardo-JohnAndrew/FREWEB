<?php
session_start();
include_once('./database.php');
if (!isset($_SESSION['notification'])) $_SESSION['notification'] = "";  // notif
if (!isset($_SESSION['error-message'])) $_SESSION['error-message'] = "";
// error 

//if may cookie na name mag auto login 
if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
    //login 
    $database = new crud();
    $login = $database->login($name);
    if ($login['status'] == 'Failed') {
        // set error cookie name account not exist
        $_SESSION['error'] = $login['error'];
        $_SESSION['permission'] = false;
    } elseif ($login['status'] == 'Success') {
        // set permission to true
        $_SESSION['permission'] = true;
        $_SESSION['name'] = $name;
    }
} elseif (!isset($_SESSION['permission']) || $_SESSION['permission'] != true) {
    //back to login if false 
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        margin: 0;
        padding: 0;
        background: #ebebe0;
    }

    a {
        text-decoration: none;
        color: lightgoldenrodyellow
    }

    label {
        color: rgb(241, 80, 0);
        font-size: large;
        font-weight: 500;
    }

    input {
        margin: 0 5px 0 5px;
        border-radius: 5px 5px 5px 5px;
        border: 2px inset;

    }

    input:focus {
        border: 1px inset;
        outline: none;
    }


    .header {
        background: rgb(241, 80, 0);
        background: linear-gradient(0deg, rgb(243, 110, 44) 0%, rgb(255, 197, 72) 100%);
        padding: 10px;
        display: flex;

        h3 {
            margin: 0;

        }
    }

    .title {
        padding-left: 3px;
        padding-right: 3px;
        color: lightgoldenrodyellow;

    }

    .tab {
        display: flex;
        flex-direction: row;
        flex-grow: 3;
        justify-content: center;

        .tab-page {
            margin-left: 20px;
            padding: 0 10px 0px 10px;
            justify-self: center;
        }
    }

    #dashboard:hover {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }

    }

    #add:hover {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }

    }

    #view:hover {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }
    }

    .logout {
        padding: 0 10px 0px 10px;
    }

    .logout:hover {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }
    }

    .forget {
        padding: 0 10px 0px 10px;
    }

    .forget:hover {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {

            color: rgb(241, 80, 0);
        }
    }

    .main {
        display: grid;
        grid-template-columns: 200px 1fr 200px;
        grid-template-rows: auto auto;

        .title {
            color: rgb(241, 80, 0);
            margin-left: 20px;
            grid-column: 2/3;
            place-self: center;
        }

        h1 {
            margin-left: 30px;
        }

        .content {
            padding: 20px;
            border-radius: 10px 10px 10px 10px;
            border: solid darkgray 2px;
            margin-top: 25px;
            height: auto;
            grid-row: 2/3;
            grid-column: 2/3;
            position: relative;


            input[type='file']::file-selector-button {
                background-color: rgb(241, 80, 0);
                color: lightgoldenrodyellow;
                transition: all .5 ease-in-out;
            }

            input[type='file']::file-selector-button:hover {
                background-color: lightgoldenrodyellow;
                border: 2px orange solid;
                color: rgb(241, 80, 0);
            }

            .resume {
                width: 180px;
                color: rgb(241, 80, 0);

            }

            .age {
                width: 70px;
            }

            .submit {
                position: absolute;
                right: 20px;
                background-color: rgb(241, 80, 0);
                color: lightgoldenrodyellow;
                transition: all .5 ease-in-out;
                padding: 3px 9px 3px 9px;

            }

            .submit:hover {
                background-color: lightgoldenrodyellow;
                border: 1px orange solid;
                color: rgb(241, 80, 0);
            }
        }

        .notif-success {

            h4 {
                display: inline;
                margin-left: 40px;
            }


        }

        .notif-error {

            h4 {
                color: red;
                display: inline;
            }


        }
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Portal</title>
</head>
<div class="header">
    <div class="title">
        <h3>Student Portal</h3>
    </div>
    <div class="tab">
        <div class="tab-page" id="dashboard">
            <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="tab-page" id="add">
            <a href="add.php">Add Record</a>
        </div>
        <div class="tab-page" id="view">
            <a href="view.php">View Records</a>
        </div>
    </div>
    <div class="forget">
        <a href="action.php?forget=forget">Forget</a>
    </div>
    <div class="logout">
        <a href="action.php?logout=logout">Log out</a>
    </div>
</div>