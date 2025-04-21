<?php
// change theme , logout and forget theme 
if (isset($_POST['change_theme'])) {
    header('location: setting.php');
    exit;
}
if (isset($_POST['forgot_theme'])) {
    //dlete cookie
    setcookie("theme", "", time() - 3600, '/');
    header('location: dashboard.php');
}
if (isset($_POST['logout'])) {
    // destroy session 
    session_unset();
    session_destroy();
    //login page
    header('location:login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<footer>
    <form action="" method="post">
        <input type="submit" value="Change Theme" name="change_theme">
        <input type="submit" value="Forgot Theme" name="forgot_theme">
        <input type="submit" value="Logout" name="logout">
    </form>
</footer>

</html>