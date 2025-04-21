<?php
include_once("./header.php");
//personalized greeting with their name  and then ID    
// display enrolled course coming from the session 
// change theme , logout and forget theme 
?>
<!DOCTYPE html>
<html lang="en">
<style>
    .name {
        display: inline;
    }
</style>

<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'Dark' ? 'dark-theme' : 'light-theme'; ?>">
    <div class="content">
        <h4 class="name">Hello </h4><span> <?php
                                            echo $_SESSION['name'] . " Student ID: " . $_SESSION['user_id'];
                                            ?></span>
        <h4>This is Dashboard</h4>
        <div class="header">
            <h5>Your Courses: </h5>
        </div>
        <div class="course">
            <?php
            foreach ($_SESSION['course'] as $courses) {
            ?>
                <label><?= $courses ?></label>
            <?php
            }

            ?>
        </div>
    </div>
</body>
<?php
include_once('./footer.php');
?>

</html>