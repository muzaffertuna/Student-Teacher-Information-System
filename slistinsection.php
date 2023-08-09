<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Students Of Section</title>
    </head>
    <body>
        <h4>Students Of Section Information</h4>
        <?php
        include '.\dbConnect.php';

            //Get informations
            $selectedOption = $_POST["x"];

            //Parse informations
            $data = explode(",", $selectedOption);
            $issn = $data[0];
            $courseCode = $data[1];
            $yearr = $data[2];
            $semester = $data[3];
            $sectionId = $data[4];

            echo "Instructor SSN: $issn<br>";
            echo "Course Code: $courseCode<br>";
            echo "Year: $yearr<br>";
            echo "Semester: $semester<br>";
            echo "Section ID: $sectionId<br>";
        


        $query = "select s.studentname
            from enrollment e,Student S
            where e.yearr='$yearr' and e.semester = '$semester' and e.courseCode = '$courseCode' and e.sssn = s.ssn and 
            e.issn = '$issn' and e.sectionId = '$sectionId' ";

        $result = mysqli_query($conn, $query);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>Students Of Section</caption>
            <tr>
                <th class="table-primary">Student Name</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $studentName = $row["studentname"];
                echo "<td>" . $studentName . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

