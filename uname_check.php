
<?php
include ("../includes/connect.php");

$uname = $_POST['uname'];

// Check username
$query = "select count(*) as cntUser from users where username='".$uname."'";

$result = mysqli_query($con,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

// Return total rows found
echo $count;