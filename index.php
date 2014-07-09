<html>
<head>
<title>Treasure hunt</title>
<link rel="stylesheet" href="css/main.css"/>
<script src="js/main.js"></script>
</head>
<body>
<section class="first">
<div class="tex">
<img src="img\mkmk.png" />
</div>
<section class="dropdown">

<?php
include("php/dropdown.php");
?>

</section>

<div class="ml">
<a href="">HOME</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="php\signup.php">SIGN UP</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#second">DASHBOARD</a>
</div>
<div class="header_text">
Here we compete to Win
</div>
<div class="lower_text">
Here we compete to Win<br/>
titgmtimg
</div>
<div class="register" onclick="window.location='php\/signup.php'">
Register Here
</div>
</section>

<section id="second" class="second">
<div class="tab">
<br/><br/><br/>
<table id="tab">

<?php

require("php\connect.php");
$query="Select * from userscore order by score desc;";
$result=mysql_query($query);
echo "<tr><th id='user'>Username</th><th id='score'>Score</th></tr>";
$i=0;
while($res=mysql_fetch_array($result))
{
	echo "<tr><td>".$res['user']."</td><td>".$res['score']."</td></tr>";
	$i++;
	if($i==10)
	break;
}

?>

</table>

</div>


</section>

<section class="third" id="third">

<div class="form1">
<form method="post" action="">
Enter your name :&nbsp;
<input type="text" name="name"><br/>
Enter email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="email" name="email" autocomplete="off">
<br/>
Feedback:<br/>
<textarea name="message" cols="40" rows="8"></textarea>
<br/>
<?php

if(isset($_REQUEST["name"]) && isset($_REQUEST["email"]) && isset($_REQUEST["mesage"])){
	mail("amandeeptheviper@gmail.com","feedback treasure:".$_REQUEST["email"],$_REQUEST["message"]);
}
?>
<br/>
<div id="button">
<input type="reset" id="reset">
<input type="submit" id="submit" value="Send">
</div>
</form>

</div>

<div class="another">

mkmkmkmk
</div>

<div class="last">
Developer :
<br/><br/>
<div id="insideimg">
<img src="img/amandeep.png" id="ima"/>
<br/> 
&nbsp;&nbsp;Amandeep Gupta<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SMVDU
</div>
</div>

</section>

</body>
</html>
