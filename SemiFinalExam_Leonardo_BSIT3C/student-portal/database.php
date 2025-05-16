<?php
class database
{

    protected $host = "localhost";
    protected $name = "root";
    protected $pass = "";
    protected $database = "studentportaldb";  // database name
    function __construct() {}
    public function connection()
    {
        $conn = $this->con = new mysqli($this->host, $this->name, $this->pass, $this->database);
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
//login and upload , show , delete   
class crud extends database
{
    function __construct()
    {
        parent::__construct();
    }
    //login function 
    public function login($name)
    {
        // preparedstatement
        $stmt = $this->connection()->prepare("SELECT * from accounts where name = ? ");
        if (!$stmt) {
            return [
                "status" => "Failed",
                "error" => $this->connection()->error
            ];
        }
        //binding 
        $stmt->bind_param("s", $name); // s = string

        if ($stmt->execute()) {
            $results = $stmt->get_result();
            if ($results->num_rows > 0) {
                return [
                    "status" => "Success",

                ];
            } else {
                return [
                    "status" => "Failed",
                    "error" => "This Account not exist"
                ];
            }
        } else {
            return [
                "status" => "Failed",
                "error" => $stmt->error
            ];
        }
    }

    //add student record
    public function upload($name, $email, $age, $resumeName)
    {
        // preparedstatement
        $stmt = $this->connection()->prepare("INSERT INTO studentrecords (name, email, age, resume) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            return [
                "status" => "Failed",
                "error" => $this->connection()->error
            ];
        }
        //binding 
        $stmt->bind_param("ssis", $name, $email, $age, $resumeName); // s = string, i = int
        if ($stmt->execute()) {
            return [
                "status" => "Success",
                "message" => "Successfully Added"
            ];
        } else {
            return [
                "status" => "Failed",
                "error" => $stmt->error
            ];
        }
    }
    //read all student records
    public function view()
    {
        //query 
        $query  = "SELECT * from studentrecords";
        // getting results 
        $results = $this->connection()->query($query);
        if ($results->num_rows > 0) {
            //if greater than 0 
            //bali return magreturn ito ng array 
            return [
                "data" => $results->fetch_all(MYSQLI_ASSOC),
                "rows" => $results->num_rows
            ];
        } else {
            return [];
        }
    }

    // delete student records 
    public function remove($id)
    {
        // preparedstatement
        $stmt = $this->connection()->prepare("DELETE FROM studentrecords where id = ? ");
        if (!$stmt) {
            return [
                "status" => "Failed",
                "error" => $this->connection()->error
            ];
        }
        //binding 
        $stmt->bind_param("i", $id); // i = int
        if ($stmt->execute()) {
            return [
                "status" => "Success",
                "message" => "Successfully Remove"
            ];
        } else {
            return [
                "status" => "Failed",
                "error" => $stmt->error
            ];
        }
    }
}
$database = new crud();
$record =  $database->view();
