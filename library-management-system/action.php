<?php 
session_start(); 
 include('./database.php');

 if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['add'])){
     $title = mysqli_real_escape_string($connect,$_POST['title']);
     $author = mysqli_real_escape_string($connect,$_POST['author']);
     $genre = mysqli_real_escape_string($connect,$_POST['genre']);
     $year = mysqli_real_escape_string($connect,$_POST['year']);
    // storred the string value into arrays 
     $data = array(
        "title"=>$title, 
        "author"=>$author, 
        "genre"=>$genre, 
        'year'=>$year
     ); 

     if(!$data){
         echo "no data"; 
     }else{
     //pass array to crearte
      $message = $db->create($data,$connect); 
     if($message =='Successfull'){
       echo("<script>
       alert('Successfully Added go to view all to see')
       </script>"); 
     }else{
       echo" <script>
       alert('Failed Process')
       </script>"; 
     }
      echo("<script> 
         window.location ='add_book.php'
      </script>"); 
     }
    }
    if(isset($_POST['update'])){ 
      $id =   mysqli_escape_string($connect, $_POST['id']);
      $title = mysqli_real_escape_string($connect,$_POST['title']);
     $author = mysqli_real_escape_string($connect,$_POST['author']);
     $genre = mysqli_real_escape_string($connect,$_POST['genre']);
     $year = mysqli_real_escape_string($connect,$_POST['year']);
     $data = array(
      "title"=>$title, 
      "author"=>$author, 
      "genre"=>$genre, 
      'year'=>$year
   ); 
    if(!$data){
      echo " no data"; 
    }else{
       // update     
      $message = $db->update($id,$data,$connect); 
    }
    if($message =='Successfull'){
      echo("<script>
      alert('Successfully Update')
      </script>"); 
    }else{
      echo" <script>
      alert('Failed Process')
      </script>"; 
    }
     echo("<script> 
        window.location ='view_books.php'
     </script>"); 
    }

 }
 elseif($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['search'])){
       $search = mysqli_real_escape_string($connect,$_GET['item_search']); 
       $_SESSION['item_search'] = $search; 
      header('location: view_books.php');
    }elseif(isset($_GET['view'])){
         $_SESSION['item_search']= '';
      header('location: view_books.php');
    }
    elseif(isset($_GET['add'])){
      header('location: add_book.php');
    }elseif(isset($_GET['delete'])){
        $id = mysqli_escape_string($connect,$_GET['id']);
        $message = $db->delete($id,$connect); 
        if($message =='Successfull'){
         echo("<script>
         alert('Successfully Deleted')
         </script>"); 
       }else{
         echo" <script>
         alert('Failed Process')
         </script>"; 
       }
        echo("<script> 
           window.location ='view_books.php'
        </script>"); 
       
    }
    
 }
?> 