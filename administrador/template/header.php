<?php
session_start();
  if(!isset($_SESSION['user'])){
      header('Location:../index.php');
  }else{
    if($_SESSION['user']=="ok"){
      $userName = $_SESSION["userName"];
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php $url = 'http://'.$_SERVER['HTTP_HOST'].'/sitioWeb'?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="#">Website administrator<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/home.php">Home</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/section/services.php">Services</a>
                <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/section/logOut.php">Log Out</a>               
                <a class="nav-item nav-link" href="<?php echo $url;?>">Website</a>
            </div>
        </nav>


        <div class="container">
            <br/>
            <div class="row">