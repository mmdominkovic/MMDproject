<?php
include 'includes/connect.php';
include 'includes/wallet.php';

	if($_SESSION['customer_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pizza Delicious</title>
<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>

<body style="background-color: #121618; ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  	<div id="main">
	    <span style="font-size:30px;cursor:pointer;"  onclick="openNav()">&#9776; Menu</span>
		<div class="top-bar" style="background-image: url(images/bg_pic.png); height:500px">
		<div id="logo-home" class="logo-home" style="background-image: url(images/logo.png);">
   
   </div>
   </div>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <div class="container" style="margin-right: 900px;">
			
		         <a   class="navbar-brand" href="logout.php"><i c></i> Logout</a>
           </div>
		  
	       </nav>
  	         <a href="index.php">Home</a>
			 <a href="orderbag.php">Order food</a>
			 <a href="user-details.php">Edit details</a>
             <a href="orders.php">My orders</a>
      
      </div>
</div>
<div class="container-wrap" style="margin: auto; padding: 10px;">
    		<div class="row no-gutters d-flex">
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-1.jpg);"></a>
    					<div class="text p-4">
    						<h3>Italian Pizza</h3>
    						<p>Authentic Italian pizza are based with fresh tomato sauce,dior di latte cheese and some fresh oregano and basil.</p>
    						<p class="price"><span>$10.10</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-2.jpg);"></a>
    					<div class="text p-4">
    						<h3>Greek Pizza</h3>
    						<p>Greek pizza featuring feta, roasted red peppers, artichokes, olive and basil!</p>
    						<p class="price"><span>$13.99</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-3.jpg);"></a>
    					<div class="text p-4">
    						<h3>Margherita</h3>
    						<p>Pizza Margherita is a typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt and extra-virgin olive oil. Traditionally, it is made with fior di latte.</p>
    						<p class="price"><span>$10.40</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img order-lg-last" style="background-image: url(images/pizza-4.jpg);"></a>
    					<div class="text p-4">
    						<h3>Salami Pizza</h3>
    						<p>This pizza is topped with authentic Italian salami, peppers, and Parmesan cheese for your favorite pizza night.</p>
    						<p class="price"><span>$13.90</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img order-lg-last" style="background-image: url(images/pizza-5.jpg);"></a>
    					<div class="text p-4">
    						<h3>Mediterranean sardine pizza</h3>
    						<p>Little bit different, this Mediterranean pizza would rock you with sardines, onions, kalamata olives and fresh baby spinach leaves.</p>
    						<p class="price"> <span>$11.50</span><a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a>
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
    						<p class="price"><span>$12.90</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
          </div>
          <div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-7.jpg);"></a>
    					<div class="text p-4">
    						<h3>Three-Pepper Pizza</h3>
    						<p>Wanna boosts your veggie intake? This pizza is topped with three kinds of bell peppers,onions and tomato paste.</p>
    						<p class="price"><span>$10.15</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-8.jpg);"></a>
    					<div class="text p-4">
    						<h3>Buffalo Chicken pizza</h3>
    						<p>Classic Buffalo pizza made with homemade Buffalo ranch and grilled chicken.</p>
    						<p class="price"><span>$10.90</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
          </div>
          <div class="col-lg-4 d-flex ftco-animate">
    				<div class="services-wrap d-flex">
    					<a href="orderbag.php" class="img" style="background-image: url(images/pizza-9.jpg);"></a>
    					<div class="text p-4">
    						<h3>Hawaiian</h3>
    						<p>If you have exotic taste this Hawaiian pizza topped with Canadian bacon and pineapple is just for you.</p>
    						<p class="price"><span>$8.99</span> <a href="orderbag.php" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
		<div class="divider"></div>
<footer class="page-footer font-small blue">

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2019 Copyright:
  <p>Marija Magdalena Dominkovic</p>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->


   
<script type="text/javascript" src="js/mainjs.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin-page.php");		
		}
		else{
			header("location:mojindex.php");
		}
	}
?>