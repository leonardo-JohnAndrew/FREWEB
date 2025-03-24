<?php 
session_start();
 include_once('./database.php');
$search = '';
 if(isset($_SESSION['item_search'])){
    $search = $_SESSION['item_search'];
 } 

 $result = $db->show($connect,$search,''); 
?>
<html>
     <style>
       .content {
      background-color: #ffd457;
      width: 1000px;
      padding: 5px;
      display: flex;
      flex-direction: column;
       }
      .content .sub-content{
        margin: 2rem;
        height: 300px;
        overflow-y: scroll;
      }
       .content .header {
        margin-left: 30px;
        
       }
       .content .header h2{
        margin: 0%;
        margin-top: 2%;
       }
       table{ 

         width: 100%;
         border-spacing: 0cap;
      }
     
       th, td {
        border-bottom: 1px solid goldenrod;
        text-align: left;
       }
       th{
         background-color: darkred;
         color: aliceblue;
         padding: 0%;
        
       }
       a{
         color: red;
         transition: color .5 ;
       }a:hover{
         color: aliceblue;
       }
    
     </style>
    <body>
    <?php require_once ('./header.php') ?> 
    <div class="content"> 
      <div class="header">
      <h2>Books List </h2>
      </div>
         <div class="sub-content">
        <table >
           <thead>
               <th>ID</th>
               <th>Title</th>
               <th>Author</th>
               <th>Genre</th>
               <th>Year Published</th>
               <th>Action</th>
           </thead>
           <tbody>
            <?php 
               while($row =  $result->fetch_assoc()){  
             ?>
             <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['title']?></td>
                <td><?=$row['author']?></td>
                <td><?=$row['genre']?></td>
                <td><?=$row['year_published']?></td>
                <td>
                <a href="edit_book.php?id=<?=
                 $row['id'] ?>">Edit</a> 
                 <a href="action.php?id=<?= $row['id'] ?>&delete=delete " onclick="return confirm('Are yousure?');">Delete</a>
                 
                </td>
             </tr>
            <?php 
               }
            ?>
           </tbody>
        </table>
         </div>
        </div>
    </body>
</html>