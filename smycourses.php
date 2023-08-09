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
        $ssn = $_GET['ssn'];
        $query = "SELECT courseCode "
                . "FROM Enrollment "
                . "WHERE sssn ='$ssn'";
        $result = mysqli_query($conn, $query);

        $query2 = "SELECT E.courseCode, E.sectionId, W.dayy,W.hourr
                    FROM weeklyschedule W NATURAL JOIN enrollment E -- thanks to natural join
                    where E.sssn = '$ssn'";
        $result2 = mysqli_query($conn, $query2);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>My Courses</caption>
            <tr>
                <th class="table-primary">Course Code</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $courseCode = $row["courseCode"];
                echo "<td>" . $courseCode . "</td></tr>";
            }
            ?>

        </table>

        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>My Courses Timetable</caption>
            <tr>
                <th class="table-primary">Course Code</th>
                <th class="table-primary">Section ID</th>
                <th class="table-primary">Day</th>
                <th class="table-primary">Hour</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result2)) {
                $courseCode = $row["courseCode"];
                $sectionID = $row["sectionId"];
                $dayy = $row["dayy"];
                $hourr = $row["hourr"];
                echo "<td>" . $courseCode . "</td>";
                echo "<td>" . $sectionID . "</td>";
                echo "<td>" . $dayy . "</td>";
                echo "<td>" . $hourr . "</td></tr>";
            }
            ?>

        </table>
    </div>
</body>
</html>
