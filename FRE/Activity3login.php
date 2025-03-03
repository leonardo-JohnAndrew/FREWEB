<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div>
          <form action="Activityaction.php" method = "POST">
            <h3>
                Welcome User Please Login
            </h3>
            <?php 
             session_start();
            ?> 
             <span class="error"><?php 
              if(isset($_SESSION['error'])){
                 echo $_SESSION['error']; 
                 echo ' <input type="submit" name="exit" value="x">';
              }  
              
             ?></span> <br>
            <label for="">Email:</label>
           <input type="email" name="email" value="<?php  echo $_SESSION['email'] ?>" ><br>
            <LAbel>Password:</LAbel>
            <input type="password" name ="password" value="<?php echo  $_SESSION['pass'] ?>">
            <br>
            
            <input type="submit"  name = "login" value="Login">
          </form>
     </div>
</body>

</html>