

<?php
include_once('./database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')

    if (isset($_POST['submit'])) {
        $file = $_FILES['file']['name'];
        $maxFileSize = 60 * 1024 * 1024;  // 60MB max size
        if ($_FILES["file"]["size"] > $maxFileSize) {
            echo "File is too large. Max file size is 60MB.";
        }
        if (empty($file)) {
            echo "No file uploaded.";
        } else {
            $db = new database('assignmentdb');
            $data = [
                'student_name' => $_POST['student_name'],
                'subject' => $_POST['subject']
            ];

            $result = $db->UploadandSave($data);

            echo $result;
        }
    }
?>