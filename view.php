<?php

$title = 'View Record';

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';


//Get attendee by id
if(!isset($_GET['id'])){
    
    include 'includes/errormessage.php'; 
}else{
    $id = $_GET['id'];
    $result = $crud->getStudentDetails($id);
    
    


?>



<img src="<?php echo empty ($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ; ?>" class="rounded mx-auto d-block img-fluid rounded-start"  style="width: 15%; height: 15%"/>


<br>
<div class="col d-flex justify-content-center">
<div class="card text-bg-secondary mb-3 border-success" style="width: 20rem;">

<div class="card-header text-bg-dark">
        
        <h5 class="card-title">
            <?php
            echo $result['fname'] . ' ' . $result['lname'];
            ?>
        </h5>

</div>
    <div class="card-body">
        
        <!-- <h6 class="card-subtitle mb-2 text-muted">
            <?php
            echo $result['name'];
            ?>
        </h6> -->
        <p class="card-text">
            Gender: <?php
                            echo $result['gender'];
                            ?>

        </p>

        <p class="card-text">
            Date of Birth: <?php
                            echo $result['dateofbirth'];
                            ?>

        </p>

        <p class="card-text">
            Address: <?php
                            echo $result['address1'];
                            ?>

        </p>

        <p class="card-text">
            Town: <?php
                            echo $result['town'];
                            ?>

        </p>

        <p class="card-text">
            Parish: <?php
                            echo $result['parish_name'];
                            ?>

        </p>
        <p class="card-text">
            Grade: <?php
                            echo $result['grade'];
                            ?>

        </p>

        <p class="card-text">
            House: <?php
                            echo $result['house_name'];
                            ?>

        </p>
        <p class="card-text">
            Event Type: <?php
                            echo $result['eventtype_name'];
                            ?>

        </p>

        <p class="card-text">
            Email Address: <?php
                            echo $result['emailaddress'];
                            ?>

        </p>

        <p class="card-text">
            Contact Number: <?php
                            echo $result['contact'];
                            ?>

        </p>
<br/>
    <div class="card-footer">
        <a href="viewrecords.php" class="btn btn-info">Back to List</a>
        <a href="edit.php?id=<?php echo $result['student_id'] ?>" class="btn btn-warning">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete');" href="delete.php?id=<?php echo $result['student_id'] ?>" class="btn btn-danger">Delete</a>
    </div>
    </div>
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

       
    <?php } ?>

</div>




<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>