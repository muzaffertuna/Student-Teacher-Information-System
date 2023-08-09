<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Workers</title>
    </head>
    <body>
        <h4>Extra Payment </h4>
        <?php
        include '.\dbConnect.php';
        $pName = $_POST['pName'];
        $query = "select PI.issn, instructor.iname, 100*sum(PI.workinghour) as extraPayment
                  from project_has_instructor PI JOIN instructor on PI.issn = instructor.ssn
                  Where PI.pName = '$pName'  group BY PI.issn;";
        
       $result = mysqli_query($conn, $query);
        ?>
    
    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>Extra Payment</caption>
            <tr>
                <th class="table-primary">ISSN</th>
                <th class="table-primary">Instructor Name</th>
                <th class="table-primary">Extra Payment</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $issn = $row["issn"];
                $iname = $row["iname"];
                $extraPayment = $row["extraPayment"];
                
                echo "<td>" .$issn. "</td>";
                echo "<td>" .$iname. "</td>";
                echo "<td>" .$extraPayment. "</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>
