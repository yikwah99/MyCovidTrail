<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include_once("database.php");
if($_SESSION['role']=="manager"){
  $testListResult=mysqli_query($con,"SELECT * FROM covidtest WHERE location='".$_SESSION['testcentre']."';");
  
}
else{
  $testListResult=mysqli_query($con,"SELECT * FROM covidtest WHERE tester='".$_SESSION['username']."';");
  //foreach($testListResult as $testListRow)
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
    <title>MyCovidTrail | View Test Report</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <!-- Main Content -->
    <h3 class="text-center">Existing Covid-19 Test List</h3>
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tester</th>
            <th scope="col">Test ID</th>
            <th scope="col">Test Kit ID</th>
            <th scope="col">Test Date</th>
            <th scope="col">Result</th>
            <th scope="col">Result Date</th>
            <th scope="col">Patient</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
          <?php
          $j=0;
          if (mysqli_num_rows($testListResult)>0){
          foreach($testListResult as $testListRow){ ?>
          <tr>
            <th scope="row"><?php echo($j+1) ?></th>
            <td><?php echo $testListRow["tester"]; ?></td>
            <td><?php echo $testListRow["testID"]; ?></td>
            <td><?php echo $testListRow["kitID"]; ?></td>
            <td><?php echo $testListRow["testDate"]; ?></td>
            <td><?php echo $testListRow["result"]; ?></td>
            <td><?php echo $testListRow["resultDate"]; ?></td>
            <td><?php echo $testListRow["recipient"]; ?></td>
            <td><?php echo $testListRow["status"]; ?></td>
            
            <td>
              <!--<button type="button" class="btn btn-dark">New Test</button>-->
              <a class="btn btn-dark" href='<?php 
              if($testListRow["status"]=="pending"){
                echo ("update-test-report-form.php?test=".$testListRow["testID"]);
              }
              else{
                echo ("view-test-report-form.php?test=".$testListRow["testID"]);
              }
              ?>'>
                <?php if($testListRow["status"]=="pending"){echo("Update");}
                else{echo("View");}
                ?>
              </a>
            </td>
          </tr>
          <?php    
          $j++;}}
          else{
            echo"<td colspan='10'>No Record Found</td>";
          }
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