<!DOCTYPE html>
<?php
$ssn = $_POST['ssn'];
include '.\dbConnect.php';
$query_ssn = "SELECT iname FROM instructor WHERE ssn = '$ssn' ";
$query_yearr = "SELECT DISTINCT yearr
            FROM Sectionn";
$query_semester = "SELECT DISTINCT semester
            FROM Sectionn";
$result_ssn = mysqli_query($conn, $query_ssn);
$result_yearr = mysqli_query($conn, $query_yearr);
$result_semester = mysqli_query($conn, $query_semester);
$row = mysqli_fetch_assoc($result_ssn);
$iName = $row["iname"];
echo "<h4>" . "Instructor's Page" . "</h4>";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Instructor Page</title>
    </head>
    <body>
    <div class="container mt-3 " >
        <div class="card ">
            <div class="card-header bg-primary d-flex justify-content-center align-items-center">
                <h6 style="text-align: start;" class="text-light"><?php echo $iName ?></h6>
                <a href="index.php"><i class="fa-solid fa-person-chalkboard fa-3x" style="color: #000000;"></i></a>
                <h6 class="ms-2 mt-2"style="text-align: center;">Instructor's Page</h6>
            </div>
            <div class="card-body border " style="background-color: #CFD8DC";>
                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Courses</h5>
                                <p class="card-text">Courses that you are teaching.</p>
                                <form method="post" action="imyCourses.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Year</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row2["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        while ($row3 = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row3["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="ssn" value="<?php echo $ssn; ?>"><!-- Bu gizli input alanı, name özelliği "ssn" olarak belirlenmiş ve değeri $ssn değişkenine eşit olarak ayarlanmıştır. Bu sayede, form gönderildiğinde $ssn değeri, sunucuya $_POST yöntemiyle iletilir. -->
                                    <button type="submit" class="btn btn-primary mt-3">My Courses</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Weekly Schedule</h5>
                                <p class="card-text">Your weekly schedule.</p>
                                <div class="p-3 border bg-light"><a href="iweeklyschedule.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">Weekly Schedule</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Students of Each Course</h5>
                                <p class="card-text">For each course you can see students.</p>
                                <div class="p-3 border bg-light"><a href="idstudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">Students of Each Course</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Projects</h5>
                                <p class="card-text">Project that you are leading or working.</p>
                                <div class="p-3 border bg-light"><a href="iprojects.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">My Projects</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Students</h5>
                                <p class="card-text">You can see your students.</p>
                                <div class="p-3 border bg-light"><a href="imystudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">My Students</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Graduate Students</h5>
                                <p class="card-text">You can see your graduated students.</p>
                                <div class="p-3 border bg-light"><a href="imygstudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">My Graduate Students</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Free Hours</h5>
                                <p class="card-text">Your free times in a week.</p>
                                <div class="p-3 border bg-light"><a href="ifreehours.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Free Hours</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">My Exams</h5>
                                <p class="card-text">You can see exams these are prepared by you.</p>
                                <div class="p-3 border bg-light"><a href="iexams.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary">My Exams</a></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Advising Students</h5>
                                <p class="card-text">Your students that you are advising.</p>
                                <div class="p-3 border bg-light"><a href="iadvisestudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Advising Students</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">My Advising GradStudents</h5>
                                <p class="card-text">Your gradstudents that you are advising.</p>
                                <div class="p-3 border bg-light"><a href="iadvisegradstudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Advising Gradstudents</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">List the instructors who are not offering any course</h5>
                                <p class="card-text">List the instructors who are not offering any course in year and semester.</p>
                                <form method="post" action="inotoffering.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Choose Year</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_yearr, 0);
                                        while ($row2 = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row2["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_semester, 0);
                                        while ($row3 = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row3["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">Instructor List</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card h-100" >
                            <div class="card-body">
                                <h5 class="card-title">My Advising GradStudents</h5>
                                <p class="card-text">Your gradstudents that you are advising.</p>
                                <div class="p-3 border bg-light"><a href="iadvisegradstudents.php?ssn=<?php echo $ssn; ?>" class="btn btn-primary ">My Advising Gradstudents</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

                
                <div class="row g-2 mt-1">
                    <div class="col-6">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">Display overall extra payment of an instructor</h5>
                                <p class="card-text">Display overall extra payment of an instructor I in a given semester S and year Y (project working hours*100 + (total teaching hours in S,Y -10)*50 + (supervising gradstudent)*25)./p>
                                <form method="post" action="ioverallextra.php" class="text-center">
                                    <label for="disabledSelect" class="form-label"  style="font-weight: bold;">Overall Extra Payment</label>
                                    <select name="yearr" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_yearr, 0);
                                        while ($row2 = mysqli_fetch_assoc($result_yearr)) {
                                            $yearr = $row2["yearr"];
                                            echo "<option>", $yearr;
                                        }
                                        ?>
                                    </select>
                                    <label for="disabledSelect" class="form-label" style="font-weight: bold;">Choose Semester</label>
                                    <select name="semester" id="disabledSelect" class="form-select border-2">
                                        <?php
                                        mysqli_data_seek($result_semester, 0);
                                        while ($row3 = mysqli_fetch_assoc($result_semester)) {
                                            $semester = $row3["semester"];
                                            echo "<option>", $semester;
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="ssn" value="<?php echo $ssn; ?>">
                                    <button type="submit" class="btn btn-primary mt-3">Instructor List</button>
                                </form>
                            </div>
                        </div>
                    </div>


        </div>
        </body>
        </html>


<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

