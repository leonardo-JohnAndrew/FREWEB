<?php  
   include_once('./Activityaction.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
 <?php 
    $choices = array(
     array (
        "A"=>"Hyper Transfer Markup Language",
        "B"=>"Hyper Text Markup Language",
        "C"=>"How To Make Lumpia",
        "D"=>"Home Tool Modern Languange"
    ), 
      array(
        "A"=>'echo "Hello, World!"',
        "B"=>'"HelloWorld"(print)',
        "C"=>'console.log("Hello, World!");',
        "D"=>'printf("Hello, World!");'
    ), 
    array(
        "A"=>"what if",
        "B"=>"if else",
        "C"=>"for",
        "D"=>"switch"
    ),
    array(
        "A"=>"Computer Style Sheets",
        "B"=>"Creative Styling System",
        "C"=>"Cascading Style Sheets",
        "D"=>"Colorful Style System"
    ),
    array(
        "A"=>"Box",
        "B"=>"Stack",
        "C"=>"Queue",
        "D"=>"Linked List"
    )
       
    );
     $questionaire = array(
          'What does HTML stand for?',
          'What is the correct syntax for printing "Hello, World!" in Python?',
          'Which of the following is a loop in programming?',
          'What does CSS stand for?',
          'Which data structure uses the Last In, First Out (LIFO) principle?',
     ); 
      $answers = array( 'B','D','C','C','B'); 

 ?>
<body>
     <div class="main">
        <div class="title">
            <h3>Choose The Correct Answers</h3>
        </div>
        <div class="content">
        <?php 
              $i = 0 ; 
               foreach ($choices as $key => $value) {
                  
                      $content = new quiz($questionaire[$i], $value,$answers[$i]); 
                      echo $content->show();
                    $i++;
            }
            
            ?>
        </div>
     </div>
</body>
</html>