<?php

$title = 'View Records';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';


$results = $crud->getStudent();

?>


<table class="table table-striped table-bordered border-info">
    <thead>
    <tr> 
        <th>#</th> 
        <th>First Name</th> 
        <th>Last Name</th>
        <th>Grade</th> 
        <th>House</th>
        <th>Event Type</th>
        <th>Contact Number</th> 
        <th>Actions</th> 
        
    </tr>
</thead>
<tbody class="table-group-divider">
    <?php
        while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
       
        <tr>
            <td><?php echo $r['student_id'] ?></td>
            <td><?php echo $r['fname'] ?></td>
            <td><?php echo $r['lname'] ?></td>
            <td><?php echo $r['grade'] ?></td>
            <td><?php echo $r['house_name'] ?></td>
            <td><?php echo $r['eventtype_name'] ?></td>
            <td><?php echo $r['contact'] ?></td>
           
          
                <!-- ACTION BUTTONS -->
        <td>
            
            <a href="view.php?id=<?php echo $r['student_id'] ?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['student_id'] ?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete');" href="delete.php?id=<?php echo $r['student_id'] ?>" class="btn btn-danger">Delete</a>
        </td>
                      
        </tr>

</tbody>

       <?php } ?>
   

</table>



<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>