<?php
session_start();
include_once('./database.php');
//sessions 

if (!isset($_SESSION['name'])) $_SESSION['name'] = "";  // name
if (!isset($_SESSION['permission'])) $_SESSION['permission'] = false;  // authorizations 
if (!isset($_SESSION['success'])) $_SESSION['success'] = ""; // success message
if (!isset($_SESSION['error'])) $_SESSION['error'] = ""; //errror message

if (isset($_POST['login'])) {
    //session name 
    $_SESSION['name'] = $_POST['name'];
    //create object /create connection
    $database = new crud();
    $login = $database->login($_POST['name']);
    // check if success login 
    if ($login['status'] == 'Failed') {
        //set session error
        $_SESSION['permission'] = false;
        $_SESSION['error'] = $login['error'];
        header("locations:" . $_SERVER['PHP_SELF']);
    } elseif ($login['status'] == 'Success') {
        //setting the permission 
        $_SESSION['permission'] = true;
        if (isset($_POST['remember_me'])) {
            //if check 
            //set cookies
            $cookie_value = $_POST['name'];
            setcookie('name', $cookie_value, time() + (30 * 24 * 60 * 60), "/"); //30 days
        }

        //navigate page
        header('location: dashboard.php');
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Portal</title>
</head>
<style>
    body {
        background: #ebebe0;
        display: grid;
        grid-template-columns: 300px 1fr 300px;
        grid-row: 300px 300px;
    }

    h2 {
        color: lightgoldenrodyellow;
    }

    .main {

        grid-row: 1/2;
        grid-column: 2/3;
        margin-top: 7em;

        place-self: center;


    }

    label {
        color: rgb(241, 80, 0);
        font-size: large;
        font-weight: 500;
    }

    .main-header {
        background: rgb(241, 80, 0);
        background: linear-gradient(0deg, rgb(243, 110, 44) 0%, rgb(255, 197, 72) 100%);
        border: 5px 0 5px 0;
        padding: 10px;
    }

    .main-inputs {
        border-radius: 0px 0px 10px 10px;
        border: solid darkgray 2px;

        padding: 30px 10px 20px 10px;
    }

    .input-login {
        margin: 0 5px 0 5px;
        border-radius: 5px 5px 5px 5px;
        border: 2px inset;

    }

    .buttons {
        margin-top: 10px;

        .login {
            margin-left: 50px;
            background-color: rgb(241, 80, 0);
            color: lightgoldenrodyellow;
            border: none;
            transition: all .5 ease-in-out;
            padding: 3px 9px 3px 9px;
        }

        .login:hover {
            background-color: lightgoldenrodyellow;
            border: 1px orange solid;
            color: rgb(241, 80, 0);
        }
    }

    input[type="text"]:focus {
        border: 1px inset;
        outline: none;
    }
</style>

<body>
    <div class="main">
        <div class="main-header">
            <h2>Student Portal</h2>
            <h2>Login</h2>
            <?php
            if (isset($_SESSION['error'])) {
            ?>
                <div class="error">
                    <span><?php echo $_SESSION['error'] ?> </span>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="main-inputs">
            <form action="" method="post">
                <div class="text-fields">
                    <label>Name: </label>
                    <input type="text" class="input-login" name="name"
                        value="<?php echo  isset($_COOKIE['name']) ? $_COOKIE['name'] : ""; ?>">

                </div>
                <div class="buttons">
                    <label> Remember Me</label>
                    <input type="checkbox" name="remember_me">
                    <input type="submit" class="login" name="login" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>