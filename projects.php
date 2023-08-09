<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>All Departments</title>
    </head>
    <body>

        <?php
        include '.\dbConnect.php';
        $query = "SELECT pName FROM project";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <table class="table table-sm table-hover table-dark table-striped caption-top border-primary">
            <caption>All Projects</caption>
            <tr>
                <th class="table-primary">Project Name</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $pName = $row["pName"];
                echo "<td>" . $pName . "</td></tr>";
            }
            ?>

        </table>


        <div class="row g-2 mt-1">
            <div class="card bg-primary" >
                <div class="card-body">
                    <h5 class="card-title text-light">All People Working In Project</h5>
                    <p class="card-text text-light">List all people working in project P.</p>
                    <form method="post" action="pdisplayworker.php" class="text-center">
                        <label for="disabledSelect" class="form-label "  style="font-weight: bold;">Choose Project Name</label>

                        <select name="pName" id="disabledSelect" class="form-select border-2">
                            <?php
                            mysqli_data_seek($result, 0);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pName = $row["pName"];
                                echo "<option>", $pName;
                            }
                            ?>    
                        </select>

                        <button type="submit" class="btn btn-dark mt-3">Workers In Project</button>
                    </form>
                </div>
            </div>


            <div class="card bg-primary" >
                <div class="card-body">
                    <h5 class="card-title text-light">Extra Payment For Instructors</h5>
                    <p class="card-text text-light">Assume for each hour of working in a project, instructors will be paid 100$ extra. Display extra payments of instructors working in a project P in form [instructor ssn, instructor name, extra payment]</p>
                    <form method="post" action="pextrapayment.php" class="text-center">
                        <label for="disabledSelect" class="form-label "  style="font-weight: bold;">Choose Project Name</label>

                        <select name="pName" id="disabledSelect" class="form-select border-2">
                            <?php
                            mysqli_data_seek($result, 0);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $pName = $row["pName"];
                                echo "<option>", $pName;
                            }
                            ?>    
                        </select>

                        <button type="submit" class="btn btn-dark mt-3">Extra Payments</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



