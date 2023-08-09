<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Department's Students</title>
    </head>
    <body>
        <h4>Students Information</h4>
        <?php
        include '.\dbConnect.php';
        $dName = $_GET['dName'];
        $query = "select s.studentid, s.studentname, s.gradorugrad, e.email, i.iname
                from Student s, emails e, instructor i
                where s.dname = '$dName' and	e.sssn = s.ssn and i.ssn = s.advisorSsn;";
        $result = mysqli_query($conn, $query);
        ?>
    
    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>Department's Students</caption>
            <tr>
                <th class="table-primary">Student ID</th>
                <th class="table-primary">Student Name</th>
                <th class="table-primary">Grad Or Undergraduate</th>
                <th class="table-primary">Email</th>
                <th class="table-primary">Instructor Name</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $studentid = $row["studentid"];
                $studentName = $row["studentname"];
                $gradorugrad = $row["gradorugrad"];
                $email = $row["email"];
                $advisorName = $row["iname"];
                echo "<td>" .$studentid. "</td>";
                echo "<td>" .$studentName. "</td>";
                if($gradorugrad == 0){
                    echo "<td>" ."Graduate". "</td>";
                }else{
                    echo "<td>" ."Undergraduate". "</td>";
                }
                
                echo "<td>" .$email. "</td>";
                echo "<td>" .$advisorName. "</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>

