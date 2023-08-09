<!DOCTYPE html>
<?php
$ssn = $_POST['ssn'];

include '.\dbConnect.php';

$query_studentName = "SELECT studentname 
          FROM Student WHERE ssn = '$ssn' ";
$query_yearr = "SELECT DISTINCT yearr
            FROM Sectionn";
$query_semester = "SELECT DISTINCT semester
            FROM Sectionn";
$query_courseCode = "Select courseCode FROM Course";
$query_many = "Select issn,courseCode,yearr,semester,sectionId from sectionn ";

$result_studentName = mysqli_query($conn, $query_studentName);
$result_yearr = mysqli_query($conn, $query_yearr);
$result_semester = mysqli_query($conn, $query_semester);
$result_courseCode = mysqli_query($conn, $query_courseCode);
$result_many = mysqli_query($conn, $query_many);

$row = mysqli_fetch_assoc($result_studentName);
$studentName = $row["studentname"];
echo "<h4>" . "Students's Page" . "</h4>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Student Page</title>
    </head>
    <body>
    <div class="container mt-3 " >
        <div class="card ">
            <div class="card-header bg-primary d-flex justify-content-center">
                <h6 style="text-align: start;" class="text-light"><?php echo $studentName ?></h6>
                <a href="index.php"><i class="fa-solid fa-graduation-cap fa-3x" style="color: #000000;"></i></a>
                <h6 class="ms-2 mt-2"style="text-align: center">Student's Page</h6>
            </div>
            <div class="card-body border " style="background-color: #CFD8DC";>
                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Degree</h5>
                                <p class="card-text">Are you graduate or undergraduate?</p>
                                <?php
                                $query2 = "SELECT gradorUgrad From Student Where ssn = '$ssn' ";
                                $result2 = mysqli_query($conn, $query2);
                                $row2 = mysqli_fetch_assoc($result2);
                                $gradorUgrad = $row2["gradorUgrad"];
                                if ($gradorUgrad == 1) {
                                    echo "<div class='p-3 border bg-success text-light' style='font-size: 24px;'>" . "GRADUATE" . "</div>";
                                } else {
                                    echo "<div class='p-3 border bg-danger text-light' style='font-size: 24px;'>" . "UNDERGRADUATE" . "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Courses</h5>
                                <p class="card-text">Courses that you are taking.</p>
                                <div class="p-3 border bg-light"><a href="smycourses.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">My Courses</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Projects</h5>
                                <p class="card-text">Projects list that you are working in.</p>
                                <div class="p-3 border bg-light"><a href="smyprojects.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Projects</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grade Report</h5>
                                <p class="card-text">Your grades for academic your career.</p>
                                <div class="p-3 border bg-light"><a href="smygradereport.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">Grade Report</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Weekly Schedule</h5>
                                <p class="card-text">You can see your weekly schedule.</p>
                                <div class="p-3 border bg-light"><a href="sweeklyschedule.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">Weekly Schedule</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Your Advisor</h5>
                                <p class="card-text">Your Advisor who is advising you.</p>
                                <?php
                                $query3 = "SELECT I.iname From Student AS S, Instructor As I Where S.ssn = '$ssn' AND S.advisorSsn = I.ssn";
                                $result3 = mysqli_query($conn, $query3);
                                $row3 = mysqli_fetch_assoc($result3);
                                $iName = $row3["iname"];
                                echo "<div class='p-3 border bg-success text-light' style='font-size: 24px;'>" . "$iName" . "</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Curriculum</h5>
                                <p class="card-text">Lessons that you are supposed to take.</p>
                                <div class="p-3 border bg-light"><a href="smylessons.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Curriculum</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Department</h5>
                                <p class="card-text">You can see your department that you are studying.</p>
                                <?php
                                $query4 = "SELECT dName From Student AS S Where S.ssn = '$ssn'";
                                $result4 = mysqli_query($conn, $query4);
                                $row4 = mysqli_fetch_assoc($result4);
                                $dName = $row4["dName"];
                                echo "<div class='p-3 border bg-success text-light' style='font-size: 24px;'>" . "$dName" . "</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">List Students</h5>
                                <p class="card-text">List the students taking course C in a given year Y and semester S..</p>
                                <form method="post" action="slisttakingcourse.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Year</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row5 = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row5["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row6 = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row6["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?>
                                    </select>

                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Course Code</label>
                                    <select name="courseCode" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row7 = mysqli_fetch_assoc($result_courseCode)) {
                                            $courseCode = $row7["courseCode"];
                                            echo "<option>", $courseCode;
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">List Students</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card h-100" >
                            <div class="card-body">
                                <h5 class="card-title">List Students In Section</h5>
                                <p class="card-text">List the students taking course C in a given section.</p>
                                <form method="post" action="slistinsection.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Section</label>
                                    <select name="x" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row8 = mysqli_fetch_assoc($result_many)) {
                                            $issn = $row8["issn"];
                                            $courseCode = $row8["courseCode"];
                                            $yearr = $row8["yearr"];
                                            $semester = $row8["semester"];
                                            $sectionId = $row8["sectionId"];
                                            echo "<option value='$issn,$courseCode,$yearr,$semester,$sectionId'>Instructor SSN: $issn Course Code: $courseCode Year: $yearr Semester: $semester Section ID: $sectionId</option>";
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">List Students</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            

            
            <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Display All Scores</h5>
                                <p class="card-text">Display all scores of a student S of a course C in the form [examname, score].</p>
                                <form method="post" action="sdisplayallscores.php" class="text-center">
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Display All Scores</label>
                                    <select name="courseCode" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_courseCode, 0);
                                        while ($row = mysqli_fetch_assoc($result_courseCode)) {
                                            $courseCode = $row["courseCode"];
                                            echo "<option>", $courseCode;
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="ssn" value="<?php echo $ssn; ?>">
                                    <button type="submit" class="btn btn-primary mt-3">List Students</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                        

        </div>
        </body>
        </html>



