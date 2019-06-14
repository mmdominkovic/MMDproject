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
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" type="text/css" href="style/registerstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 


</head>

<body style="background-image: url(images/bg_4.jpg); ">
<div class="top-bar" style="height:900px; background-image: url(images/bg_pic.png);">
<div class="logo-home" style="background-image: url(images/logo.png)">
    
    </div>
<div class="col-md-4 col-md-offset-4" id="login">
						<section id="inner-wrapper" class="login">
							<article>
                            <form class="formValidate" id="formValidate" method="post" action="routers/register-router.php" novalidate="novalidate">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"> </i></span>
											<input  name="username" id="username"type="text" class="form-control" placeholder="Username">
							
                                                 </div>
									</div>
                                    <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"> </i></span>
											<input name="name" id="name" type="text" class="form-control" placeholder="Name">
										</div>
									</div>
                                    <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input name="password" id="password" type="password" class="form-control" placeholder="Password">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-mobile"> </i></span>
											<input name="phone" id="phone" type="number" class="form-control" placeholder="Phone number">
										</div>
									</div>
									
                                    
									  <button name="register" a href="javascript:void(0);" onclick="document.getElementById('formValidate').submit();" type="submit" class="btn btn-success btn-block">Submit</a></button>
                                      <div class="d-flex justify-content-center links">
					Already have an account?<a href="mojindex.php">Log In</a>
				</div>
                                    </form>
							</article>
						</section></div>
    
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


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mainjs.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>
</html> <?php }