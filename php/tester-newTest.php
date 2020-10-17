<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("database.php");
$errormsg="";
$testkitResult=mysqli_query($con,"SELECT * FROM testkit WHERE location='".$_SESSION['testcentre']."';");
if(isset($_POST['submit'])){
  
  $patientUsernameCheck = "select * from user,patient WHERE user.username='".$_POST['username']."'  AND password='".$_POST['password']."'AND user.username=patient.username;";
  $patientUsernameCheckRow = mysqli_num_rows(mysqli_query($con,$patientUsernameCheck));
  if ($patientUsernameCheckRow>0)
    $errormsg="Username '".$_POST['username']."' already exist!";
  else{
    $userInsertSql="INSERT INTO `user` (`username`, `password`, `name`, `email`, `address`, `identificationNo`, `contactNo`) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['identificationNo']."', '".$_POST['contactNo']."');";
    mysqli_query($con,$userInsertSql);
    $patientInsertSql="INSERT INTO `patient` (`username`, `patientType`, `symptoms`, `emergencyContact`) VALUES ('".$_POST['username']."', '".$_POST['patientType']."', '".$_POST['symptoms']."', '".$_POST['emergency']."');";
    mysqli_query($con,$patientInsertSql);
    $testInsertSql="INSERT INTO `covidtest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `location`) VALUES ('".uniqid()."', '".$_POST['testDate']."', 'pending', 'null', 'null', '".$_POST['username']."', '".$_SESSION['username']."', '".$_POST['kitID']."', '".$_SESSION['testcentre']."');";
    mysqli_query($con,$testInsertSql);
    
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

    <title>MyCovidTrail | Add New Test</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <!-- Main Content -->
    <div class="container">
      <div class="card m-5">
        <form method="POST" action="#">
          <div class='card-body'>
            <h3 class="card-title text-center">Record New Covid-19 Test</h3>
            <h4 class=" text-center">Patient Detail</h4>
            <div class="row border" style="border:10px;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" name="email" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>IC No./Passport No.</label>
                  <input type="text" name="identificationNo" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Emergency Contact</label>
                  <input type="text" name="emergency" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text" name="contactNo" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control"  placeholder="" >
                </div>
              </div>
            </div>
            <h4 class=" text-center">Test Detail</h4>
            <div class="row border" style="border:10px;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Centre Name</label>
                  <input type="text" name="testcentre" class="form-control"  value="<?php echo $_SESSION['testcentre']; ?>" disabled>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Symptoms</label>
                  <input type="text" name="symptoms" class="form-control"  placeholder="" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Date</label>
                  <input name="testDate" value="<?php echo (date("Y-m-d")); ?>"class="form-control" type="date">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Kit</label>
                  <select id="inputState" name="kitID" class="form-control">
                    <?php
                    $i=0;
                    while($testKitRow=mysqli_fetch_array($testkitResult)){
                      ?>
                      <option value="<?php echo $testKitRow["kitID"]; ?>"><?php echo $testKitRow["kitID"]; ?></option>
                    <?php
                    $i++;}
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Patient Type</label>
                  <select id="inputState" name="patientType" class="form-control">
                    <option value ="returnee" selected>Returnee</option>
                    <option value ="quarantined">Quarantined</option>
                    <option value ="close contact">Close contact</option>
                    <option value ="infect">Infected</option>
                    <option value ="suspected">Suspected</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <input type="submit" name="submit" value="Register" class="btn btn-primary">
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