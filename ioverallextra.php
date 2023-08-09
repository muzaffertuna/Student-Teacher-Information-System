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
        <h4>Abdulhey</h4>
        <?php
        include '.\dbConnect.php';
        $yearr = $_POST['yearr'];
        $semester = $_POST['semester'];

        $query = "select I.ssn, (sum(course.numHours)-10)*50 as extraCoursePayment, COUNT(DISTINCT gradstudent.ssn)*25 as gradStudentsPayment, sum(PI.workinghour)*100 as projectPayment
                  from ((instructor I left outer JOIN (sectionn NATURAL JOIN course )on I.ssn = sectionn.issn)  
                  left outer join gradstudent on I.ssn = gradstudent.supervisorSsn)
                  left outer join project_has_instructor PI on I.ssn = PI.issn
                  where (sectionn.yearr = '$yearr' and sectionn.semester='$semester' ) or (sectionn.yearr is null and sectionn.semester is null)
GROUP BY I.ssn";

        $result = mysqli_query($conn, $query);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>instructors who are not offering any course in year Y, semester S.</caption>
            <tr>
                <th class="table-primary">Advisor SSN</th>
                <th class="table-primary">Extra Course Payment</th>
                <th class="table-primary">Grad Students Payment</th>
                <th class="table-primary">Project Payment</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $issn = $row["ssn"];
                $extraCoursePayment = $row["extraCoursePayment"];
                $gradStudentsPayment = $row["gradStudentsPayment"];
                $projectPayment = $row["projectPayment"];

                echo "<td>" . $issn . "</td>";
                echo "<td>" . $extraCoursePayment . "</td>";
                echo "<td>" . $gradStudentsPayment . "</td>";
                echo "<td>" . $projectPayment . "</td></tr>";
                
            }
            ?>

        </table>
    </div>
</body>
</html>

