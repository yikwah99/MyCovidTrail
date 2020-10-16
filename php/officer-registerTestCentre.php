<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>MyCovidTrail | Register Test Centre</title>
    <?php
    function OpenCon()
    {
      $dbhost = "localhost";
      $dbuser = "ctisAdmin";
      $db = "CTIS";

      $conn = new mysqli($dbhost, $dbuser, $db) or die ("Connect failed : %s\n". $conn -> error);

      return $conn;
    }

    function CloseCon($conn)
    {
      $conn -> close();
    }

    ?>

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

        <form action="welcome.php" method="post" style="padding:50px">
          <div class="row">
            <div class ="column" style="margin:20px">
              Username: <input type="text" name="Username";><br>
            </div>
            <div class ="column" style="margin:20px;">
              Landline : <input type="text" name="landline"><br>
            </div>
          </div>
          <div class="row">
            <div class ="column" style="margin:20px; width: 100%;">
              Address : <input type="text" name="address" style="width:35%"><br>
            </div>
          </div>
          <div class="row">
            <div class ="column" style="margin:20px;">
              Postal Code : <input type="text" name="address"><br>
            </div>
            <div class ="column" style="margin:20px;">
              State : <input type="text" name="address"><br>
            </div>
          </div>
            <input type="submit">
        </form>
    </div>
  </body>
</html>
