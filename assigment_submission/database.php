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
        $student_name =  mysqli_escape_string($conn, $data['student_name']);
        $subject =  mysqli_escape_string($conn, $data['subject']);
        $file_name = mysqli_escape_string($conn, $data['file_name']);
        $stud_id = intval($data['stud_id']);
        $submission_date = $data['submission_date'];

        $sql = "INSERT INTO $this->tblename (student_name, subject, file_name, timestamp, stud_id) 
                VALUES ('$student_name', '$subject', '$file_name','$submission_date',$stud_id)";

        if ($conn->query($sql) === TRUE) {
            return [
                "type" => "SUCCESS",
                "message" => "Data saved successfully!"
            ];
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
            return [
                "type" => "SUCCESS",
                "message" => "File uploaded and data saved successfully." . $this->filename
            ];
        } else {
            return
                [
                    "type" => "ERROR",
                    "message" =>  $fileUpload['message']
                ];
        }
    }

    //login part 
    public function login($data)
    {
        $conn = $this->connection();
        if (!isset($data)) {
            return "no data";
        } else {
            // data cleaning 
            $tblename = $this->tblename;
            $email = mysqli_escape_string($conn, $data['email']);
            $pass = mysqli_escape_string($conn, $data['password']);

            //find match email and password 

            $sql = "SELECT * From $tblename where password = '$pass' and email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return [
                    "result" => $result->fetch_all(MYSQLI_ASSOC),
                    "login" => true,

                ];
            } else {
                return [
                    "type" => "ERROR",
                    "message" => "No Account Found",
                    "login" =>  false
                ];
            }
        }
    }
    //registrations 
    public function register($data)
    {
        if (!isset($data)) {
            return "no data";
        } else {
            $conn = $this->connection();
            //data cleaning 
            $lastname = mysqli_escape_string($conn, $data['lastname']);
            $firstname = mysqli_escape_string($conn, $data['firstname']);
            $middle = mysqli_escape_string($conn, $data['middle']);
            $email = mysqli_escape_string($conn, $data['email']);
            $pass = mysqli_escape_string($conn, $data['password']);
            $role = mysqli_escape_string($conn, $data['role']);
            $credential = [
                "email" => $email,
                "password" => $pass
            ];
            // if account exist 
            $login = $this->login($credential);
            if ($login['login'] == true) {
                return [
                    "type" => "ERROR",
                    "message" => "Account Already Exist"
                ];
            }

            $sql = "INSERT INTO $this->tblename (firstname, lastname, middle, email ,password, role) 
                VALUES ('$firstname', '$lastname', '$middle', '$email', '$pass', '$role')";

            if ($conn->query($sql) === TRUE) {
                return [
                    "type" => "SUCCESS",
                    "message" => "Account Created Please Login"
                ];
            } else {
                return [
                    "type" => "ERROR",
                    "message" => "Account Already Exist"
                ];
            }
        }
    }
}
