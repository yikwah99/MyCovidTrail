
<nav class="navbar navbar-expand-lg navbar-light py-3 breadcrumb" style="background:rgba(255,255,255,0.0);" aria-label="breadcrumb">
  
  <a class="navbar-brand logo" href="<?php 
  if ($_SESSION['role']=="manager"){
    echo("officer-registerTestCentre.php");} 
  else if ($_SESSION['role']=="patient"){
    echo("patient-viewTest.php");}
  else{
       echo("tester-newTest.php");} ?>
  "><i class="fas fa-user-nurse mr-2"></i>MyCovidTrail</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      
      <?php if(!isset($_SESSION)){session_start();}  if($_SESSION['role']=="manager"){ ?>
      <!--Officer Navbar-->
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Manage Test Kit Stock"){echo("active");} ?>">
        <a class="nav-link" href="officer-manageTestKit.php">Manage Test Kit Stock</a>
      </li>
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Register Test Centre Officer"){echo("active");} ?>">
        <a class="nav-link" href="officer-registerOfficer.php">Register Test Centre Officer</a>
      </li>
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Register Test Centre"){echo("active");} ?>">
        <a class="nav-link" href="officer-registerTestCentre.php">Register Test Centre</a>
      </li>
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Update/View Test Report"){echo("active");} ?>">
        <a class="nav-link" href="update-view-test-report.php">Update/View Test Report</a>
      </li>
      <?php }else if ($_SESSION['role']=="patient"){ ?>
      <!--Patient Navbar-->
      <li class="nav-item <?php if ($_SESSION['currentPage']=="View Test Result"){echo("active");} ?>">
        <a class="nav-link" href="patient-viewTest.php">View Test Result</a>
      </li>
      <?php }else if ($_SESSION['role']=="tester"){ ?>
      <!--Tester Navbar-->
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Record New Test"){echo("active");} ?>">
        <a class="nav-link navbar-right" href="tester-newTest.php">Record New Test</a>
      </li>
      <li class="nav-item <?php if ($_SESSION['currentPage']=="Update/View Test Report"){echo("active");} ?>">
        <a class="nav-link" href="update-view-test-report.php">Update/View Test Report</a>
      </li>
      <?php }?>
      
      
      
      
      
    </ul>
      <a class="btn btn-outline-dark logout-btn" href="logout.php">Logout</a>
  </div>
</nav>
<nav>
  <ol class="breadcrumb" style="background:rgba(255,255,255,0.0);">
    <?php if(isset($_SESSION['secondPage'])){
      echo("<li class='breadcrumb-item active'><a href='".$_SESSION['currentPageFileName']."'>".$_SESSION['currentPage']."</a></li>");
    }
    else{
      echo("<li class='breadcrumb-item'>".$_SESSION['currentPage']."</a></li>");
    } ?>
    
    <?php if(isset($_SESSION['secondPage'])){ ?>
    <li class="breadcrumb-item"><?php echo($_SESSION['secondPage']); ?></li>
    <?php }?>
  </ol>
</nav>
