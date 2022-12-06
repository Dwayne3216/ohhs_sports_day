<?php 
    $title = "Password Recovery";
    
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    
    
?>
<div class="col d-flex justify-content-center">
<div class="card" style="width: 40rem;">
<div class="card-header card text-white bg-dark" ><h1 class = "text-center"><?php echo $title ?></h1></div>
<div class="card-body">


<h3><p class="text-center"> Contact Your Admin </p></h3>
<h5>
<p class="text-center">   Your login is maintained by your schools administrator. 
    Please contact them to retrieve and reset your password.
</p>
</h5>
<div class="col d-flex justify-content-center">
<a href="login.php" class="btn btn-outline-info background-color: #3e8e41">Back To Login Page</a>


</div>       
        
    </form><br/><br/>
</div>
</div>
</div>

<?php include_once 'includes/footer.php'?>
                    
