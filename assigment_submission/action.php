

<?php
function location($location)
{
    header("location: $location");
    exit;
}
session_start();
include_once('./database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // create obj 

        $db = new database('accounts');
        $data = [
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];

        $result = $db->login($data);
        if ($result['login'] == false) {
            $_SESSION['error'] = $result['message'];
            location('login.php');
        } else {
            unset($_SESSION['error']);
            $_SESSION['permission'] = $result['login'];
            foreach ($result['result'] as $rs) {
                $_SESSION['role'] = $rs['role'];
                $_SESSION['stud_id'] = $rs['id'];
                $_SESSION['name'] = $rs['firstname'];
            }

            if ($_SESSION['role'] == 'student') {
                location("form.php");
            } elseif ($_SESSION['role'] == 'teacher') {
                location('view.php');
            }
        }
    }
    if (isset($_POST['submit'])) {
        $file = $_FILES['file']['name'];
        $maxFileSize = 10 * 1024 * 1024;  // 10MB max size
        if ($_FILES["file"]["size"] > $maxFileSize) {
            $_SESSION['upload_error'] = "File is too large. Max file size is 10MB.";
            location('form.php');
        }
        if (empty($file)) {
            $SESSION['upload_error'] = "No file uploaded.";
            location('form.php');
        } else {
            $db = new database('assignmentdb');
            $data = [
                'student_name' => $_POST['student_name'],
                'subject' => $_POST['subject'],
                'stud_id' => $_SESSION['stud_id']

            ];

            $result = $db->UploadandSave($data);

            if ($result['type'] == "ERROR") {
                $_SESSION['upload_error'] = $result['message'];
            } elseif ($result['type'] == "SUCCESS") {
                unset($_SESSION['upload_error']);
                $_SESSION['upload_success'] = $result['message'];
            }
            location('form.php');
        }
    }
    if (isset($_POST['register'])) {
        //
        $db = new database('accounts');

        //data
        $data = [
            "role" => $_POST['role'] ? $_POST['role'] : "student",
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "middle" => $_POST['middle'],
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ];

        $result = $db->register($data);
        if ($result['type'] == "ERROR") {
            $_SESSION['register_error'] = $result['message'];
        } elseif ($result['type'] == "SUCCESS") {
            unset($_SESSION['register_error']);
            $_SESSION['register_success'] = $result['message'];
        }
        location('register.php');
    }
    if (isset($_POST['logout'])) {
        session_destroy();
        location('login.php');
    }
}
?>