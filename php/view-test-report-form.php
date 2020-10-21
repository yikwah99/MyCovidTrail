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
                    foreach($testkitResult as $testKitRow){
                    //while($testKitRow=mysqli_fetch_array($testkitResult)){
                      ?>
                      <option value="<?php echo $testKitRow["kitID"]; ?>"><?php echo $testKitRow["kitID"]; ?></option>
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
              <div class="col-md-12 text-center">
                <input type="submit" name="submit" value="Register" class="btn btn-dark">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
