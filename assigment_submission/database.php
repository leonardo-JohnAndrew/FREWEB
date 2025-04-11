<?php
include_once('./upload.php');
class database extends upload
{

    protected $host = "localhost";
    protected $name = "root";
    protected $database = "midterm";
    protected $con = "";
    protected $pass = "";
    public $tblename = "";


    function __construct($tblename)
    {
        parent::__construct("uploads/", "");
        $this->tblename = $tblename;
    }

    public function connection()
    {
        $conn = $this->con = new mysqli($this->host, $this->name, $this->pass, $this->database);
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function fetchAssignments($conn)
    {
        $sql = "SELECT student_name, subject, file_name, timestamp FROM $this->tblename";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    public function insertcommand($data, $conn)
    {
        $student_name = $data['student_name'];
        $subject = $data['subject'];
        $file_name = $data['file_name'];
        $submission_date = $data['submission_date'];

        $sql = "INSERT INTO $this->tblename (student_name, subject, file_name, timestamp) 
                VALUES ('$student_name', '$subject', '$file_name', '$submission_date')";

        if ($conn->query($sql) === TRUE) {
            return "Data saved successfully!";
        } else {
            return "Error: " . $conn->error;
        }
    }
    public function UploadandSave($data)
    {

        $this->filename = basename($_FILES['file']['name']);
        $fileUpload = $this->uploadfile();
        if ($fileUpload['message'] == "File Uploaded") {
            $conn = $this->connection();
            $data['file_name'] = $fileUpload['filename'];
            $data['submission_date'] = date('Y-m-d H:i:s');
            $this->insertcommand($data, $conn);
            return "File uploaded and data saved successfully." . $this->filename;
        } else {
            return $fileUpload['message'];
        }
    }
}
