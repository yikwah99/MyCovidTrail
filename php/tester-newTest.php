<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>MyCovidTrail | Add New Test</title>
  </head>
  <body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>
    <!-- Main Content -->
    <div class="container">
      <div class="card m-5">
        <div class='card-body'>
          <h3 class="card-title text-center">Record New Covid-19 Test</h3>
          <h4 class=" text-center">Patient Detail</h4>
          <div class="row border" style="border:10px;">
            <div class="col-md-4">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>IC No./Passport No.</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Emergency Contact</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
          </div>
          <h4 class=" text-center">Test Detail</h4>
          <div class="row border" style="border:10px;">
            <div class="col-md-4">
              <div class="form-group">
                <label>Test Centre Name</label>
                <input type="text" class="form-control"  placeholder="" disabled>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Symptoms</label>
                <input type="text" class="form-control"  placeholder="" >
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mx-5">
                <p>Patient Type:</p>
                <select id="inputState" class="form-control">
                  <option selected>Returnee</option>
                  <option>Quarantined</option>
                  <option>Close contact</option>
                  <option>Infected</option>
                  <option>Suspected</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 text-center">
              <input type="submit" class="btn btn-primary btn-lg">
            </div>
          </div>
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