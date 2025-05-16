 <?php
    include_once('./header.php');
    $data = $database->view();

    ?>
 <style>
     h1 {
         padding-left: 200px;
     }

     .table {
         height: 300px;
         overflow-y: scroll;
     }

     table {
         width: 700px;


         th {
             text-align: left;
             margin: 0;
             color: lightgoldenrodyellow;
             padding: 0;
             background-color: rgb(94, 95, 95);
         }

         tr:nth-child(even) {
             background-color: #f2f2f2;
         }

         a {
             border-radius: 5px 5px 5px 5px;
             border: 2px inset orangered;
             color: lightgoldenrodyellow;
             background-color: rgb(241, 80, 0);
             padding: 0 5px 0 5px;
         }

         a:hover {
             background-color: lightgoldenrodyellow;
             border: 2px orange solid;
             color: rgb(241, 80, 0);
         }
     }
 </style>
 <div class="main">
     <div class="title">
         <h1>View Student Records</h1>

         <div class="content">
             <div class="table">
                 <table>
                     <thead>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Age</th>
                         <th>Resume</th>
                         <th></th>
                     </thead>
                     <?php
                        if (!empty($data)) {
                            foreach ($data['data'] as $row) {  ?>
                             <tr>
                                 <td><?= $row['id'] ?></td>
                                 <td><?= $row['name'] ?></td>
                                 <td><?= $row['email'] ?></td>
                                 <td><?= $row['age'] ?></td>
                                 <td> <a href="upload/<?= $row['resume'] ?>" download><?= $row['resume'] ?></a></td>
                                 <td>
                                     <a href="action.php?id=<?= $row['id'] ?>&delete=delete " onclick="return confirm('Are you sure to delete this record?');">Delete</a>

                                 </td>
                             </tr>
                     <?php }
                        } else {
                            echo "<tr><td colspan='5'>No student Records.</td></tr>";
                        }
                        ?>

                 </table>
             </div>
         </div>
     </div>
 </div>