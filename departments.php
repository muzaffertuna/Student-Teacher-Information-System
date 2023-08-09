<!DOCTYPE html>
<?php
$dName = $_POST['dName'];
include '.\dbConnect.php';
echo "<h4>" . "Department's Page" . "</h4>";

$query_yearr = "SELECT DISTINCT yearr
            FROM Sectionn";
$query_semester = "SELECT DISTINCT semester
            FROM Sectionn";
$query_courseCode = "Select courseCode FROM Course";
$query_examName = "Select DISTINCT examname FROM questionofexam";

$result_yearr = mysqli_query($conn, $query_yearr);
$result_semester = mysqli_query($conn, $query_semester);
$result_courseCode = mysqli_query($conn, $query_courseCode);
$result_examName = mysqli_query($conn, $query_examName);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Departments Page</title>
    </head>
    <body>
    <div class="container mt-3 " >
        <div class="card ">
            <div class="card-header bg-primary d-flex justify-content-center align-items-center">
                <h6 style="text-align: start;" class="text-light"><?php echo $dName ?></h6>
                <a href="index.php"><i class="fa-solid fa-building-columns fa-3x" style="color: #000000;"></i></a>
                <h6 class="ms-2 mt-2"style="text-align: center;">Departments Page</h6>
            </div>
            <div class="card-body border " style="background-color: #CFD8DC";>
                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Students Of Department</h5>
                                <p class="card-text">Students of choosen department.</p>
                                <div class="p-3 border bg-light"><a href="dstudents.php?dName=<?php echo $dName; ?>" class="btn btn-primary">Students Of Department</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Department's Instructors</h5>
                                <p class="card-text">Instructors Of Department </p>
                                <div class="p-3 border bg-light"><a href="dinstructors.php?dName=<?php echo $dName; ?>" class="btn btn-primary">Department's Instructors</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card h-100" >
                            <div class="card-body">
                                <h5 class="card-title">Display All Grades For Courses</h5>
                                <p class="card-text">Display grades of a course C in year Y semester S.</p>
                                <form method="post" action="ddisplaygrades.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Year</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>    
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?> 
                                    </select>

                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Course Code</label>
                                    <select name="courseCode" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_courseCode)) {
                                            $courseCode = $row["courseCode"];
                                            echo "<option>", $courseCode;
                                        }
                                        ?> 
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">Display All Grades </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card " >
                            <div class="card-body">
                                <h5 class="card-title">Display All Grades For Exams</h5>
                                <p class="card-text">Display all points of a certain exam E course C offered in a particular year Y, and semester S in the form [sssn, qNo, pointesEarned].</p>
                                <form method="post" action="ddisplaygradesforexams.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Year</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_yearr, 0);
                                        while ($row = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>    
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_semester, 0);
                                        while ($row = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?> 
                                    </select>

                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Course Code</label>
                                    <select name="courseCode" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_courseCode, 0);
                                        while ($row = mysqli_fetch_assoc($result_courseCode)) {
                                            $courseCode = $row["courseCode"];
                                            echo "<option>", $courseCode;
                                        }
                                        ?> 
                                    </select>

                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Exam Name</label>
                                    <select name="examname" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result_examName)) {
                                            $examname = $row["examname"];
                                            echo "<option>", $examname;
                                        }
                                        ?> 
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">List Points</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Project Of Department</h5>
                                <p class="card-text">Projects Of this department.</p>
                                <div class="p-3 border bg-light"><a href="dprojects.php?dName=<?php echo $dName; ?>" class="btn btn-primary">Projects Of Department</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Average Base Salary Of Instructors </h5>
                                <p class="card-text">Calculate average base salary of instructors of each department.</p>
                                <div class="p-3 border bg-light"><a href="daveragebasesalary.php" class="btn btn-primary ">Average Base Salary</a></div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>
</body>
</html>


