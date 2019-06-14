<?php
include 'includes/connect.php';
include 'includes/wallet.php';
$continue=0;
$total = 0;
if($_SESSION['customer_sid']==session_id())
{
		if($_POST['payment_type'] == 'Wallet'){
		$_POST['cc_number'] = str_replace('-', '', $_POST['cc_number']);
		$_POST['cc_number'] = str_replace(' ', '', $_POST['cc_number']); 
		$_POST['cvv_number'] = (int)str_replace('-', '', $_POST['cvv_number']);
		$sql1 = mysqli_query($con, "SELECT * FROM wallet_details where wallet_id = $wallet_id");
		while($row1 = mysqli_fetch_array($sql1)){
			$card = $row1['number'];
			$cvv = $row1['cvv'];
			if($card == $_POST['cc_number'] && $cvv==$_POST['cvv_number'])
			$continue=1;
			else
				header("location:index.php");
		}
		}
		else
			$continue=1;
}

$result = mysqli_query($con, "SELECT * FROM users where id = $user_id");
while($row = mysqli_fetch_array($result)){
	$name = $row['name'];
	$contact = $row['contact'];
}

if($continue){
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Pizza Delicious</title>

<link href="images/logo.png" rel="icon" type="image/x-icon"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/mojstyle.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 
 
</head>

<body style="background-color: #121618; ">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  	<div id="main">
	    <span style="font-size:30px;cursor:pointer " onclick="openNav()">&#9776; Menu</span>
    </div>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	        <div class="container" style="margin-right: 900px;">
		         <a class="fa fa-sign-out" class="navbar-brand" href="logout.php"><i c></i> Logout</a>
           </div>
	       </nav>
         <a href="index.php">Home</a>
			 <a href="orderbag.php">Order food</a>
			 <a href="user-details.php">Edit details</a>
             <a href="orders.php">My orders</a>
      </div>
</div>
  <!-- START CONTENT -->
  <section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Provide Order Details</h5>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->


<!--start container-->
<div class="container"style=" margin: auto; width: 40%; padding: 10px;">
  <p class="caption">Receipt</p>
  <div class="divider"></div>
  <!--editableTable-->
<div id="work-collections" class="section">
<div class="row">
<div>
<ul id="issues-collection" class="list-group list-group-flush" style="background-color: #818181;">
<?php
  echo '<li class="list-group-item">
<p><strong>Name:</strong>'.$name.'</p>
<p><strong>Contact Number:</strong> '.$contact.'</p>
<p><strong>Address:</strong> '.htmlspecialchars($_POST['address']).'</p>	
<p><strong>Payment Type:</strong> '.$_POST['payment_type'].'</p>';

foreach ($_POST as $key => $value)
{
if(is_numeric($key)){		
$result = mysqli_query($con, "SELECT * FROM items WHERE id = $key");
while($row = mysqli_fetch_array($result))
{
    $price = $row['price'];
    $item_name = $row['name'];
    $item_id = $row['id'];
}
    $price = $value*$price;
    echo '<li class="list-group-item">
    <div class="row">
    <div class="col s7">
        <p class="collections-title"><strong>#'.$item_id.' </strong>'.$item_name.'</p>
    </div>
    <div class="col s2">
        <span>'.$value.' Pieces</span>
    </div>
    <div class="col s3">
        <span>Rs. '.$price.'</span>
    </div>
</div>
</li>';
$total = $total + $price;
}
}
echo '<li class="list-group-item">
<div class="row">
    <div class="col s7">
        <p class="collections-title"> Total</p>
    </div>
    <div class="col s2">
        <span>&nbsp;</span>
    </div>
    <div class="col s3">
        <span><strong>Rs. '.$total.'</strong></span>
    </div>
</div>
</li>';
if(!empty($_POST['description']))
echo '<li class=""><p><strong>Note: </strong>'.htmlspecialchars($_POST['description']).'</p></li>';
if($_POST['payment_type'] == 'Wallet')
echo '<div id="basic-collections" class="list-group-item">
<div class="row"style=" margin-bottom: 0; margin-left: -0.75rem; margin-right: -0.75rem; flex-direction: row; display: block;">
    <div class="collection">
        <a href="#" class="list-group-item">
            <div class="row"><div class="col s7">Current Balance</div><div class="col s3">'.$balance.'</div></div>
        </a>
        <a href="#" class="list-group-item active">
            <div class="row"><div class="col s7">Balance after purchase</div><div class="col s3">'.($balance-$total).'</div></div>
        </a>
    </div>
</div>
</div>';
?>
<form action="routers/order-router.php" method="post">
<?php
foreach ($_POST as $key => $value)
{
if(is_numeric($key)){
echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
}
}
?>
<input type="hidden" name="payment_type" value="<?php echo $_POST['payment_type'];?>">
<input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']);?>">
<?php if (isset($_POST['description'])) { echo'<input type="hidden" name="description" value="'.htmlspecialchars($_POST['description']).'">';}?>
<?php if($_POST['payment_type'] == 'Wallet') echo '<input type="hidden" name="balance" value="<?php echo ($balance-$total);?>">'; ?>
<input type="hidden" name="total" value="<?php echo $total;?>">

<div class="list-group-item">
<button class="btn btn-danger" type="submit" name="action" <?php if($_POST['payment_type'] == 'Wallet') {if ($balance-$total < 0) {echo 'disabled'; }}?>>Confirm Order
<i class="fa fa-ban" aria-hidden="true"></i>
</button>
</div>
</form>
</ul>


        </div>
        </div>
        </div>
      </div>
    </div>
</div>
<!--end container-->

</section>
<!-- END CONTENT -->
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
<script type="text/javascript">
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