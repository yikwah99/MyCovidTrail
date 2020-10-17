<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <a class="navbar-brand" href="#"><i class="fas fa-user-nurse mr-2"></i>MyCovidTrail</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <?php session_start(); if($_SESSION['role']=="manager"){ ?>
      <!--Officer Navbar-->
      <li class="nav-item active">
        <a class="nav-link" href="officer-manageTestKit.php">Manage Test Kit Stock</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="officer-registerOfficer.php">Register Test Centre Officer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="officer-registerTestCentre.php">Register Test Centre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-view-test-report.php">Update/View Test Report</a>
      </li>
      <?php }else if ($_SESSION['role']=="patient"){ ?>
      <!--Patient Navbar-->
      <li class="nav-item">
        <a class="nav-link" href="patient-viewTest.php">View Test Result</a>
      </li>
      <?php }else{ ?>
      <!--Tester Navbar-->
      <li class="nav-item">
        <a class="nav-link" href="tester-newTest.php">Record New Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-view-test-report.php">Update/View Test Report</a>
      </li>
      <?php }?>
      
      
      
      
      <li class="nav-item">
        <a class="nav-link navbar-right" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>