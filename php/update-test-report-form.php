<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("database.php");
if (isset($_GET['test'])){
  $testResult = mysqli_query($con,"SELECT * from user,patient,covidtest WHERE user.username=patient.username AND covidtest.recipient=patient.username AND covidtest.testID='".$_GET['test']."';");
}
if(isset($_POST['submit'])){
  $testUpdateSql="UPDATE covidtest SET result = '".$_POST['result']."', resultDate = '".$_POST['resultDate']."', status ='completed' WHERE covidtest.testID = '".$_GET['test']."';";
  echo($testUpdateSql);
  mysqli_query($con,$testUpdateSql);
  header('location:update-view-test-report.php');
  $_SESSION['message']="Update Test Successfully!";
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
      <div class="card m-5">
        <div class='card-body'>
          <h3 class="card-title text-center">Update Covid-19 Test Result</h3>
          <h4 class=" text-center">Patient Detail</h4>
          <div class="row border" style="border:10px;">
            <?php
            if (isset($_GET['test'])){
            while($testRow=mysqli_fetch_array($testResult)){ ?>
            <div class="col-md-4">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control"  placeholder="<?php echo $testRow["username"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="email" class="form-control"  placeholder="<?php echo $testRow["email"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>IC No./Passport No.</label>
                <input type="text" name="identificationNo" class="form-control"  placeholder="<?php echo $testRow["identificationNo"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control"  placeholder="<?php echo $testRow["username"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  placeholder="<?php echo $testRow["password"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Emergency Contact</label>
                <input type="text" name="emergency" class="form-control"  placeholder="<?php echo $testRow["emergencyContact"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" name="contactNo" class="form-control"  placeholder="<?php echo $testRow["contactNo"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control"  placeholder="<?php echo $testRow["address"]; ?>" disabled>
              </div>
            </div>

          </div>
          <!-- Test Detail -->
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
                <input type="text" name="symptoms" class="form-control"  placeholder="<?php echo $testRow["symptoms"]; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Test Date</label>
                <input name="testDate" value="<?php echo $testRow["testDate"]; ?>"class="form-control" type="date" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Test Kit</label>
                <select id="inputState" name="kitID" class="form-control" disabled>
                  <option value="<?php echo $testRow["kitID"]; ?>"><?php echo $testRow["testName"]; ?></option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Patient Type</label>
                <select id="inputState" name="patientType" class="form-control" disabled>
                  <option value ="<?php echo $testRow["patientType"]; ?>" selected><?php echo $testRow["patientType"]; ?></option>
                </select>
              </div>
            </div>

          </div>
          <!-- Test Result -->
          
          <form method="POST" action="#">
            <h4 class=" text-center">Test Result</h4>
            <div class="row border" style="border:10px;">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Test ID</label>
                  <input type="text" name="testID" class="form-control"  value="<?php echo $testRow['testID']; ?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tester</label>
                  <input type="text" name="tester" class="form-control"  placeholder="<?php echo $testRow['tester']; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Result Date</label>
                  <input name="resultDate" value="<?php echo (date("Y-m-d")); ?>"class="form-control" type="date">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Test Result</label>
                  <select id="inputState" name="result" class="form-control">
                    <option value ="positive" selected>Positive</option>
                    <option value ="negative">Negative</option>
                  </select>
                </div>
              </div>
              <?php }} ?>
            </div>
            <div class="col-md-12 text-center">
              <input type="submit" name="submit" value="Submit" class="btn btn-dark">
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
