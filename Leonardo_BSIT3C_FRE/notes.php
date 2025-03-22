<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Notes</title>
</head>
 <style>
    body{
         padding:0 ; 
         margin:0; 
    }
    form{
        padding: 0;
        margin:0;
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
               <label for="">Username: </label>
               <input type="text" name="username_create" require>
               <br>
                <label for="">Note: </label><br>
                <textarea name="notes" ></textarea><br>
                 <input type="submit" name ="save" value = "Save Note">
                 </form>
            </div>    
            <hr>
             <h4>View Your Notes</h4>
            <div class="view-notes">
                <form action="action.php" method="GET">
                <label for="">Username</label>
                <input type="search" name="search_name" >
                 <input type="submit" value="View Notes" name="view_note">
                 </form>
            </div>
        </div>
    </main>
</body>
</html>