<?php

$title = 'Success';

require_once 'includes/header.php';
require_once 'db/conn.php';
//require_once 'sendemail.php'; 


if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address1'];
    $town = $_POST['town'];
    $parish = $_POST['parish'];
    $grade = $_POST['grade'];
    $house = $_POST['house'];
    $eventtype = $_POST['eventtype'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    



    //Uploading Images
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$contact.$ext";
    move_uploaded_file($orig_file,$destination);

   // exit();  //THIS STOP THE CODE 

    //Call function to insert and track if succes or not
    $isSuccess = $crud->insertStudent($firstname, $lastname, $gender, $grade, $house, $eventtype, $dob, $address, $town, $email, $contact, $parish, $destination);
    //FUNCTION ADDED FOR CONFIRMATION EMAILS
   // $specialtyName = $crud->getSpecialtyById($specialty);


    if ($isSuccess) {
       // SendEmail::SendMail($email, 'Welcome to IT Conference 2022', 'You have successfuly registered for his year\'s IT Conference'); 
        include 'includes/successmessage.php'; 
    } else {
        include 'includes/errormessage.php'; 
    }
}

?>

<img src="<?php echo $destination; ?>" class="rounded" style="width: 20%; height: 20%"/>


<div class="card" style="width: 20rem;">
    <div class="card-body">

        <h5 class="card-title fw-bold"> <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?></h5>

        <!-- <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName['name']; //Placed here For Email Confirmation?></h6> -->

        <p class="card-text"> Gender: <?php echo $_POST['gender']; ?></p>
        
        <p class="card-text"> Grade: <?php echo $_POST['grade']; ?></p>

        <p class="card-text"> House: <?php echo $_POST['house']; ?></p>

        <p class="card-text"> Event Type: <?php echo $_POST['eventtype']; ?></p>

        <!-- <p class="card-text"> Event <?php echo $_POST['event']; ?></p> -->

        <p class="card-text"> Date of Birth: <?php echo $_POST['dob']; ?></p>

        <p class="card-text"> Address: <?php echo $_POST['address1']; ?></p>

        <p class="card-text"> Town: <?php echo $_POST['town']; ?></p>

        <p class="card-text"> Parish: <?php echo $_POST['parish']; ?></p>

        <p class="card-text">Email Address: <?php  echo $_POST['email']; ?></p>

        <p class="card-text">Contact Number: <?php echo $_POST['phone'];?></p>
    </div>
</div>

<br />
<p>To register another applicant click register</p>
<a href="form.php" class="btn btn-info">Register</a>


<br>
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>