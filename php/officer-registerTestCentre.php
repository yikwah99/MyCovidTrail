<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once("database.php");
$errormsg="";
$testcentreResult=mysqli_query($con,"SELECT * FROM testcentre;");
if(isset($_POST['submit'])){

  $testcentreCheck = "select * from testcentre WHERE testcentre.centreName='".$_POST['centreName']."'";
  $testCentreCheckRow = mysqli_num_rows(mysqli_query($con,$testcentreCheck));
  if ($testCentreCheckRow>0)
    $errormsg="TestCentre '".$_POST['CentreName']."' already exist!";
  else{
    $testCentreInsertSql="INSERT INTO `testcentre` (`centreName`, `Address`, `landline`) VALUES ('".$_POST['centreName ']."', '".$_POST['address']."', '".$_POST['landline']."')";
    mysqli_query($con,$testCentreInsertSql);

  }
}
//user(username,password,name,email,adress,identificationNo, contactNo)
//patient(username,patientType,symptoms,emergency)

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>MyCovidTrail | Register Test Centre</title>

  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/165dc4ee52.js" crossorigin="anonymous"></script>

    <div class = "Welcome">
       <!-- Supposed to say "Welcome + UserType and/or Username" Eg. "Welcome Tester Leekeathong" -->
        <h2 strong style="padding:50px; background-color: #95B8D1;"> Welcome User! </h2>

        <div class="container">
          <div class="card m-5">
            <div class='card-body'>
              <h3 class="card-title text-center">Register Test Centre</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>CentreName</label>
                    <input type="text" name="centreName" class="form-control"  placeholder="eg: Columbia Asia">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Landline</label>
                    <input type="text" name="landline" class="form-control"  placeholder="eg: +603-58821987">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Test Centre Address</label>
                    <input type="text" name="address" class="form-control"  placeholder="">
                  </div>
                </div>
                <div class="col-md-12 text-center">
                  <input type="submit" class="btn btn-primary btn-lg">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
