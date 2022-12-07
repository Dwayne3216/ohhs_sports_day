<?php

$title = 'Registration Form';

require_once 'includes/header.php';
require_once 'db/conn.php';

$parish = $crud->getParish();
$grade = $crud->getGrade();
$house = $crud->getHouse();
$eventtype = $crud->getEvent();

?>

<div class="col d-flex justify-content-center">
<div class="card border-success mb-3" style="width: 50rem">
<div class="card-header card text-white bg-success" ><h1 class="text-center">Registration for O.H.H.S Sports Day</h1></div>
<div class="card-body bg-warning opacity-78 ">

<form method="post" enctype="multipart/form-data" action="success.php" class= "row g-3">

    <div class ="col-sm-4">
        
        <label for="firstname" class="form-label fw-bold">First Name:</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="First Name">

    </div>

    <div class="col-sm-4">
        <label for="lastname" class="form-label fw-bold">Last Name:</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname" placeholder="Last Name">
    </div>
    
    <div class="col">
        <label for="gender" class="form-label fw-bold">Gender:</label></br>
        <input class="ms-3" type ="radio" name="gender" value="male"> Male </input>
        <input class="ms-3" type ="radio" name="gender" value="female"> Female </input>

    </div>
  

    <div class="col-md-4">
        <label for="dob" class="form-label fw-bold">Date of Birth:</label>
        <input required type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="col-md-8">
        <label for="address1" class="form-label fw-bold">Address:</label>
        <input required type="text" class="form-control" name="address1" id="address1" placeholder="1234 Main St">
    </div>

  <div class="col-md-6">
        <label for="town" class="form-label fw-bold">Town:</label>
        <input required type="text" class="form-control" id="town" name="town">
  </div>
    
  <div class="col-md-6">
  <label for="parish" class="form-label fw-bold">Parish:</label>
        <select class="form-select" aria-label="parish" id="parish" name="parish">
       
                <?php while($r = $parish->fetch(PDO::FETCH_ASSOC)) {?>

                    <option  value=" <?php echo $r['parish_id']; ?>" ><?php echo $r['parish_name']; ?>  </option>
                                         
                <?php } ?>

        </select>
    </div>
   
    <div class="col-md-5">
        <label for="grade" class="form-label fw-bold">Grade:</label>
        <select class="form-select" aria-label="grade" id="grade" name="grade">
       
                <?php while($r = $grade->fetch(PDO::FETCH_ASSOC)) {?>

                    <option  value=" <?php echo $r['grade_id']; ?>" ><?php echo $r['grade']; ?>  </option>
                                         
                <?php } ?>

        </select>
    </div>

 
    <div class="col-md-5">
        <label for="house" class="form-label fw-bold">House:</label>
        <select class="form-select" aria-label="house" id="house" name="house">
              
                <?php while($r = $house->fetch(PDO::FETCH_ASSOC)) {?>

                    <option  value=" <?php echo $r['house_id']; ?>" ><?php echo $r['house_name']; ?>  </option>
                                         
                <?php } ?> 

        </select>
    </div>

    <div class="col-md-5">
        <label for="eventtype" class="form-label fw-bold">Event Type:</label>
        <select class="form-select" aria-label="eventtype" id="eventtype" name="eventtype">
       
                <?php while($r = $eventtype->fetch(PDO::FETCH_ASSOC)) {?>

                    <option  value=" <?php echo $r['eventtype_id']; ?>" ><?php echo $r['eventtype_name']; ?>  </option>
                                         
                <?php } ?> 

        </select>
    </div>

   
    <div class="col-md-5">
        <label for="email" class="form-label fw-bold">Email address:</label>
        <input required type="email" class="form-control" id="email" placeholder="name@example.com" name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text fw-bold">We'll never share your email with anyone else.</div>
    </div>

    <div class="col-md-5">
        <label for="phone" class="form-label fw-bold">Contact Number:</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="(xxx)(xxx-xxxx)">
        <div id="phoneHelp" class="form-text fw-bold">We'll never share your contact number.</div>
    </div>
<br>

</br>
                    
  
    <div class = "custom-file">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Choose file </label>
            <small id="avatar" class="form-text badge text-bg-success">Upload is optional</small>
    </div>
<br>
<br>
<br>
<br>
  
<div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label fw-bold" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
</div>
<br>
<br>
<div class="text-center">
    <button type="submit" name="submit" class="btn btn-success ">Submit</button>
    <button class="btn btn-secondary" type="reset" value="Reset">Reset</button>
</div>
</form>


</div>
</div>
</div>
                
                    
                    
<br>
<br>
<br>
<br>
<br>
<br> 

<?php require_once 'includes/footer.php'; ?>
