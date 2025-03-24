

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
        height: 100px;
        display: flex;
       position: relative;
      }
       .content .header {
        margin-left: 30px;
        
       }
       .content .header h2{
        margin: 0%;
        margin-top: 2%;
       }
       input[type='text']{
          height: 20px;
          background-color: #ffd457
       }
       input[type='text']:nth-last-child(4){
        width: 100px;
       }
       input[id='add']{
          position: absolute;
          right: 4%;
          width: 70px;
       }
  </style>
<body>
    <?php require_once ('./header.php') ?> 
    <div class="content">
       <div class="header">
          <h2>Add Book</h2>
       </div>
         <div class="sub-content">
    <form action="./action.php" method="POST">
      <label for="">Title : </label>
     <input type="text" placeholder="title" name="title" required>
     <label for="">Author : </label>
     <input type="text" placeholder="author" name="author" required>
     <label for="">Genre : </label>
     <input type="text" placeholder="genre" name="genre" required>
   
     <label for="">Year Published : </label>
     <input type="text" placeholder="year" name="year" required>   
   <BR></BR>
      <input type="submit" value="ADD" id="add" name="add">
    </form>   
         </div>
    </div>
</body>
</html>