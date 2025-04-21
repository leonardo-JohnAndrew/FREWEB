<?php
session_start();
//aFTER login create session stored Id and stored permission 
//stored theme setting in cookies
//raw data
$data = [
    "data1" => [
        "studID" => 'STUDENT-CCS-0001-2024',
        "name" => "Andrew",
        "course" => [
            "Introduction to Programming",
            "Introduction to Computing",
            "Physics",
            "Ethics",
            "Data Structure"
        ]
    ]
];

//sessios 
if (!isset($_SESSION['course'])) $_SESSION['course'] = [];  // course/subjects 
if (!isset($_SESSION['permission'])) $_SESSION['permission'] = false;  // authorizations 
if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = ""; // student id  
if (!isset($_SESSION['name'])) $_SESSION['name'] = ""; // student id  
if (!isset($_SESSION['success'])) $_SESSION['success'] = ""; // success message
if (!isset($_SESSION['error'])) $_SESSION['error'] = ""; //errror message

if (isset($_POST['login'])) {
    /// condition 
    foreach ($data as $user) {
        // searching
        if ($_POST['name'] === $user['name']) {
            // insert/update  sessions 
            $_SESSION['permission'] = true;
            $_SESSION['user_id'] = $user['studID'];
            $_SESSION['course'] = $user['course'];
            $_SESSION['name'] = $user['name'];
            // set  cookies
            $cookie_value = $_POST['theme'];
            setcookie('theme', $cookie_value, time() + (7 * 24 * 60 * 60), "/");
            header('location: dashboard.php');
        } else {
            $_SESSION['permission'] = false;
            $_SESSION['error'] =  "Wrong name Input Try Again ";
            header("locations:" . $_SERVER['PHP_SELF']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .main {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 350px;
    }



    .title h3 {
        margin: 0 0 10px;
        text-align: center;
        font-size: 24px;
        background-color: gray;
        padding: 10px;
    }

    .title span {
        color: red;
        font-size: 14px;
        display: block;
        text-align: center;
        margin-bottom: 20px;
    }

    .inputs label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .inputs input[type="text"],
    .inputs select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    .inputs input[type="submit"] {
        width: 100%;
        background-color: gray;
        color: black;
        padding: 10px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    .inputs input[type="submit"]:hover {
        background-color: rgb(12, 12, 12);
        color: white;
    }
</style>


<body>
    <div class="main">
        <div class="title">
            <h3>Student-Dashboard</h3>
            <span class="<?php if (isset($_SESSION['error'])) {
                                echo "error";
                            } ?>"><?php echo isset($_SESSION['error']) ? $_SESSION['error'] : "" ?></span>
        </div>
        <form action="" method="post">
            <div class="inputs">
                <label>Name: </label>
                <input type="text" name="name">
                <br>
                <label>Theme</label>
                <select name="theme" value="" id="">
                    <option value="Light">Light</option>
                    <option value="Dark">Dark</option>
                </select>
                <br>
                <input type="submit" value="Login" name="login">
            </div>
        </form>
    </div>
</body>
<?php
?>

</html>