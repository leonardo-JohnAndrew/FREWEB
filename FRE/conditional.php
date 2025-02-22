<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $sum = 0 ;
        $vehicle = array("Motor"=>2, "Car"=>5, "Truck"=>10);
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
           
            
             foreach ($vehicle as $x => $y) {
                 $sum +=  $_POST[$x] *$y ; 
             } 
                echo "<h3> Total Cost : $sum "; 
            
            }

    ?>
    <form method="POST" >
     <H2>Toll Gate System</H2>
     <br>
      <h3>Vehicle Rates</h3>
    <ul>
        <li>Motorcycle : $2</li>
        <li>Car: $5</li>
        <li>Truck: $10</li>
    </ul>
  
        <h3>Enter Quantity: </h3>
        <label for>Motorcycle</label>
        <input type="number" id="html" name="Motor" value=""> <br>
        <label for="">Car</label> 
        <input type="number" id="" name="Car" value=""><br>
        <label >Truck</label>
        <input type="number" id="" name="Truck" value=""><br>
        
        <button name ="Submit">Submit</button>
   </form>
</body>
</html>