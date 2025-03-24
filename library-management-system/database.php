<?php 
  class database{

     protected $host = "localhost"; 
     protected $name = "root"; 
     protected $pass = ""; 
     protected $database ="library_db";  // database name
     protected $con= ""; 
     public $sql =""; 
      

     function __construct( )
     { 
       
     }
     public function connection(){
      $conn = $this->con = new mysqli($this->host, $this->name, $this->pass,$this->database); 
        if($conn->connect_error){
             die("Connection Failed: ". $conn->connect_error); 
        } 
       return $conn; 
     }
      //crud 
     public function create($data, $conn){
      //variable

      // var_dump($data);
      $title =$data['title']; 
      $author = $data['author']; 
      $genre = $data['genre']; 
      $year  = $data['year']; 

      //query 
      $sql = "INSERT into books(title, author ,genre, year_published)VALUES('$title' ,'$author' ,'$genre' ,'$year')";
   
      if($conn->query($sql)===true){
       return 'Successfull';
      }
       return 'Failed'; 
      
     } 
     public function show($conn,$search,$id){
       if(isset($search)==''){
        $select_sql = "SELECT * FROM books"; 
       }elseif($id !=''){
        $select_sql = "SELECT * FROM books WHERE id = '$id'"; 
       }
       else{
        $select_sql = "SELECT * FROM books Where title like '%$search%'or author like '%$search%' or  genre like '%$search%' ";
       }
       $result = $conn->query($select_sql); 
       if($result){
         return $result; 
       }else{
         return "no data found ";
       }
     }
     public function update($id , $data , $conn ){
      ///variable 
      $title =$data['title']; 
      $author = $data['author']; 
      $genre = $data['genre']; 
      $year  = $data['year']; 
      
      //query 
      $update_sql = "UPDATE books SET title = '$title', author ='$author', genre ='$genre', year_published = '$year' WHERE id = $id";

      //execute 
      if($conn->query($update_sql)=== TRUE){
         return "Successfull"; 
      } else{
        return "Failed" ; 
      }
      
     }
     public function delete($id, $conn){
        $sql = "DELETE from books Where id = $id"; 
        if($conn->query($sql)=== TRUE){
        return "Successfull"; 
        }else{
          return"Failed";
        }
     }
    }
    $db = new database(); 
    $connect = $db->connection(); 
    
 ?>