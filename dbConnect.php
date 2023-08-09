    <?php
    $dbname = "p1solution34"; // name of database

    $conn = mysqli_connect("localhost", "root","", $dbname,'3306');//3. area for your database password please enter before run codes to connect your database.

    // Check connection

     

    if ($conn -> connect_errno) {

      echo "Failed to connect to MySQL: " . $conn->connect_error;

      exit();

    } else {

    }
    
    
    ?>


