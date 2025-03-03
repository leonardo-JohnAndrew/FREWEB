<?php 
session_start();
 class quiz  {
     public $questions ; 
     public $choices = array(); 
     public $anscorect; 
     private $correct = 0 ;
     
  function __construct($questions, $choices, $anscorect ) 
  {
      $this->questions = $questions ;
      $this->choices = $choices; 
      $this->anscorect = $anscorect; 
  } 
  function show()
  {
    foreach ($this->choices as $key => $value) {
        echo $value.'</br>' ; 
 
    }
    return  $this->questions."</br>" ."Correctans".$this->anscorect."</br>"  ; 
  }
  function check($answers) 
  {
    if($answers == $this->questions){
        return  $this->correct ++; 
    }
  }
 }

// if(isset($_POST['email'])&&isset($_POST['password'])){

// }else{
//     location('Activity3login.php'); 
// }

function location ($page){
  return header("location: $page"); 
}

if(isset($_POST['exit'])){
   unset($_SESSION['error']);
   location('Activity3login.php');
}
 if(isset($_POST["login"])){
    
$email = $_POST['email']; 
$pass = $_POST['password'];  
$_SESSION['email'] = $email;
$_SESSION['pass'] = $pass;
    if("john@gmail.com" == $email &&"1234" == $pass){
        location('ActivityQuestions.php'); 
    }  elseif(!$pass && !$email){
      
       $_SESSION['error'] = "Please complete the input fields";
       location('Activity3login.php');
     
    } else{

      $_SESSION['error'] = "Email or Password is incorrect";
      location('Activity3login.php');
    }
 }

?>
