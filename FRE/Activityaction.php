<?php 
 if($_POST["login"]){
     $email = $_POST['email']; 
     $pass = $_POST['password'];
    if("john@gmail.com" == $email &&"1234" == $pass){
       

    }  elseif(!$pass && !$email){
       echo `alert("Please Complete the input fields")`;
    } else{
      echo ` alert("Incorrect password or email")`;
    }
 }

?>