<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>My Courses</title>
    </head>
    <body>
        <h4>My courses Information</h4>
        <?php
        include '.\dbConnect.php';
        $ssn = $_POST['ssn'];
        $yearr = $_POST['yearr'];
        $semester = $_POST["semester"];
        $query = "select distinct c.courseCode, c.courseName, c.ects 
                    from course c, sectionn s
                    where s.issn = '$ssn' and s.yearr='$yearr' and s.semester = '$semester' and s.courseCode = c.courseCode ";
        $result = mysqli_query($conn, $query);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>My Courses</caption>
            <tr>
                <th class="table-primary">Course Code</th>
                <th class="table-primary">Course Name</th>
                <th class="table-primary">ECTS</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $courseCode = $row["courseCode"];
                $courseName = $row["courseName"];
                $ects = $row["ects"];
                echo "<td>" . $courseCode . "</td>";
                echo "<td>" . $courseName . "</td>";
                echo "<td>" . $ects . "</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>