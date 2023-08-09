<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
        <title>Login For Instructor</title>
    </head>
    <body>
        <?php
        include '.\dbConnect.php';
        $query = "SELECT * FROM instructor";
        $result = mysqli_query($conn, $query);
        ?>
        <h4>Select Your SSN</h4>
    <div class = "container col-6 justify-content-center mt-5">
        <div class="card justify-content-center bg-dark">
            <div class="card-header bg-primary">
                <a href="instructor.php"><i class="fa-solid fa-person-chalkboard fa-3x" style="color: #000000;"></i></a>
            </div>
            <div class=" card-body mb-3">
                <form method="post" action="instructor.php" class="text-center">
                    <label for="disabledSelect" class="form-label text-light">Choose Your SSN</label>
                    <select name="ssn" id="disabledSelect" class="form-select">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $ssn = $row["ssn"];
                            echo "<option>", $ssn;
                        }
                        ?>
                    </select>
                    <input  class=" mt-3"type="submit" value="Login">
                </form>
            </div>
        </div>

    </div>



