<!DOCTYPE html>
<html>
<head>
<title>My details</title>
<link rel="stylesheet" href="style.css" type="text/css">
<style>
table,tr,th,td{
border:1px solid palegreen;
color:white;
box-shadow:4px 4px 4px black;
}
table,tr,th{

}
table,tr,td{
color:palegreen;
}
.cent{
margin:0px auto;
margin-left:280px;
}
</style>
</head>
<body>
<div class="header1">
<div class="showcase">
<img src="img/dominion.jpg" alt="logo" class="logo2"><h1 style="font-family:poppins;">DOMINION ACADEMY</h1>
<P>SCHOOL OF DEVELOPERS <span class="comp">:</span></P><br/>
</div>
</div>
<div class="header">
<h1>MY DETAILS</h1>

</div>

<div class="cent">
<table>
<tr>
<th>Id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Phone</th>
<th>Email</th>
<th>Faculty</th>
<th>Department</th>
<th>Matric No.</th>
<th>Password</th>
</tr>


<?php
 

$con= mysqli_connect("localhost", "root", "", "games");

$set= $_POST['search'];

if($set){


$set= $_POST['search'];
if(empty($set)){
 $_SESSION['email']= $set;
  $_SESSION['success']= "You are now logged in";
  header('location: check.php');
  //redirect to homepage


}else{
$show= "SELECT * FROM `users` WHERE `matric No`='$set'";
$result= mysqli_query($con, $show);
while($rows= mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>";
echo $rows['id'];
echo "<td>";
echo $rows['firstname'];
echo "</td>";
echo "<td>";
echo $rows['lastname'];
echo "</td>";
echo "<td>";
echo $rows['phone'];
echo "</td>";
echo "<td>";
echo $rows['email'];
echo "</td>";
echo "<td>";
echo $rows['faculty'];
echo "</td>";
echo "<td>";
echo $rows['department'];
echo "</td>";
echo "<td>";
echo $rows['matric No'];
echo "</td>";
echo "<td>";
echo $rows['password'];
echo "</td>";
echo "<td>";
echo "<br/>";
}
}
}
?>

</table>
</div>
<div class="go-back">
<button style="color:green;width:120px;height:70px;font-size:19px;border-radius:16px;border-top-right-radius:0px;border-bottom-left-radius:0px;margin-left:10px; background:white;"><a href="homepage.php" style="text-decoration:none;color:green;">Go Back<span class="hand">C</span></a></button>
</div>


<footer class="footer">
<h6 style="text-align:center;margin-top:206px;border-top:3px solid white;color:white; background:black;opacity:0.6; padding:20px;">Dominion Academy Copyright &copy; 2018. <br/> Designed By <span class="hand" style="font-size:26px;">9</span>OLAXWEB KONCEPT</h6>
</footer>
  


</body>
</html>    
  