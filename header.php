<?php 

if (active == "yes") {
    # code...
}else {
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mantul Weather</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" style="width: 16px; height: 16px" href="assets/img/icon.png" />
</head>

<body>
    ​<div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top mb-25">
            <div class="d-flex w-50">
            <img src="assets/img/weather/weather.svg" style="width: 50px; height: 50px" alt="">
                <a class="navbar-brand mr-0" href="index.php">Mantul Weather</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <form class="form-inline my-2 my-lg-0" action="index.php?page=cek" method="post">
                        <input type="text" class="form-control" name="kota" placeholder="ex: Jakarta">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" name="submit" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </ul>
            </div>

        </nav>
    </div>




    ​
    ​