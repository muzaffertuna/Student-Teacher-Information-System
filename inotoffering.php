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
        <h4>Workers</h4>
        <?php
        include '.\dbConnect.php';
        $yearr = $_POST['yearr'];
        $semester = $_POST['semester'];

        $query =    "select i.iname 
                     from instructor i
                    where i.ssn not in (select s.issn
					from sectionn s
                                        where s.yearr='$yearr' and s.semester ='$semester')";
        
       $result = mysqli_query($conn, $query);
        ?>
    
    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>instructors who are not offering any course in year Y, semester S.</caption>
            <tr>
                <th class="table-primary">Advisor Name</th>

            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $iname = $row["iname"];

                echo "<td>" .$iname. "</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>
