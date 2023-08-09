<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Welcome</title>
        <style>
            .card-body .col{
                text-align: center;
                min-height: 150px;
            }
        </style>
    </head>
    <body>


    <div class="container mt-3 " >
        <div class="card ">
            <div class="card-header bg-primary d-flex align-items-center">
                <a href="index.php"><i class="fa-solid fa-house fa-lg" style="color: #000000;"></i></a>
                <h6 class="ms-2 mt-2"style="text-align: center">HOME PAGE</h6>
            </div>
            <div class="card-body border " style="background-color: #CFD8DC";>
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="col">
                        <div><i class="fa-solid fa-person-chalkboard fa-5x"></i></div>
                        <div><a href="instructorlogin.php"><button type="button" class="btn btn-primary mt-3">Instructor</button></a></div>
                    </div>
                    <div class="col">
                        <div><i class="fa-solid fa-graduation-cap fa-5x"></i></div>
                        <div><a href="studentlogin.php"><button type="button" class="btn btn-primary mt-3">Student</button></a></div>
                    </div>
                    <div class="col">
                        <div><i class="fa-solid fa-building-columns fa-5x"></i></div>
                        <div><a href="departmentlogin.php"><button type="button" class="btn btn-primary mt-3">Departments</button></a></div>
                    </div>
                    <div class="col">
                        <div><i class="fa-solid fa-file fa-5x"></i></div>
                        <div><a href="projects.php"><button type="button" class="btn btn-primary mt-3">Projects</button></a></div>
                    </div>
                </div>

            </div>
        </div>


    </div>



<?php
include './dbConnect.php';
?>
</body>
</html>