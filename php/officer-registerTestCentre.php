<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>MyCovidTrail | Register Test Centre</title>

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

        <div class="container">
          <div class="card m-5">
            <div class='card-body'>
              <h3 class="card-title text-center">Manage TestKit Stock</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Result Date</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Test Type</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Test Date</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Symptoms</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tester</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Test Centre</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Test Result</label>
                    <input type="text" class="form-control"  placeholder="" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
