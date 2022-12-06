<?php 
    $title = "User Login";
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
?>

<div class="col d-flex justify-content-center">
<div class="card" style="width: 25rem;">
<div class="card-header card text-white bg-dark" ><h1 class = "text-center"><?php echo $title ?></h1></div>
<div class="card-body">

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class ="text-danger text-center"> Username/ Password is incorrect! </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['user_id'];

            header("Location: viewrecords.php");

        }
    }
?>
<br/>
    <form action = "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method= "post">
        <table class = "table table-sm">
                <tr>
                    <td><label for="username">Username: * </label></td>
                    <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>"></td>
                </tr>
                <tr>
                    <td><label for = "password">Password: * </label></td>
                    <td><input type="password" name="password" class="form-control" id="password"></td>
                </tr>
                
        </table>
    <div class="form-check mb-3">
      <input type="checkbox" class="form-check-input" id="dropdownCheck">
      <label class="form-check-label" for="dropdownCheck"> Remember me </label>
    </div>
        
        <input type = "submit" value ="Login" class="btn btn-success">
        
        <br/>
        <br/>

        <a href="passwordrecovery.php"> Forgot Password? </a>
    </form>
    <br/>
    <br/>
</div>
</div>
</div>

<?php include_once 'includes/footer.php'?>
                    
