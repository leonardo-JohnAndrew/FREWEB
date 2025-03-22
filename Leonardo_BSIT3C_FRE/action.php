<?php 
session_start(); 

class notes {
    public $filename ;
    public $date_update; 
    public $date; 
    public $message; 
    function __construct($filename, $date_update , $message )
    {
    $this->filename = $filename ;
    $this->message = $message;
    $this->date_update = $date_update; 

    }
     function create(){
        $file = fopen( $this->filename, "w"); // "w" mode creates or overwrites the file
        if (!$file) {
        die("Error: Unable to open file for writing!");
        }
        //write 
        fwrite($file , $this->message); 
        echo "Data successfully written to".$this->filename."<br>";
     }
     function view(){

     }
}

function location ($page){
    return header("location: $page");
    }
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['exit'])){
        unset($_SESSION['error']);
        location('login.php');
        }
        if(isset($_POST["login"])){
        $_SESSION['permission'] = false;
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if("john@gmail.com" == $email &&"1234" == $pass){
        $_SESSION['permission'] = true;
        // location('ActivityQuestions.php');
   
        } elseif(!$pass && !$email){
        $_SESSION['error'] = "Please complete the input fields";
        location('login.php');
        } else{
        $_SESSION['error'] = "Email or Password is incorrect";
        location('login.php');
        }
        }
        if(isset($_POST['save'])){
            $filename = " "; 
            $notes = new notes ()
        }
    }
?> 