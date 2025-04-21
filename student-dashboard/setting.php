<?php
// setting page
include_once('./header.php');
if (isset($_POST['change_theme'])) {
    //update the cookie theme color 
    $cookie_value = $_POST['theme'];
    setcookie('theme', $cookie_value, time() + (7 * 24 * 60 * 60), "/");
    // reload or refresh 
    header('location:' . $_SERVER['PHP_SELF']);
}

?>
<!DOCTYPE html>
<html lang="en">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        transition: background-color 0.3s, color 0.3s;
    }

    .main {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .title h3 {
        margin-bottom: 20px;
        text-align: center;
    }

    .content {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 10px;
    }

    select,
    input[type="submit"] {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .link a {
        text-decoration: none;
        color: #007bff;
        text-align: center;
        display: block;
        margin-top: 20px;
    }

    /* ===== LIGHT THEME ===== */
    body.light-theme {
        background-color: #f9f9f9;
        color: #333;
    }

    body.light-theme .main {
        background-color: #ffffff;
    }

    body.light-theme select,
    body.light-theme input[type="submit"] {
        background-color: #ffffff;
        color: #333;
    }

    /* ===== DARK THEME ===== */
    body.dark-theme {
        background-color: #1e1e1e;
        color: #e0e0e0;
    }

    body.dark-theme .main {
        background-color: #2c2c2c;
    }

    body.dark-theme select,
    body.dark-theme input[type="submit"] {
        background-color: #3a3a3a;
        color: #fff;
        border: 1px solid #555;
    }

    body.dark-theme .link a {
        color: #4dabf7;
    }
</style>

</style>

<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'Dark' ? 'dark-theme' : 'light-theme'; ?>">
    <div class="main">

        <div class="title">
            <h3>Change Theme</h3>
        </div>
        <div class="content">
            <form action="" method="post">

                <label>Select Theme</label>
                <select name="theme" value="" id="">
                    <option value="<?php
                                    if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'Dark') {
                                        $theme1 = "Dark";
                                    } else {
                                        $theme1 = "Light";
                                    }
                                    echo $theme1;
                                    ?>"><?= $theme1 ?></option>
                    <option value="<?php
                                    if ($theme1 == "Light") {
                                        $theme2 = "Dark";
                                    } else {
                                        $theme2 = "Light";
                                    }
                                    echo $theme2
                                    ?>"><?= $theme2 ?></option>
                </select>
                <input type="submit" value="Update Theme" name="change_theme">
            </form>

            <div class="link">
                <a href="dashboard.php">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>

</html>