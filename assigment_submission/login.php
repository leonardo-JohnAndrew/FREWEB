<?php
session_start();
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
        padding: 0%;
        margin: 0%;
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        background-color: black;
    }

    form {
        padding: 0;
        margin: 0;
    }

    .main {
        margin-top: 100px;
        width: 200px;
        padding: 5em 5em 5em 5em;
        position: relative;
        grid-column: 2/3;
        background-color: #1b2d7c;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(158, 174, 230, 0.23);

    }

    label {
        margin-bottom: 3px;
    }

    .login {
        position: relative;
    }


    a {
        outline: none;
        text-decoration: none;
    }

    .buttons {
        margin-top: 20px;
        position: absolute;
        right: 40;
        display: flex;
    }

    h3 {
        color: goldenrod;
        font-size: larger;
    }

    label {
        color: goldenrod;
    }

    .error {
        color: red;
        margin-bottom: 5px;

    }

    input[type="submit"] {
        background-color: goldenrod;
        color: #1b2d7c;
        padding: 5px;
        width: 100%;
        border: none;
        margin-right: 5px;
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

    button {
        background-color: goldenrod;
        color: #1b2d7c;
        padding: 5px;
        width: 100%;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: ease-in-out background-color .5s;
    }

    button:hover {
        background-color: #000;
        color: #ccc;
        outline: 2px white solid;
    }
</style>

<body>
    <div class="main">
        <H3>Welcome Student to Assigment Submission Portal</H3>
        <div class="login">
            <?php
            if (isset($_SESSION['error'])) {
            ?>
                <div class="error">
                    <span><?= $_SESSION['error'] ?> </span>
                </div>
            <?php
            }
            ?>
            <form action="action.php" method="POST">
                <div class="inputs">
                    <label for="">Email:</label>
                    <input type="email" name="email" id=""><br>
                    <label for="">Password:</label>
                    <input type="password" name="password" id="">
                </div>
                <div class="buttons">
                    <input type="submit" value="Login" name="login">
                    <button disabled><a href="register.php">Register</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>