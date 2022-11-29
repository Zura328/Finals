<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>



</head>
<?php
  $servername = 'localhost';
  $username = 'root';
  $db = 'finals';
  $password = '5656';
  $conn = new mysqli($servername, $username, $password,$db);
  session_start();
  $IDNum=$_SESSION["IDNum"];
  $query = mysqli_query($conn,"SELECT * FROM Teachers WHERE teach_id='$IDNum'");
  $row = $query->fetch_assoc();
  $SchoolId = $row['teach_id'];
  $Section = "TB3" . $IDNum-999;
?>

<?php
  $sql = "SELECT * FROM Students WHERE teach_id='$IDNum'";
  $result = $conn->query($sql);
  $count=1;
  // output data of each row
  while($row = $result->fetch_assoc()) {
  if(isset($row["School_id"])){
     $_SESSION["StudNum"]=$row["School_id"];
     header("admin_specific_view.php");
  }
  }
?>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i> </div> <h3 > ST. A'S ACADEMY</h3>
        <div class="header_img"> <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Student Portal</span> </a>
                <div class="nav_list"> 
                <a href="admin_home.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Home</span> </a> 
                <a href="admin_view.php" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">View Grade</span> </a> 
                <a href="edit_grades.php" class="nav_link active"> <i class='bx bx-edit' ></i> <span class="nav_name">Edit Grades</span> </a> 
              </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>




    <!--Container Main start-->
    <div class="height-75 bg-light">
    

    <table class="table">
    <h3>Students </h3>
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Section</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
    $sql = "SELECT * FROM Students WHERE teach_id='$IDNum'";
    $result = $conn->query($sql);
    $count=1;
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
      $counter = "S_".$row["School_id"];
      $FullName = $row['fname'] .' '. $row['mname'].' '. $row['lname'];
        echo 
        "
        <form action='edit_action.php' method='post'>
        <tr>
        <th scope='row'>$count</th>
        <td><button type='submit' class='btn btn-link border-0' name='$counter'>$FullName</button></td>
        <td>$Section</td>
      </tr>
      
    </form>
      ";
      $count++;
    }
    ?>
  </tbody>
</table>



    </div>
    <!--Container Main end-->







    <footer class="text-center text-lg-start bg-white text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fa fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>ST. A's Academy
          </h6>
          <p>
          We are committed to providing a positive learning environment that advocates considerate, responsible, and emotionally healthy behaviors. Each individual student will feel a part of the Central community, which promotes positive behavioral development.
          </p>
        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fa fa-home me-3 text-secondary"></i> Doroteo Jose, Avenida 123</p>
          <p>
            <i class="fa fa-envelope me-3 text-secondary"></i>
            A'sA'sbebi@example.com
          </p>
          <p><i class="fa fa-phone me-3 text-secondary"></i> + 63 908 6763 287</p>
          <p><i class="fa fa-print me-3 text-secondary"></i> + 63 906 1123 432</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">A's A's Baby</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>

