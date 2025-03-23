<?php 
session_start(); 
date_default_timezone_set('Asia/Manila');
class notes {
    public $filename ;
    public $date  ;
    public $message; 
    function __construct($filename , $message )
    {
    $this->filename = $filename ;
    $this->message = $message;
    $this->date =  date('m/d/Y h:i:s a' , time()); 

    }
     function write($exist){
        if($exist == false ) {// file not exist 
        $file = fopen( $this->filename, "w");   // create new file 
        if (!$file) {
        die("Error: Unable to open file for writing!");
        }
        $notes = 'created['.$this->date.'] '.$this->message.PHP_EOL;
    } else{
          $file = fopen($this->filename , "a"); // a mode for append  if exist
          if (!$file) {
            die("Error: Unable to open file for writing!");
            }
            $notes ='updated['.$this->date.'] '.$this->message.PHP_EOL;
      }
        
       fwrite($file ,$notes ); 
       fclose($file); 
         return "Data successfully written to ".$this->filename."<br>";
     }
     function search(){
        $file = $this->filename;
        if(file_exists($file)){
            return true; 
        }else{
            return false; 
        }
     }   
     function read(){  
         $file = fopen($this->filename, "r"); //r reading the notes
         if (!$file) {
            die("Error: Unable to open file for reading!");
            }
            $filesize = filesize($this->filename); // Get the file size
            if ($filesize > 0) {
            $content = fread($file, $filesize);
             return $content; 
            } else {
             return "File is empty!";
            }
            // Close the file after reading
            fclose($file);
      
     }
}

function location ($page){
    return header("location: $page");

    exit;
    }
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['exit'])){
        unset($_SESSION['error']);
        location('login.php');
        }
        if(isset($_POST['close'])){
            unset($_SESSION['status']);
            location('notes.php');
            }
        if(isset($_POST["login"])){
        $_SESSION['permission'] = false;
        $email = $_POST['email'];
        $pass = $_POST['password'];
        if("john@gmail.com" == $email &&"1234" == $pass){
        $_SESSION['permission'] = true;
        location('notes.php');
   
        } elseif(!$pass && !$email){
        $_SESSION['error'] = "Please complete the input fields";
        location('login.php');
        } else{
        $_SESSION['error'] = "Email or Password is incorrect";
        location('login.php');
        }
        }
        if(isset($_POST['save'])){
          if(!empty($_POST['username_create'])&& !empty($_POST['notes'])){
            $filename = $_POST['username_create'].'_note.txt';//name 
            $message = $_POST['notes']; 
            $notes = new notes($filename, $message);//objt
            $exist = $notes->search(); // search function 
            $write = $notes->write($exist); // WRIte
            $_SESSION['status']= $write; 
            location('notes.php');
          }else{
             $_SESSION['status'] = 'Username and Note field  must have value'; 
             location('notes.php');
          }
            
        }
    }
    if($_SERVER['REQUEST_METHOD']==='GET'){
        if(isset($_GET['view_note'])){
            if(isset($_GET['search_name'])==''){
                $_SESSION['status'] = "Enter Username to view";
                location('notes.php'); 
            }else{
            $_SESSION['username'] = $_GET['search_name'];
            $filename = $_GET['search_name'].'_note.txt';
           $note = new notes($filename,'');
           $exist = $note->search(); 
           if($exist === true){
              $_SESSION['data'] =  $note->read(); 
           } else{
               $_SESSION['data'] =  "No Notes Found"; 
           }
           
          location('notes.php'); 
            }
        }
        if(isset($_GET['close'])){
            unset($_SESSION['status']);
            unset($_SESSION['data']);
            unset(  $_SESSION['username'] );
            location('notes.php');
            }
            if(isset($_GET['exit'])){
            session_destroy();
            location('login.php'); 
            }
    }
?> 