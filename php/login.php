<?php

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['submit']))
{
  include_once("database.php");
  $check = "";
  $username=$_POST['username'];
  $password=$_POST['password'];

  if($username!=''&&$password!='')
  {
    //Officer Check
    $sql = "select * from user,centreOfficer WHERE user.username='".$username."'  AND user.password='".$password."' AND user.username=centreOfficer.username;";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if(!$row){
      //Patient Check
      $patientsql = "select * from user,PATIENT WHERE user.username='".$username."'  AND password='".$password."'AND user.username=patient.username;";
      $patientresult = mysqli_query($con,$patientsql);
      $patientrow = mysqli_fetch_assoc($patientresult);
      if(!$patientrow){
        $check="Wrong Username and Password";
      }
      else{
        $_SESSION['username'] =$username;
        $_SESSION['role'] = "patient";
        $_SESSION['message']="Login Successful! Welcome to the MyCovidTrail!";
        header('location:patient-viewTest.php');
      }

    }
    else
    {
      $_SESSION['username'] =$username;
      $_SESSION['testcentre'] = $row["workplace"];
      if($row["position"]=="manager"){
        $_SESSION['role'] = "manager";
        $_SESSION['message']="Login Successful! Welcome to the MyCovidTrail!";
        header('location:officer-registerTestCentre.php');
      }
      else{
        $_SESSION['role'] = "tester";
        $_SESSION['message']="Login Successful! Welcome to the MyCovidTrail!";
        header('location:tester-newTest.php');
      }

    }


  }
  else
    $check="Username and Password must not be empty!";

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

    <title>MyCovidTrail | Login</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <a class="navbar-brand" href="#"><i class="fas fa-user-nurse mr-2"></i>MyCovidTrail</a>
    </nav>
    <!-- Main Content -->
    <div class="container">
      <div class="card m-5 mx-auto" style="width: 30rem;">
        <div class='card-body'>
          <h3 class="card-title text-center">Login</h3>
          <hr>
          <form action="#" method="post">
            <div class="form-group m-5">
              <label>Username</label>
              <input type="text" name="username" class="form-control"  placeholder="">
            </div>
            <div class="form-group m-5">
              <label>Password</label>
              <input type="password" name="password" class="form-control"  placeholder="">
            </div>
            <div class="col-md-12 text-center">
              <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg">
            </div>
          </form>

        </div>
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
