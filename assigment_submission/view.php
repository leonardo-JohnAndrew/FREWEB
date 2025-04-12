<?php
include_once('./header.php');
include_once('./database.php');
$db = new database('assignmentdb');
$conn = $db->connection();
$assignments = $db->fetchAssignments($conn);
if (!isset($_SESSION['permission'])) {
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['role']) && $_SESSION['role'] === 'student') {
    header('Location: form.php');
    exit;
}


?>
<style>
    .form {
        background-color: #1b2d7c;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(158, 174, 230, 0.23);
        height: 500px;
        margin-top: 100px;
    }

    .content {
        height: 400px;
        overflow-y: scroll;
    }

    h2 {
        color: goldenrod;
        text-align: center;
        margin-bottom: 20px;
    }

    th {
        color: goldenrod;
        margin-bottom: 30px;
    }

    td {
        border-bottom: goldenrod solid 1px;
        color: lightblue;
    }

    td:hover {
        background-color: #D6EEEE;
    }

    a {
        color: yellow;
    }
</style>

<body>
    <div class="form">
        <h2>All Assignments</h2>
        <div class="content">
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>Filename</th>
                    <th>Submission Date</th>
                    <th>Download</th>
                </tr>
                <?php
                if (!empty($assignments)) {
                    foreach ($assignments as $assignment) {
                        echo "<tr>
                <td>{$assignment['student_name']}</td>
                <td>{$assignment['subject']}</td>
                <td>{$assignment['file_name']}</td>
                <td>{$assignment['timestamp']}</td>
                <td><a href='uploads/{$assignment['file_name']}' download>Download</a></td>
                      </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No assignments found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>