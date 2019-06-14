<?php 
session_start(); 
if(isset($_SESSION['admin_sid']) || isset($_SESSION['customer_sid']))

{
	header("location:index.php");
}
else{ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Pizza Delicious</title>
<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="style/flaticon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$('#myCarousel').on('slide.bs.carousel', function () {
	$('.carousel').carousel({
  interval:20
})

})</script>
</head>

<body style="background-image: url(images/bg_4.jpg); ">
<div class="top-bar" style="background-image: url(images/bg_pic.png);  ">
	<div class="logo-home" style="background-image: url(images/logo.png)"> 
    </div>
    <div class="button-container">
       <div class="button-flipper">
        <button class="front-button">Start my order</button>
        <button id="myBtn" class="back-button">Log In</button>
      </div>
    </div>
    	<div class="modal" id="myModal"style="background-color: transparent; background-color: rgba(0,0,0,0.8);" >
          <!-- Modal content -->
  			<div class="modal-content"style="background-color: transparent; background-color: rgba(0,0,0,0.7);">
   				<div class="container">
	 				<div class="d-flex justify-content-center h-100">
						<div class="card" >
							<div class="card-header"style=" background: rgba(0, 0, 0, 0.9); ">
							<span style="color:white;"class="close">&times;</span>
							<h3 style="text-align: center; color:white">Log In</h3>
							</div>
							<div class="card-body" style=" background: rgba(0, 0, 0, 0.4);">
								<form method="post" action="routers/router.php" class="login-form" id="form">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"style="background-color:white"><i class="fas fa-user" style="background-color:white"></i></span>
										</div>
										<input in="username" name="username" type="text" class="form-control" placeholder="username">
						
									</div>
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"style="background-color:white"><i class="fas fa-key"style="background-color:white"></i></span>
										</div>
										<input name="password" id="password" type="password" class="form-control" placeholder="password">
									</div>
								 <div class="form-group">
									<input href="javascript:void(0);" onclick="document.getElementById('form').submit();"type="submit" value="Login" class="ml-2 btn btn-white btn-outline-white">
								 </div>
								</form>
			                 </div>
			                 <div class="card-footer"style=" background: rgba(0, 0, 0, 0.9);">
								<div class="d-flex justify-content-center links">Don't have an account?<a href="mojregister.php">Sign Up</a>
							 </div>
			             </div>
		             </div>
	             </div>
             </div>
         </div>
 </div>
 </div>
<br>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
	  <img style="background-image: url(images/about.jpg) ; width:4400px; height:550px;" class="d-block w-100">
	  <div class="carousel-caption d-none d-md-block">
	    <h2 style="font-size:50px" class="mb-4"> Welcome to <span class="flaticon-pizza">Pizza</span> Delicious</h2>
		<p style="font-size:35px">Dont be afraid to try best pizza in town!</p>
	  </div>
</div>
    <div class="carousel-item">
	  <img style="background-image: url(images/gallery-3.jpg); width:4400px; height:550px;" class="d-block w-100">
	  <div class="carousel-caption d-none d-md-block">
	    <h2 style="font-size:50px" class="mb-4"> Welcome to <span class="flaticon-pizza">Pizza</span> Delicious</h2>
		<p style="font-size:35px">Meet our lovely employees!</p>
	  </div>
	  </div>
    <div class="carousel-item">
	  <img style="background-image: url(images/gallery-4.jpg); width:4400px; height:550px;" class="d-block w-100">
	  <div class="carousel-caption d-none d-md-block">
	    <h2 style="font-size:50px" class="mb-4"> Welcome to <span class="flaticon-pizza">Pizza</span> Delicious</h2>
		<p style="font-size:35px">Enjoy in good company!</p>
	  </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
</div>
 



<br>


	<div class="container-wrap" style="margin: auto; padding: 10px;">
    		<div class="row no-gutters d-flex">
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-1.jpg);"></a>
    					<div class="text p-4">
    						<h3>Italian Pizza</h3>
    						<p>Authentic Italian pizza are based with fresh tomato sauce,dior di latte cheese and some fresh oregano and basil.</p>
    						<p class="price"><span>$10.10</span></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-2.jpg);"></a>
    					<div class="text p-4">
    						<h3>Greek Pizza</h3>
    						<p>Greek pizza featuring feta, roasted red peppers, artichokes, olive and basil!</p>
    						<p class="price"><span>$13.99</span></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-3.jpg);"></a>
    					<div class="text p-4">
    						<h3>Margherita</h3>
    						<p>Pizza Margherita is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt and extra-virgin olive oil. Traditionally, it is made with fior di latte.</p>
    						<p class="price"><span>$10.40</span></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img order-lg-last" style="background-image: url(images/pizza-4.jpg);"></a>
    					<div class="text p-4">
    						<h3>Salami Pizza</h3>
    						<p>This pizza is topped with authentic Italian salami, peppers, and Parmesan cheese for your favorite pizza night.</p>
    						<p class="price"><span>$13.90</span></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img order-lg-last" style="background-image: url(images/pizza-5.jpg);"></a>
    					<div class="text p-4">
    						<h3>Mediterranean sardine pizza</h3>
    						<p>Little bit different, this Mediterranean pizza would rock you with sardines, onions, kalamata olives and fresh baby spinach leaves.</p>
    						<p class="price"> <span>$11.50</span>
                </p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img order-lg-last" style="background-image: url(images/pizza-6.jpg);"></a>
    					<div class="text p-4">
    						<h3>White Pizza</h3>
    						<p>Don't like tomato sauce? Don't worry, we got your back. This garlic dough pizza topped with mozzarella and Taleggio cheese would kick your tongue buds.</p>
    						<p class="price"><span>$12.90</span> </p>
    					</div>
    				</div>
          </div>
          <div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-7.jpg);"></a>
    					<div class="text p-4">
    						<h3>Three-Pepper Pizza</h3>
    						<p>Wanna boosts your veggie intake? This pizza is topped with three kinds of bell peppers,onions and tomato paste.</p>
    						<p class="price"><span>$10.15</span> </p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-8.jpg);"></a>
    					<div class="text p-4">
    						<h3>Buffalo Chicken pizza</h3>
    						<p>Classic Buffalo pizza made with homemade Buffalo ranch and grilled chicken.</p>
    						<p class="price"><span>$10.90</span> </p>
    					</div>
    				</div>
          </div>
          <div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-9.jpg);"></a>
    					<div class="text p-4">
    						<h3>Hawaiian</h3>
    						<p>If you have exotic taste this Hawaiian pizza topped with Canadian bacon and pineapple is just for you.</p>
    						<p class="price"><span>$8.99</span></p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
		<div class="divider"></div>
<footer class="page-footer font-small blue" style="background-color:black;">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <p>Marija Magdalena Dominkovic</p>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->

			
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/mainjs.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 

  

</body>
</html> <?php }