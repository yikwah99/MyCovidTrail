<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("database.php");
$errormsg="";
$officerResult = mysqli_query($con,"SELECT * from user, centreofficer WHERE user.username=centreofficer.username;");

if(isset($_POST['submit'])){

  $officerUsernameCheck = "select * from user,centreofficer WHERE user.username='".$_POST['username']."'  AND password='".$_POST['password']."'AND user.username=centreofficer.username;";
  $officerUsernameCheckRow = mysqli_num_rows(mysqli_query($con,$officerUsernameCheck));

  if ($officerUsernameCheckRow>0){
    echo '<script>alert("That Username already exists!")</script>';
  }
  else{
    $userInsertSql="INSERT INTO `user` (`username`, `password`, `name`, `email`, `address`, `identificationNo`, `contactNo`) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['name']."', '".$_POST['email']."',
      '".$_POST['address']."', '".$_POST['identificationNo']."', '".$_POST['contactNo']."');";
    mysqli_query($con,$userInsertSql);
    $centreofficerInsertSql="INSERT INTO `centreofficer` (`username`, `position`, `workplace`) VALUES ('".$_POST['username']."', 'Tester', '".$_SESSION['testcentre']."');";
    mysqli_query($con,$userInsertSql);
    mysqli_query($con,$centreofficerInsertSql);
    $_SESSION['message']="New User and Tester accounts created successfully!.";
  }
}
//alert message
include_once("alert.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>MyCovidTrail | Register Officer</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <div class="container">
      <div class="card m-5">
        <form method="POST" action="#">
          <div class='card-body'>
            <h3 class="card-title text-center">Register new Tester Account</h3>
            <h4 class=" text-center">Tester Account Details</h4>
            <div class="row border" style="border:10px; padding-top: 10px">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" name="email" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>IC No./Passport No.</label>
                  <input type="text" name="identificationNo" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text" name="contactNo" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <input type="submit" name="submit" value="Register" class="btn btn-primary btn-lg" style="margin-bottom:10px">
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/165dc4ee52.js" crossorigin="anonymous"></script>
  </body>
</html>
