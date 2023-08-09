<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>My Weekly Schedule</title>
    </head>
    <body>
        <h4>My Weekly Schedule</h4>
        <?php
        include '.\dbConnect.php';
        $ssn = $_GET['ssn'];
        $query = "SELECT hourr, dayy "
                . "FROM Weeklyschedule "
                . "WHERE issn= '$ssn' ";
        $result = mysqli_query($conn, $query);
        ?>

    <div class = "container col-6 justify-content-center mt-5">
        <?php
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $hours = range(1, 13);

// Create table
        echo '<table class="table table-lg table-hover table-dark table-striped caption-top border-primary">';
        echo '<caption>Weekly Schedule</caption>';
        echo '<tr>';
        echo '<th class="table-primary text-center">Day</th>';

// Add hours
        foreach ($hours as $hour) {
            echo '<th class="table-primary text-center">' . $hour . '</th>';
        }
        echo '</tr>';

// Create rows for every day
        foreach ($days as $day) {
            echo '<tr>';
            echo '<td>' . $day . '</td>';

            // Create columns for every hours
            foreach ($hours as $hour) {
                // Control datas and add table
                $found = false;
                mysqli_data_seek($result, 0); // free result 

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['dayy'] == $day && $row['hourr'] == $hour) {
                        $found = true;
                        break;
                    }
                }

                if ($found) {
                    echo "<td>Busy</td>";
                } else {
                    echo "<td>Free</td>";
                }
            }

            echo '</tr>';
        }

        echo '</table>';
        ?>
    </div>
</body>
</html>
