<?PHP 
session_start(); 

if (!isset($_SESSION['permission']) || $_SESSION['permission'] !== true) {
    $_SESSION['error'] = "Not Authorized";
    header("Location: login.php");
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Notes</title>
</head>
 <style>
    /* fff2b3 light #d4a017 dark */
    body{
        font-family: Arial, sans-serif;
         background-color: black;
         padding:0 ; 
         margin:0; 
    }
    form{
        padding: 0;
        margin:0;
    }     
    main{
        background-color: black;
        position: relative;
     /* Layout */
        display: grid;
        grid-template-columns: 1fr 3fr 1fr ;
        grid-template-rows: 100px auto 1fr; 
    }
    .title{
        background-color: #d4a017;
        border-radius: 10px 10px 0 0 ;
        display: flex;
        place-content: center;
        /* layout */
        grid-column: 2/3;
        grid-row: 2/3;
    } 
    h2{
        color: white;
    }
     .sub-main{
        background-color: #fff2b3;
        height: max-content;
        border-radius: 0 0 10px 10px;
         position: relative;
         padding-bottom: 2%;
        /* layout */
        grid-column:2/3 ;
        grid-row: 3/4;
     }
     .sub-main .status{
        display: flex;
        position: relative;
        padding: 4px;
        height: 40px;
        border-radius: 2px;
        border: 2px dotted brown;
     }
     .sub-main .status span{
        margin-left: 20%;
     }


    h4{
        margin-left: 45%;
        color: darkgoldenrod;
    }
    label[class='labels']{
        display: block;
        margin-left:45%;
        margin-top: 2%;
        margin-bottom: 2%;
        color:rgb(70, 53, 10);
        font-weight: 700;
        
    }
    .create-notes{
        padding: 1%;
    }
    input[type ="text"]{
        width: 98%;
        height: 20px;
        padding: 2px;
        text-align: center;
        border: #d4a017 1px solid;
    } 
    input[type="search"]{
        height: 20px;
        padding: 2px;
        text-align: center;
        border: #d4a017 1px solid;
    }
    input[type ="text"]:focus,textarea:focus , input[type="search"]:focus{
         outline: none;
         box-shadow: #d4a017 2px 2px 4px;
    }
    textarea{
        width: 98%;
        height: 100px;
        padding: 3px;
        border: #d4a017 1px solid;
    
    }
      .create-notes .button{
        position: absolute;
        right: 0;
        padding: 5px;
      }
     .sub-main .view-notes {
        padding:10px  ;
        
    }
    .view-notes label{
        color:rgb(139, 103, 11);
        font-weight: 700;
    } 
    .create-notes input[type ="submit"]{
        position: absolute;
        right: 10px;;
        background-color: #d4a017;
        border-radius: 5px;
        border: none;
        color:white;
        padding: 10px;
        transition: color ease-in-out 0.5s;
    }
    .create-notes input[type ="submit"]:hover{
      background-color: black;
    }
    hr{
        margin: 35px;
    }
    .view-notes  input[type='submit']{
        color: white;
        background-color: #d4a017;
        transition: color ease-in-out .5s;
        border: 2px;
        padding: 5px;
    }.view-notes  input[type='submit']:hover{
        background-color: black;
    }
     .sub-main .out{
         display: flex;
          justify-content: center;
     }
     .sub-main .out .exit{
        width: 90%;
        background-color: #d4a017;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        transition: ease-in-out color .5s;
     }.sub-main .out .exit:hover{
        background-color: black;
     }
     
 </style>
<body>
    <main>
        <div class="title">
            <h2>Welcome to the Personal Notes App</h2>
        </div> 
        <div class="sub-main">
            
              <h4>Write a Note</h4>
            <div class="create-notes">
                <form action="action.php" method="POST">
                <?php 
            if(isset($_SESSION['status'])){
            ?>
             <div class="status">
                <span><?php echo $_SESSION['status']?>
                </span> 
                <input type="submit" name="close" value="x">
            </div>
           
             <?php 
            }
             ?>
               <label class="labels" for="">Username </label>
               <input type="text" name="username_create" require>
               <br>
                <label class="labels" for="">Note </label>
                <textarea name="notes" ></textarea><br>
                
                <input class="submit" type="submit" name ="save" value = "Save Note">
                 </form>
                
            </div>    
            <hr> 
             <h4>View Your Notes</h4>
            <div class="view-notes">
                <form action="action.php" method="GET">
                <label for="">Username: </label>
                <input type="search" value="<?php
                  echo empty($_SESSION['username'])? "":$_SESSION['username'];
                ?>" name="search_name" >
                 <input type="submit"  value="View Notes" name="view_note">
      
                 <BR></BR>
                 <?php 

                  if(isset($_SESSION['data'])){
                    
                 ?> 
                 <label for="">Your Notes: </label> 
                 <input type="submit" value="x" name="close"><br>
                  <br>
                 <textarea name="" readonly disabled id=""><?=$_SESSION['data'];?></textarea>
                <?php 
                  }
                ?>
          
            </div>
            <div class="out">
                <input type="submit" class="exit" value="EXIT" name="exit">
            </div>
                  
            </form>
        </div>
    </main>
</body>
</html>