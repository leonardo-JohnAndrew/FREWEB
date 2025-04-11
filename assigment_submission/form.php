<?php
include_once('./header.php');
?>
<!DOCTYPE html>
<html>

<head>

    <style>
        form {

            background-color: #1b2d7c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(158, 174, 230, 0.23);
            width: 700px;
        }

        h2 {
            color: goldenrod;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            color: goldenrod;
            font-weight: bold;
        }

        input[type="text"]:focus {
            outline: none;
            box-shadow: #d4a017 2px 2px 4px;
        }
    </style>
</head>

<body>
    <form action="action.php" method="POST" enctype="multipart/form-data">
        <h2>Submit Your Assignment</h2>

        <label>Student Name:</label><br>
        <input type="text" name="student_name" required><br>

        <label>Subject:</label><br>
        <input type="text" name="subject" required><br>

        <label>Choose File:</label><br>
        <input type="file" name="file" accept=".pdf,.docx,.jpg,.jpeg,.png,.gif,.txt" required><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>