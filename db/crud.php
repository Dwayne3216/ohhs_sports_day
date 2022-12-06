
<?php

class crud
{
    // private database object
    private $db; 

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    { //initialising an object of a class

        $this->db = $conn;   //this gives all the private and public attributes within this class
    }                           //CREATE
    public function insertStudent($firstname, $lastname, $gender, $grade, $house, $eventtype, $dob, $address, $town, $email, $contact, $parish, $avatar_path)
    {

        try {
            //define sql statement to be executed
            $sql = "INSERT INTO `student`(`fname`, `lname`, `gender`, `dateofbirth`, `address1`, `town`, `grade_id`, `house_id`, `eventtype_id`, `emailaddress`, `contact`, `parish_id`, `avatar_path`) 
            VALUES (:firstname, :lastname, :gender, :dob, :address1, :town, :grade, :house, :eventtype, :email, :contact, :parish, :avatar_path)";

            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);

            //bind all placeholders to the actual values
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':gender', $gender);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':address1', $address);
            $stmt->bindparam(':town', $town);
            $stmt->bindparam(':grade', $grade);
            $stmt->bindparam(':house', $house);
            $stmt->bindparam(':eventtype', $eventtype);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':parish', $parish);
            $stmt->bindparam(':avatar_path', $avatar_path);

            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    
       
    //EDIT
    public function editStudent($id, $firstname, $lastname, $gender, $grade, $house, $eventtype, $dob, $address, $town, $email, $contact, $parish, $avatar_path)
    {

        try {
        
            $sql = "UPDATE `student` SET `fname`=:firstname,`lname`=:lastname,`gender`=:gender,`dateofbirth`=:dob,
                                        `address1`=:address1,`town`=:town,`grade_id`=:grade,`house_id`=:house,`eventtype_id`=:eventtype,
                                        `emailaddress`=:email,`contact`=:contact,`parish_id`=:parish, `avatar_path`=:avatar_path WHERE student_id =:id";
           
            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':gender', $gender);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':address1', $address);
            $stmt->bindparam(':town', $town);
            $stmt->bindparam(':grade', $grade);
            $stmt->bindparam(':house', $house);
            $stmt->bindparam(':eventtype', $eventtype);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':parish', $parish);
            $stmt->bindparam(':avatar_path', $avatar_path);
            //execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }


    // READ
    public function getStudent()
    {

        try {
            $sql = "SELECT * FROM `student` a inner join parish p on a.parish_id = p.parish_id inner join grades g on a.grade_id = g.grade_id
            inner join house h on a.house_id=h.house_id inner join event_type e on a.eventtype_id=e.eventtype_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getStudentDetails($id)
    {
    
        try {
            $sql = "select * from student a inner join parish p on a.parish_id = p.parish_id 
            inner join grades g on a.grade_id = g.grade_id inner join house h on a.house_id = h.house_id
            inner join event_type e on a.eventtype_id = e.eventtype_id
            where student_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getParish()
    {
        try {
            $sql = "SELECT * FROM `parish`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    public function getParishById($id)
    {

        try {
            $sql = "SELECT * FROM `parish` where parish_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }

        //Read Grade
    public function getGrade()
    {
        try {
            $sql = "SELECT * FROM `grades`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    public function getGradeById($id)
    {

        try {
            $sql = "SELECT * FROM `grades` where grade_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }
 
    //Read House 
    
    public function getHouse()
    {
        try {
            $sql = "SELECT * FROM `house`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    public function getHouseById($id)
    {

        try {
            $sql = "SELECT * FROM `house` where house_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }

    
    //Read Event Type
   
    public function getEvent()
    {
        try {
            $sql = "SELECT * FROM `event_type`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); 
            return false;
        }
    }

    public function getEventById($id)
    {

        try {
            $sql = "SELECT * FROM `event_type` where eventtype_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage(); //"e" represents the object of a class
            return false;
        }
    }


    //DELETE Attendee
 public function deleteStudent($id)
 {
     try {
         $sql = "delete from student where student_id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $id);
         $stmt->execute();
         return true;
     } catch (PDOException $e) {
         echo $e->getMessage(); //"e" represents the object of a class
         return false;
     }
 }





}

?>