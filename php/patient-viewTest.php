<?php
if(!isset($_SESSION))
{
    session_start();
}
$_SESSION['currentPage']="View Test Result";
$_SESSION['currentPageFileName']="patient-viewTest.php";
unset($_SESSION["secondPage"]);
include_once("database.php");
$testSql = "SELECT * from user,patient,covidtest,testcentre,testkit WHERE covidtest.recipient=patient.username AND patient.username=user.username AND testkit.kitID=covidtest.kitID AND testcentre.centreID=covidtest.location AND covidtest.recipient='".$_SESSION['username']."';";
$testResult = mysqli_query($con,$testSql);

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
    <link rel="icon" href="../img/favicon.ico">
    <title>MyCovidTrail | View Test Result</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    
    <!-- Main Content -->
    <div id="accordion">
      <div class="container">
        <?php 
        if (mysqli_num_rows($testResult)>0){
          foreach($testResult as $testRow){
        ?>
        <div class="card my-3">
          
          <div class="card-header" id="<?php echo "Test ID: ".$testRow["testID"]; ?>" data-toggle="collapse" data-target="#collapseOne<?php echo "Test ID: ".$testRow["testID"]; ?>" aria-expanded="true" aria-controls="collapseOne
            <?php echo "Test ID: ".$testRow["testID"]; ?>">
            <?php 
            echo "Test Date: ".$testRow["testDate"]; 
            if ($testRow["status"]=="pending")
              echo "<i class='fas fa-hourglass-half mx-3 text-warning'></i>";
            else
              echo "<i class='fas fa-check-circle mx-3 text-success'></i>";
            
            ?>
            <i class="fas fa-chevron-circle-down float-right"></i>
          </div>

          <div id="collapseOne<?php echo "Test ID: ".$testRow["testID"]; ?>" class="collapse" aria-labelledby="<?php echo "Test ID: ".$testRow["testID"]; ?>" data-parent="#accordion">
            <div class="card-body">
              <h3 class="card-title text-center">Update Covid-19 Test Result</h3>
              <h4 class=" text-center">Patient Detail</h4>
              
              <div class="row border" style="border:10px;">
                
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"  placeholder="<?php echo $testRow["username"]; ?>" disabled>
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
                    <input type="text" name="testcentre" class="form-control"  value="<?php echo $testRow["centreName"]; ?>" disabled>
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
                    <input name="resultDate" value="<?php echo $testRow['resultDate']; ?>"class="form-control" type="date" disabled>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Test Result</label>
                    <select id="inputState" name="result" class="form-control" disabled>
                      <option selected><?php echo $testRow['result']; ?></option>
                    </select>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
        <?php }}else{echo("No Test Added Yet");} ?>
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