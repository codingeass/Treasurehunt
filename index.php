<html> 3ss
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
	$i=0;
	$level=0;
	$score=0;
	if(isset($_COOKIE["1234trlko"])&&isset($_COOKIE["3frymepan"])){	
	include("php/cookie.php");
	include("php/connect.php");
	$qm="Select * from username where user='".$user."';";
			$rm=mysql_query($qm);
			$qm1="Select * from userscore where user='".$user."';";
			$rm1=mysql_query($qm1);
			while($rq1=mysql_fetch_array($rm1)){
			
				$le=$rq1["level"];
			}
			$site="extra/quiz1.php";
			switch($le)
			{
				case 1 : $site="extra/quiz1.php";
							break;
				case 2 : $site="extra/quiz2.php";
							break;
				default : $site="extra/quiz1.php";
			}
			while($rq=mysql_fetch_array($rm))
			{
				if($pass==md5($rq["password"]))
				{
					echo "
					<nav>
						<ul>
							<li><a href='#'>".$user."</a>
							<ul>
				 				
								<li><a href=$site>Go to Account</a></li>
								<li><a href='logout.php'>Logout</a>
							</ul>
							</li>
						</ul>
					</nav>";
				}
				else
				echo "<div class='sign1'>
<a href='php\signup.php'>LogIn</a>
</div>";
			}
		}
else
	echo "<div class='sign1'>
		<a href='php\signup.php'>LogIn</a>
	</div>";
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
<div class="register" onclick="window.location='php\signup.php'">
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
&nbsp;&nbsp;+9797521967
</div>
</div>

</section>

</body>
</html>
