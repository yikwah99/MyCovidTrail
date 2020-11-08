<?php
if(!isset($_SESSION))
{
    session_start();
}
$_SESSION['secondPage']="<b>Updating Test Kit Stock</b>";
include_once("database.php");

if (isset($_GET['testName'])){
  $testkitResult=mysqli_query($con,"SELECT * FROM testkit WHERE location='".$_SESSION['testcentre']."' AND testkit.availableStock>0 AND testkit.testName='".$_GET['testName']."';");
}
$testCentreResult=mysqli_query($con,"SELECT * FROM testcentre WHERE centreID='".$_SESSION['testcentre']."';");
if(isset($_POST['submit'])){

  $testkitUpdateSql="UPDATE testkit SET availableStock='".$_POST['newStock']."'  WHERE testName='".$_GET['testName']."' AND location='".$_SESSION['testcentre']."';";
  mysqli_query($con,$testkitUpdateSql);

  $_SESSION['message']="Test Kit Stock updated for ".$_GET['testName']."!";
  header('location:officer-manageTestKit.php');

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
    <link rel="icon" href="../img/favicon.ico">
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
            <h3 class="card-title text-center">Updating Test Kit Stock</h3>
            <hr>
            <h4 class=" text-center">TestKit Details</h4>
            <?php
            $testkitRow=mysqli_fetch_array($testkitResult);
            $testcentreRow=mysqli_fetch_array($testCentreResult);?>
            <div class="row border m-3 p-3" style="border:10px;">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Centre ID</label>
                  <input type="text" name="testcentre" class="form-control"  value="<?php echo $_SESSION['testcentre']; ?>" disabled>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Test Centre Name</label>
                  <input type="text" name="tcName" class="form-control"  value="<?php echo $testcentreRow["centreName"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Kit ID</label>
                  <input type="text" name="kitID" class="form-control"  value="<?php echo $testkitRow["kitID"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Test Kit Name</label>
                  <input type="text" name="tkName" class="form-control" value="<?php echo $testkitRow["testName"]; ?>" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>New Available Stock</label>
                  <input type="number" name="newStock" class="form-control"  placeholder="00" required>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/165dc4ee52.js" crossorigin="anonymous"></script>
  </body>
</html>
