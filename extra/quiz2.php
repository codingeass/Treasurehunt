<html>

<head>
<link rel="stylesheet" href="../css/quiz.css">
</head>

<body>
<section class="first">
<div class="tex">
<img src="../img/mkmk.png" />
</div>

<div class="ml">
<a href="../index.php">HOME</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="">SIGN UP</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="../index.php#second">DASHBOARD</a>
</div>

</section>

<section class="dropdown">

<?php
	$i=0;
	$level=0;
	$score=0;
	if(isset($_COOKIE["1234trlko"])&&isset($_COOKIE["3frymepan"]))
	{
	require("..\php\cookie.php");
	require_once("..\php\connect.php");
			$qm="Select * from username where user='".$user."';";
			$rm=mysql_query($qm);
			while($rq=mysql_fetch_array($rm))
			{
				if($pass==md5($rq["password"]))
				{
					echo "
					<nav>
						<ul>
							<li><a href='#'>".$user."</a>
							<ul> 				
								<li><a href='#'>Go to Account</a></li>
								<li><a href='../php/logout.php'>Logout</a>
							</ul>
							</li>
						</ul>
					</nav>";
				}
				else
				echo "<div class='sign1'>
<a href='../php/signup.php'>LogIn</a>
</div>";
			}
			// if any one tries to change marks of another changing cookie name and playing
		}
	else
	echo "<div class='sign1'>
<a href='../signup.php'>LogIn</a>
</div>";
?>

</section>


<section class="second">

<div class="signin">

<div class="login">
Score Board
</div>
<div class="content">
<?php
	$i=0;
	$level=0;
	$score=0;
	if(isset($_COOKIE["1234trlko"])&&isset($_COOKIE["3frymepan"])){
			echo "Username :".$_COOKIE["1234trlko"];
			$user=$_COOKIE["1234trlko"];
			$pass=$_COOKIE["3frymepan"];
			require_once("..\php\connect.php");
			$query="Select * from username where user='".$user."';";
			$result=mysql_query($query);
			while($res=mysql_fetch_array($result))
			{
				if($pass==md5($res["password"]))
				{
				   //echo "<br>pass";
				   $quer="Select * from userscore where user='".$user."';";
				   $re=mysql_query($quer);
				   while($r=mysql_fetch_array($re))
				   {
						echo "<br/>Score :".$r["score"]."<br/>Level :".$r["level"];
						$score=$r["score"];
						$level=$r["level"];
						break;
				   }
				   break;
				}
				else
				break;
			}
			// if any one tries to change marks of another changing cookie name and playing
		}
	else
	echo "Login First";	
?>
</div>

</div>
</section>

<section>

<div class="main">

<div id="question">
Q1. What is the name of sword pulled out by a Man to become king of modern day Britain?
</div>

<div id="hint">
hint: From arthurian legend
</div>

<div id="answer">
<br/><br/>
<form method="post" name="answer" action="">
<input type="text" name="name" maxlength=30>
<br/><br/>
<input type="hidden" name="button2" value="answer">
<input type="submit" id="submit" value="Submit Answer">
</form>
<!-- set level of page here-->
<?php
//change code
$lev=2;
if(isset($_REQUEST["name"])&&isset($_REQUEST["button2"])){
	if($_REQUEST["button2"]=="answer")
	{
		$_REQUEST["button2"]="";		
		$_REQUEST["name"]=strtolower($_REQUEST["name"]);
		if($_REQUEST["name"]=="caledfwlch")
		{
			echo "<br/>Your Answer is Correct";
			if($level<=$lev)
			{
				$score=$score+1;
				$ans="update userscore set score=".$score." where user='".$user."';";
				$res1=mysql_query($ans);
				$level=$level+1;
				$ans2="update userscore set level=".$level." where user='".$user."';";
				$res2=mysql_query($ans2);
			}

			header("Location: #");
		}
		else
		echo "<br/>Wrong Answer";
	}
}
			//change code here
			if($level>2)
			echo "<a href='quiz2.php'><br/>Click here to go to next level.</a>";
?>

</div>

</section>

</body>

</html>