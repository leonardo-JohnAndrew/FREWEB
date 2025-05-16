<?php
include('./header.php');
include('./fileHandlling.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $file = basename($_FILES['file']['name']);
    // if empty
    if (empty($file)) {
        $_SESSION['notification'] = "";
        $_SESSION['add-error'] = "No file uploaded.";
    }
    // create object 
    $database = new crud();
    $upload = new upload($file);
    //upload 
    $filename = $upload->uploadfile();
    if ($filename['status'] == "Failed") {
        // session error 
        $_SESSION['error-message']['add-error'] = $filename['error'];
    } else {

        $addRecord = $database->upload($name, $email, $age, $filename['filename']);
        if ($addRecord['status'] == 'Failed') {
            $_SESSION['error-message']['add-error'] = $addRecord['error'];
        } else {
            $_SESSION['error-message'] = [
                "add-error" => "",
                "view-error" => "",
                "delete-error" => ""
            ];
            $_SESSION['notification'] = $addRecord['message'];
        }
    }
}
?>
<style>
    #add {
        border-radius: 5px 5px 5px 5px;
        border: solid 1px lightgoldenrodyellow;
        background-color: lightgoldenrodyellow;

        a {
            border-radius: 5px 5px 5px 5px;
            color: rgb(241, 80, 0);
        }
    }
</style>
<div class="main">
    <div class="title">
        <h1>Add Record</h1>

        <div class=<?php echo ($_SESSION['error-message'] == "") ? "notif-success" : "notif-error" ?>>
            <h4>
                <?php echo ($_SESSION['error-message'] == "") ? $_SESSION['notification'] : $_SESSION['error-message']['add-error'] ?>
            </h4>

        </div>
    </div>
    <form action="" method="post" class="content" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" class="name" required>
        <label>Email</label>
        <input type="email" name="email" class="email" required>
        <label>Age</label>
        <input type="number" name="age" class="age" required>
        <label>Resume</label>
        <input type="file" name="file" accept=".pdf,.docx,.txt" class=" resume" required>


        <input type="submit" class="submit" name="submit" value="Submit">
    </form>
</div>