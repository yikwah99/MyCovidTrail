<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("database.php");
$testkitResult=mysqli_query($con,"SELECT * FROM testkit WHERE location='".$_SESSION['testcentre']."' AND testkit.availableStock>0;");


if (isset($_GET['patient'])){
  $patientResult = mysqli_query($con,"SELECT * from user,patient WHERE user.username=patient.username AND user.username='".$_GET['patient']."';");
}
if(isset($_POST['submit'])){
  
  $patientUpdateSql="UPDATE patient SET patientType = '".$_POST['patientType']."', symptoms = '".$_POST['symptoms']."' WHERE `patient`.`username` = '".$_GET['patient']."';";
  mysqli_query($con,$patientUpdateSql);
  
  $testInsertSql="INSERT INTO `covidtest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `location`) VALUES ('".uniqid()."', '".$_POST['testDate']."', 'pending', 'null', 'null', '".$_GET['patient']."', '".$_SESSION['username']."', '".$_POST['kitID']."', '".$_SESSION['testcentre']."');";
  mysqli_query($con,$testInsertSql);
  
  $testkitUpdateSql="UPDATE testkit SET availableStock=availableStock-1 WHERE kitID='".$_POST['kitID']."' AND location='".$_SESSION['testcentre']."';";
  mysqli_query($con,$testkitUpdateSql);
  
  $_SESSION['message']="New Test Added for ".$_GET['patient']."!";
  header('location:tester-newTest.php');
  
  }
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
    <title>MyCovidTrail | Add New Test</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <!-- Main Content -->
    <div class="container">
      <div class="card mx-4 mt-4">
        <form method="POST" action="#">
          <div class='card-body'>
            <h3 class="card-title text-center">Record New Covid-19 Test</h3>
            <hr>
            <h4 class=" text-center">Patient Detail</h4>
            <div class="row border m-3 p-3" style="border:10px;">
              <?php
              $j=0;
              if (isset($_GET['patient'])){
              while($patientRow=mysqli_fetch_array($patientResult)){ ?>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="<?php echo $patientRow["username"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="text" name="email" class="form-control"  placeholder="<?php echo $patientRow["email"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>IC No./Passport No.</label>
                  <input type="text" name="identificationNo" class="form-control"  placeholder="<?php echo $patientRow["identificationNo"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control"  placeholder="<?php echo $patientRow["username"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="<?php echo $patientRow["password"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Emergency Contact</label>
                  <input type="text" name="emergency" class="form-control"  placeholder="<?php echo $patientRow["emergencyContact"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text" name="contactNo" class="form-control"  placeholder="<?php echo $patientRow["contactNo"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control"  placeholder="<?php echo $patientRow["address"]; ?>" disabled>
                </div>
              </div>
              <?php }} ?>
            </div>
            <h4 class=" text-center">Test Detail</h4>
            <div class="row border m-3 p-3" style="border:10px;">
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
                    foreach($testkitResult as $testKitRow){
                    //while($testKitRow=mysqli_fetch_array($testkitResult)){
                      ?>
                      <option value="<?php echo $testKitRow["kitID"]; ?>"><?php echo ($testKitRow["testName"]."(".$testKitRow["availableStock"].")"); ?></option>
                    <?php ;}
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
              
            </div>
            <div class="mt-2 text-center">
              <input type="submit" name="submit" value="Submit" class="btn btn-dark">
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>