<?php 
include_once('./database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
</head>
<style>
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
       background-color: #171414;
    }
    header{
      border: goldenrod 1px solid; 
      background-color:darkred;
      width: 1000px;
      color: aliceblue;
      font-size:  3vh;
      text-shadow: lightyellow  3px 3px 10px ;
      padding: 5px;
      justify-items: center;
     margin-top :2em ;
    }
    .title{
      padding: 0px 5px 0px 5px;
      background-color: #ffd457;
      width: 1000px;
      border: 1px solid goldenrod;
      display: flex;
      flex-wrap: wrap;
      align-items: center; 
      position: relative;
    }
    .title h4 {
      margin-left: 30px;
      font-size: 20px;
    }
    .title .search{
      margin-left: 3px;
    } 
    .title form{
      padding: 0;
      margin: 0;
    }
    input[type = 'search']{
      background-color: #ffd457;
      width: 200px;
    }
    input[name ='search']{
      background-color: darkred;
      color: white; 
      transition: color .5;
    } input[name = 'search']:hover{
      color:  darkred;
      background-color: aliceblue;

    }
     
     
    input[type ='submit']{
      background-color: darkred;
      color: white; 
      transition: color .5;
    } input[type = 'submit']:hover{
      color:  darkred;
      background-color: aliceblue;

    } .title .buttons{
       position: absolute;
       right: 10%;
    }
    
    form{
      padding: 0%;
      margin: 0%
      ;
    }

</style>
<body>
      <header>
        <h4>Library Management System</h4>
      </header>
      <form action ='./action.php' method="GET"> 
   <div class="title ">
       <h4>Search Book :</h4>
       <div class="search">
     
          <input type="search" name="item_search" placeholder="enter... author,genre or title" value="<?=isset($_SESSION['item_search'])? $_SESSION['item_search']:''?>" id="">
          <input type="submit" value = "Go"name="search">
    
       </div>
        <div class="buttons">
           <input type="submit" name = "view" value="View All"> 
           <input type="submit" name = "add" value="Add Book"> 

        </div>
   </div>
      </form>
</body>
</html>