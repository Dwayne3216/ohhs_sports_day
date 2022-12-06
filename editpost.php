<?php
$title = 'edit post';

    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get values from post operation

    if (isset($_POST['submit'])) {
        //extract values from the $POST array
        $id = $_POST['id'];
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
        $avatar = $_POST['avatar'];
        
    

    //Call Crud Function

    $result = $crud->editStudent($id, $firstname, $lastname, $gender, $grade, $house, $eventtype, $dob, $address, $town, $email, $contact, $parish, $avatar);

    //Redirect to index.php
    if($result){
        header("Location: viewrecords.php");
    }
    else{ 
       // echo 'error';
       include 'includes/errormessage.php'; 

    }
}
    else{
        //echo 'error';
        include 'includes/errormessage.php'; 
}

?>
<?php require_once 'includes/footer.php'; ?>