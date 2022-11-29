<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}

.h-custom {
height: calc(100% - 73px);
}

@media (max-width: 450px) {
.h-custom {
    height: 100%;
}
}

.navbar{
    background-color: #FEC00F;
}

.navbar-brand{
    text-indent: 55%;
}
        </style>
    <!-- Image and text -->
    <nav class="navbar">
  <a class="navbar-brand" href="#">
    ST. A'S ACADEMY
  </a>
</nav>
</head>

<?php
  include 'createdb.php';
?>

<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-5 col-xl-5">
        <img src="https://scontent.fmnl5-2.fna.fbcdn.net/v/t1.15752-9/316705517_805934387148397_2148962385367367905_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=ae9488&_nc_ohc=kCqTcnhl85sAX-MgiqJ&_nc_ht=scontent.fmnl5-2.fna&oh=03_AdS2WrmJGl3-OOrgOHwIjzxdOxvDXFyIl6xintTPZk6tZw&oe=63A9AEDE"
          class="img-fluid" alt="School Logo">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method='POST'>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" class="form-control form-control-lg"
              placeholder="Enter ID Number" name='IDNum' required/>
            <label class="form-label">ID Number</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="pass" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" name='check' />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>  
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>
        </form>
        <?php 
          include 'submit.php';
        ?>
      </div>
    </div>
  </div>

    
</section>
</body>

<!--foota-->
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

