<?php
  include_once 'includes/session.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css"/>

    <title>O.H.H.S - <?php echo $title ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img src="images/logo.jpg" alt="Bootstrap" width="55" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   
  

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mr-auto">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link active" href="form.php">Application Form</a>
        <a class="nav-link active" href="viewrecords.php">Records</a>
        
      </div>
         
      
      <div class="navbar-nav ml-auto">
          <?php 
            if (!isset($_SESSION['userid'])){
                   
          ?>
            <a class="nav-item nav-link active" href="login.php">Login <span class = "sr-only"> (current)</span></a>
          <?php } else { ?>
            
            <a class="nav-item nav-link active" href="#"><span> Hello <?php  echo $_SESSION['username']?>! </span><span class = "sr-only"> (current)</span></a>
            <a class="nav-item nav-link active" href="logout.php">Log out <span class = "sr-only"> (current)</span></a>

            <?php } ?>
          </div>
      </div>
  </div>
</nav>
  <div class="container-sm">
  
  <!-- Boothstrap Navi Bar -->
  
<br/>