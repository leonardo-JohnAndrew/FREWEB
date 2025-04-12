<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: black;
        }

        .main {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {
            background-color: #1b2d7c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(158, 174, 230, 0.23);
            color: gold;
            width: 300px;
        }

        .form label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"],
        .form select {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .button {
            margin-top: 15px;
            text-align: center;
        }

        .button input[type="submit"] {
            background-color: goldenrod;
            color: #1b2d7c;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: ease-in-out .5s background-colot;
        }

        .button input[type="submit"]:hover {
            background-color: #000;
            color: #ccc;
            outline: 2px white solid;
        }

        button {
            background-color: goldenrod;
            color: #1b2d7c;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: ease-in-out .5s background-colot;
        }

        button:hover {
            background-color: #000;
            color: #ccc;
            outline: 2px white solid;
        }

        .success {
            color: lightblue;
            margin-bottom: 5px;

        }

        a {
            text-decoration: none;
        }

        .error {
            color: red;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="form">
            <form action="action.php" method="POST">
                <?php
                if (isset($_SESSION['register_error'])) {
                ?>
                    <div class="error">
                        <span><?= $_SESSION['register_error'] ?> </span>
                    </div>
                <?php
                } else { ?>
                    <div class="success">
                        <span><?= isset($_SESSION['register_success']) ? $_SESSION['register_success'] : "" ?> </span>
                    </div>
                <?php } ?>
                <label for="role">Choose a role:</label>
                <select name="role" id="role" required>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>

                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lastname" required>

                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" id="firstname" required>

                <label for="middle_initial">Middle Initial:</label>
                <input type="text" name="middle" id="middle_initial">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <div class="button">
                    <input type="submit" value="Register" name="register">
                    <button disabled><a href="login.php">Login</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>