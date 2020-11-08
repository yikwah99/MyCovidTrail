<?php
if(!isset($_SESSION))
{
    session_start();
}
$_SESSION['currentPage']="Manage Test Kit Stock";
$_SESSION['currentPageFileName']="officer-manageTestKit.php";
unset($_SESSION["secondPage"]);
include_once("database.php");
  $testKitResult = mysqli_query($con, "SELECT * FROM testkit WHERE location='".$_SESSION['testcentre']."';");
include_once("alert.php");
if(isset($_POST['submit'])){
  $testKitCheck =  "select * from testkit where testkit.testName = '".$_POST['tkName']."';";
  $testKitCheckRow = mysqli_num_rows(mysqli_query($con,$testKitCheck));
  if ($testKitCheckRow>0) {
      $_SESSION['errormessage']="The TestKit '".$_POST['tkName']."' already exists! Update its Available Stock below instead!";
  }
  else{
    $testKitInsertSql="INSERT INTO `testkit` (`kitID`, `testName`, `availableStock`, `location`) VALUES ('".uniqid("TK")."', '".$_POST['tkName']."', '".$_POST['availableStock']."', '".$_SESSION['testcentre']."');";
    mysqli_query($con,$testKitInsertSql);

    $_SESSION['message']="New TestKit '".$_POST['tkName']."' added for ".$_SESSION['testcentre']."!";
  }
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

    <title>MyCovidTrail | Manage Test Kit</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>

    <div class="container">
      <div class="card m-5">
        <form method="POST" action="#">
          <div class='card-body'>
            <h3 class="card-title text-center">Manage Test Kit Stock</h3>
            <h4 class=" text-center">Tester Account Details</h4>
            <div class="row border" style="border:10px; padding-top: 10px">
              <div class="col-md-12">
                <div class="form-group">
                  <label><strong>Test Kit Name</strong></label>
                  <input type="text" name="tkName" class="form-control"  placeholder="eg. Antigen Test" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><strong>Available Stock</strong></label>
                  <input type="number" name="availableStock" class="form-control"  placeholder="00" required>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <input type="submit" name="submit" value="Add" class="btn btn-primary btn-lg" style="margin-bottom:10px">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <h3 class="text-center my-4">Existing Covid-19 Test List</h3>
      <div class="table-responsive" style="padding:15px;">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Test Kit ID</th>
              <th scope="col">Test Name</th>
              <th scope="col">Available Stock</th>
              <th scope="col">Test Centre Location</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $j=0;
            while($testKitRow=mysqli_fetch_array($testKitResult)){ ?>
            <tr>
              <th scope="row"><?php echo($j+1) ?></th>
              <td><strong><?php echo $testKitRow["kitID"]; ?></strong></td>
              <td><strong><?php echo $testKitRow["testName"]; ?></strong></td>
              <td><strong><?php echo $testKitRow["availableStock"]; ?></strong></td>
              <td><strong><?php echo $testKitRow["location"]; ?></strong></td>

              <td>
                <!--<button type="button" class="btn btn-dark">New Test</button>-->
                <a class="btn btn-dark" href='officer-UpdateTestKitStock.php?testName=<?php echo $testKitRow["testName"]; ?>'><strong>Update Stock</strong></a>
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
