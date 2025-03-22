<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,
initial-scale=1.0">
<title>Personal Notes</title>
</head>
<style>
body {
background-color: black;
font-family: Arial, sans-serif;
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}
form{
margin: 50px auto;
padding: 20px;
padding-top: 1%;
background-color: lightgoldenrodyellow;
border-radius: 8px;
box-shadow: 0 4px 8px lightyellow(0, 0, 0, 0.1);
}
.login-container {
background-color: #fff2b3;
padding: 20px;
border: 2px solid #d4a017;
border-radius: 10px;
text-align: center;
box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
}
h3 {
background-color: #d4a017;
padding: 10px;
color: lightyellow;
border-radius: 5px;
}
label {
font-weight: bold;
}
input[type="email"], input[type="password"] {
width: 90%;
padding: 8px;
margin: 5px 0;
border: 1px solid #d4a017;
border-radius: 5px;
}
input[type="submit"] {
background-color: #d4a017;
color: white;
padding: 10px;
border: none;
border-radius: 5px;
cursor: pointer;
}
input[type="submit"]:hover {
background-color: black;
}
.error {
color: red;
}
input[name="exit"]{
   background-color:red; 
}input[name="exit"]:hover{
    background-color:black; 
}
</style>
<body>
 <div>
   <form action="action.php" method = "POST">
     <h3>
      Welcome User Please Login
    </h3>
<?php
    session_start();
?>
  <span class="error"><?php
     if(isset($_SESSION['error'])){
        echo $_SESSION['error'];
        echo ' <input type="submit"  name="exit" value="x">';
      }
?></span> <br>
     <label for="">Email:</label>
     <input type="email" name="email" ><br>
     <LAbel>Password:</LAbel>
     <input type="password" name ="password" >
      <br>
     <input type="submit" name = "login" value="Login">
    </form>
   </div>
</body>
</html>