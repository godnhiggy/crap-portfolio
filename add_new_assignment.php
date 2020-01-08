<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_back_office.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login_back_office.php");
  }
function redirect() {
   header("location: website_back_office.php");
} 
?>
<html>
    <head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
body {background-color: powderblue; text-align: center;}
h1   {color: blue; text-align: center;}
p    {color: red; text-align: center;}
table {width: 100%;}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th, td {width: 25%}

div1 {
  width: 500px;
  height: 300px;
  background-color: red;
  position: relative;
  -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
  -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
  animation-name: example;
  animation-duration: 4s;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  25%  {background-color:yellow; left:200px; top:0px;}
  50%  {background-color:blue; left:200px; top:200px;}
  75%  {background-color:green; left:0px; top:200px;}
  100% {background-color:red; left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
  0%   {background-color:red; left:0px; top:0px;}
  25%  {background-color:yellow; left:200px; top:0px;}
  50%  {background-color:blue; left:200px; top:200px;}
  75%  {background-color:green; left:0px; top:200px;}
  100% {background-color:red; left:0px; top:0px;}
}

</style>

</head>
<Body>
<h1>Elevate U</h1>

<div>
<?php
ob_start();
//login into DB
$servername = "localhost";
$username = "bjekqemy_higgy";
$password = "Brett73085";
$dbname = "bjekqemy_gradingsystem";

 //Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
 //Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$newessayname = $_POST["newessayname"];
$requiredwords = $_POST["numberofwords"];

if (isset($newessayname)) 
{

$sql = "INSERT INTO essaylist (essayname, numberofwords)
VALUES ('$newessayname', '$requiredwords')";
$result = $conn->query($sql);
}

if (isset($newessayname))
{
?>         
<a href='/website_back_office.php'>Return to Back Office</a>;
<?php
echo"<br>";
echo "This appears to be working";
echo "<br>";
echo "new essay name: " .$newessayname;
echo "<br>";
echo "new number of required words: " .$requiredwords;
}  

//$conn->close();
?> 

</div>
 
</body>
</html>