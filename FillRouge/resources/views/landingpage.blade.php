<!DOCTYPE html>


<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Pharmacy | Home</title>
  <!-- 
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="One page parallax responsive HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="best_group">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/photos/favicona.png" />
  <!-- bootstrap.min css -->
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>



<body id="body">

<header class="navigation fixed-top">
  <div class="container ">
    <!-- main nav -->
    <nav class="navbar navbar-expand-lg navbar-light px-0">
      <!-- logo -->
      <a class="navbar-brand logo" href="#">
        <img loading="lazy" class="logo-white" src="/img/logo.png" alt="logo" style="width:120px"/>
      </a>
      <!-- /logo -->
	  <div class="btn-group dropstart ">
      <button class="navbar-toggler" type="button"  type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="dropdown-menu bg-white mt-5" style="min-width: 100vw;" >
		<li class="nav-item " style="margin-left: 60px;">
            <a class="nav-link" style="color:#007A69" href="about.html">About Us</a>
          </li>
          <li class="nav-item " style="margin-left: 60px;margin-top: 10px;margin-bottom: 10px;">
            <a class="nav-link" style="color:#007A69" href="service.html">Services</a>
          </li >
          <li class="nav-item " style="margin-left: 60px;">
            <a class="nav-link"style="color:#007A69" href="portfolio.html">Portfolio</a>
          </li>
	  </ul>
	  </div>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto text-start ms-5">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Features
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else </a></li>
          </ul>
        </li>
          <li class="nav-item ">
            <a class="nav-link" href="about.html">Pricing</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="service.html">Community</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="portfolio.html">Support</a>
          </li>
        </ul>
      </div>
	  <button type="button"   class="login btn btn-outline-success py-1" style="min-width:100px;border-color:white; color:white;">Login</button>
	  <button type="button"  class="login btn ms-3 py-1" style="min-width:100px;background-color:#007A69;color:white;">Register</button>
    </nav>
    <!-- /main nav -->
  </div>
</header>
<!--End Fixed Navigation -->
<div class="hero-slider">
	<div class="slider-item th-fullpage hero-area" style="background-image:url(/img/phar2.png) ;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Welcome to Our Pharmacy  <br>
						System Management</h1>
					<p>comment est la santé aujourdui, on dirait qu’elle n’est pas bonne !<br> Nevous inquiétez pas. Trouvez votre médcin en ligneRéservez comme vous le souhaitez avec YoucCode Doc.<br> Nous vous offrons un service gratuit de canalisation de médcin, prenez votre rendez-vous maintenant. 
						</p>
					<a class="btn btn-success"
						href="service.html">Discover Pharmacies</a>
				</div>
			</div>
		</div>
	</div>
	<div class="slider-item th-fullpage hero-area" style="background-image:url(/img/phar.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 >We Combine Healthey <br> and
						Safty</h1>
					<p >Create just what you need
						for your Perfect Website. Choose from a wide range
						<br> of Elements & simply put them on our Canvas.</p>
					<a  class="btn btn-success"
						href="service.html">Explore Us</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--
Start About Section
==================================== -->
<section class="service-2 section">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-lg-6">
        <!-- section title -->
        <div class="title text-center">
          <h2>What Do We Offer</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Voluptates, earum. </p>
          <div class="border"></div>
        </div>
        <!-- /section title -->
      </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>