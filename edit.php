<?php

$title = 'Edit Record';

require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';

$parish = $crud->getParish();
$grade = $crud->getGrade();
$house = $crud->getHouse();
$eventtype = $crud->getEvent();


//EDIT
if (!isset($_GET['id'])) {
   // echo 'error';
   include 'includes/errormessage.php'; 
   header("Location: viewrecords.php ");
} else {
    $id = $_GET['id'];
    $student = $crud->getStudentDetails($id);

?>
    

<div class="col d-flex justify-content-center">
<div class="card bg-warning border-success mb-3" style="width: 50rem">
<div class="card-header card text-white bg-success" ><h1 class="text-center">Edit Record</h1></div>
<div class="card-body">

<form method="post" action="editpost.php">

<div class="mb-3">
    <input type="hidden" name="id" value="<?php echo $student['student_id'] ?>" />
    <label for="firstname" class="form-label fw-bold">First Name</label>
    <input type="text" class="form-control" value="<?php echo $student['fname'] ?>" id="firstname" name="firstname" aria-describedby="firstname">
</div>

<div class="mb-3">
    <label for="lastname" class="form-label fw-bold">Last Name</label>
    <input type="text" class="form-control" value="<?php echo $student['lname'] ?>" id="lastname" name="lastname" aria-describedby="lastname">
</div>

<div class="mb-3">
    <label for="lastname" class="form-label fw-bold">Gender</label>
    <input type="text" class="form-control" value="<?php echo $student['gender'] ?>" id="gender" name="gender">
</div>

<div class="mb-3">
    <label for="dob" class="form-label fw-bold">Date of Birth</label>
    <input type="text" class="form-control" value="<?php echo $student['dateofbirth'] ?>" id="dob" name="dob">
</div>

<div class="md-8">
    <label for="address1" class="form-label fw-bold">Address:</label>
    <input required type="text" class="form-control" value="<?php echo $student['address1'] ?>" name="address1" id="address1" placeholder="1234 Main St">
</div>

<div class="md-6">
    <label for="town" class="form-label fw-bold">Town:</label>
    <input required type="text" class="form-control" value="<?php echo $student['town'] ?>" id="town" name="town">
</div>

<div class="mb-3">
    <label for="Parish" class="form-label fw-bold">Parish</label>

    <select class="form-select" aria-label="parish" value="<?php echo $student['parish_id'] ?>" id="parish" name="parish">


        <?php while ($r = $parish->fetch(PDO::FETCH_ASSOC)) { ?>

            <option value="<?php echo $r['parish_id']; ?>" <?php if ($r['parish_id'] == $student['parish_id']) echo 'selected' ?>>
                <?php echo $r['parish_name']; ?>
            </option>

        <?php } ?>

    </select>
</div>

<div class="mb-3">
    <label for="Grade" class="form-label fw-bold">Grade</label>

    <select class="form-select" aria-label="grade" value="<?php echo $student['grade_id'] ?>" id="grade" name="grade">


        <?php while ($r = $grade->fetch(PDO::FETCH_ASSOC)) { ?>

            <option value="<?php echo $r['grade_id']; ?>" <?php if ($r['grade_id'] == $student['grade_id']) echo 'selected' ?>>
                <?php echo $r['grade']; ?>
            </option>

        <?php } ?>

    </select>
</div>

<div class="mb-3">
    <label for="House" class="form-label fw-bold">House</label>

    <select class="form-select" aria-label="house" value="<?php echo $student['house_id'] ?>" id="house" name="house">


        <?php while ($r = $house->fetch(PDO::FETCH_ASSOC)) { ?>

            <option value="<?php echo $r['house_id']; ?>" <?php if ($r['house_id'] == $student['house_id']) echo 'selected' ?>>
                <?php echo $r['house_name']; ?>
            </option>

        <?php } ?>

    </select>
</div>

<div class="mb-3">
    <label for="Event" class="form-label fw-bold">Event</label>

    <select class="form-select" aria-label="eventtype" value="<?php echo $student['eventtype_id'] ?>" id="eventtype" name="eventtype">


        <?php while ($r = $eventtype->fetch(PDO::FETCH_ASSOC)) { ?>

            <option value="<?php echo $r['eventtype_id']; ?>" <?php if ($r['eventtype_id'] == $student['eventtype_id']) echo 'selected' ?>>
                <?php echo $r['eventtype_name']; ?>
            </option>

        <?php } ?>

    </select>
</div>

<div class="mb-3">
    <label for="email" class="form-label fw-bold">Email address</label>
    <input type="email" class="form-control" value="<?php echo $student['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>

<div class="mb-3">
    <label for="phone" class="form-label fw-bold">Contact Number</label>
    <input type="text" class="form-control" value="<?php echo $student['contact'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
    <div id="phoneHelp" class="form-text">We'll never share your contact number.</div>
</div>

<!-- <div class = "custom-file">
    <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
    <label class="custom-file-label" for="avatar">Choose file </label>
    <small id="avatar" class="form-text badge text-bg-success">Upload is optional</small>
</div> -->

<br>
<br>


<a href="viewrecords.php" class="btn btn-info">Back to List</a>
<button type="submit" name="submit" class="btn btn-success">Save Changes</button>
</form>




</div>
</div>
</div>




<?php } ?>

<br>
<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>
