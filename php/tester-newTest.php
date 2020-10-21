<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("database.php");
$errormsg="";
$testkitResult=mysqli_query($con,"SELECT * FROM testkit WHERE location='".$_SESSION['testcentre']."' AND testkit.availableStock>0;");
$patientResult = mysqli_query($con,"SELECT * from user,patient WHERE user.username=patient.username;");



if(isset($_POST['submit'])){
  $patientUsernameCheck = "select * from user WHERE user.username='".$_POST['username']."';";
  $patientUsernameCheckRow = mysqli_num_rows(mysqli_query($con,$patientUsernameCheck));
  if ($patientUsernameCheckRow>0)
    $_SESSION['errormessage']="Username '".$_POST['username']."' already exist!";
  else{
    $userInsertSql="INSERT INTO `user` (`username`, `password`, `name`, `email`, `address`, `identificationNo`, `contactNo`) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['identificationNo']."', '".$_POST['contactNo']."');";
    mysqli_query($con,$userInsertSql);
    $patientInsertSql="INSERT INTO `patient` (`username`, `patientType`, `symptoms`, `emergencyContact`) VALUES ('".$_POST['username']."', '".$_POST['patientType']."', '".$_POST['symptoms']."', '".$_POST['emergency']."');";
    mysqli_query($con,$patientInsertSql);
    $testInsertSql="INSERT INTO `covidtest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `location`) VALUES ('".uniqid("CT")."', '".$_POST['testDate']."', 'pending', 'null', 'null', '".$_POST['username']."', '".$_SESSION['username']."', '".$_POST['kitID']."', '".$_SESSION['testcentre']."');";
    mysqli_query($con,$testInsertSql);
    $testkitUpdateSql="UPDATE testkit SET availableStock=availableStock-1 WHERE kitID='".$_POST['kitID']."' AND location='".$_SESSION['testcentre']."';";
  mysqli_query($con,$testkitUpdateSql);
    $_SESSION['message']="New Patient and Test Added!";
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
    <link rel="icon" href="../img/favicon.ico">
    <title>MyCovidTrail | Add New Test</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <!-- Main Content -->
    <div class="container">
      <div class="card m-4">
        <form method="POST" class="m-0" action="#">
          <div class='card-body'>
            <h3 class="card-title text-center">Record New Covid-19 Test</h3>
            <hr>
            <h4 class=" text-center">Patient Detail</h4>
            <div class="row border m-3 p-3" style="border:10px;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="name" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" name="email" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>IC No./Passport No.</label>
                  <input type="text" name="identificationNo" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Emergency Contact</label>
                  <input type="number" name="emergency" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="number" name="contactNo" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" class="form-control"  placeholder="" required>
                </div>
              </div>
            </div>
            <h4 class=" text-center">Test Detail</h4>
            <div class="row border mx-3 p-3" style="border:10px;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Centre Name</label>
                  <input type="text" name="testcentre" class="form-control"  value="<?php echo $_SESSION['testcentre']; ?>" disabled>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Symptoms</label>
                  <input type="text" name="symptoms" class="form-control"  placeholder="" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Date</label>
                  <input name="testDate" value="<?php echo (date("Y-m-d")); ?>"class="form-control" type="date" required>
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
                    <option value ="quarantined">Quarantined</option>
                    <option value ="close contact">Close contact</option>
                    <option value ="infect">Infected</option>
                    <option value ="suspected">Suspected</option>
                  </select>
                </div>
              </div>
              
            </div>
            <div class="mt-3 text-center">
              <input type="submit" name="submit" value="Register" class="btn btn-dark">
            </div>
          </div>
        </form>
      </div>
      
      
    </div>
    <hr>
    <h3 class="text-center my-4">Existing Covid-19 Test List</h3>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Full Name</th>
            <th scope="col">IC No./Passport No.</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact No</th>
            <th scope="col">Emergency Contact</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
          $j=0;
          while($patientRow=mysqli_fetch_array($patientResult)){ ?>
          <tr>
            <th scope="row"><?php echo($j+1) ?></th>
            <td><?php echo $patientRow["username"]; ?></td>
            <td><?php echo $patientRow["password"]; ?></td>
            <td><?php echo $patientRow["name"]; ?></td>
            <td><?php echo $patientRow["identificationNo"]; ?></td>
            <td><?php echo $patientRow["email"]; ?></td>
            <td><?php echo $patientRow["contactNo"]; ?></td>
            <td><?php echo $patientRow["emergencyContact"]; ?></td>
            <td><?php echo $patientRow["address"]; ?></td>
            
            <td>
              <!--<button type="button" class="btn btn-dark">New Test</button>-->
              <a class="btn btn-dark" href='tester-newTestForm.php?patient=<?php echo $patientRow["username"]; ?>'>Add New Test</a>
            </td>
          </tr>
          <?php    
          $j++;}
          ?>
        </tbody>
      </table>
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