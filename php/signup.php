<html>
<head>
<link rel="stylesheet" href="..\css\main1.css"/>

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
	include("dropdowninside.php");
?>

</section>


<section>

<div class="signin">

<div class="login">
LogIn
</div>

<div class="inmain">
<form method="post" name="frame1" action="">
Username : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name" maxlength=30><br/><br/>
Password : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="pass" maxlength=30 >
<br/><br/>
<input type="hidden" name="button2" value="signin">
<input type="reset" id="reset">
<input type="submit" id="submit" value="Login">
</form>
<?php

	require_once("..\php\connect.php");
  $i=0;
if(isset($_REQUEST["name"])&& isset($_REQUEST["pass"])&&isset($_REQUEST["button2"]))
{
	if($_REQUEST["button2"]=="signin")
	{
		$_REQUEST["button2"]=="";
		$db = mysql_select_db("trea",$mysql);
		$query="Select * from username where user='".$_REQUEST["name"]."';";
		$result=mysql_query($query);
		if(empty($res))
		{
			while($res=mysql_fetch_array($result)){
				if($res['user']==$_REQUEST["name"]&&$res['password']==$_REQUEST["pass"])
					{
					echo "<br/>Welcome,".$_REQUEST["name"]."";
					$i=$i+1;
					setcookie("1234trlko","".$_REQUEST["name"],time()+60*60*24*30,"/");
					//<!-- ,time()+60*60*24*30,'/New%20folder%20(2)','localhost' -->
					setcookie("3frymepan","".md5($_REQUEST["pass"]),time()+60*60*24*30,"/");
						header("Location: #");
						break;
						
				}
			}
			if($i==0)
			echo "<br/>You Entered wrong details";
		}
	}
}
mysql_close($mysql);
?>
</div>
<center><p><a href="index.php#third">**Forget Password mail us at here</a></p></center>
</div>

</section>

<div id="linedraw">
</div>

<section>

<div class="signup">

<div class="login2">
Register Here
</div>

<div class="upmain">

<form method="post" name="form2" action="">
Username :&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name" maxlength=30><br/><br/>
Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
<input type="email" name="email" autocomplete="off" maxlength=30><br/><br/>
College Name: 
<input type="text" name="college" maxlength=50><br/><br/>
Password : &nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" name="pass" maxlength=30><br/><br/>
Re-password :
<input type="password" name="repass" maxlength=30>
<br/><br/>
<input type="hidden" name="button1" value="signup">
<?php
include("..\php\connect.php");
if(isset($_REQUEST["button1"]))
{
if($_REQUEST["button1"]=="signup")
{
$_REQUEST["button1"]="";
if(isset($_REQUEST["name"]))
{
	$quer="Select * from username where user='".$_REQUEST["name"]."';";
	$re=mysql_query($quer) or die("Query fail:".mysql_error());
	$res=mysql_fetch_array($re);
	if($res["user"]=="")
	{
	if(isset($_REQUEST["email"])&&isset($_REQUEST["college"]))
	{
		if(isset($_REQUEST["pass"]))
		{
			if(isset($_REQUEST["repass"]))
			{
				if($_REQUEST["pass"]!=$_REQUEST["repass"])
				echo "Password do not match";
				else
				{
					$query="Insert into username values('".$_REQUEST["name"]."','".$_REQUEST["pass"]."','".$_REQUEST["email"]."','".$_REQUEST["college"]."')";
                    $result=mysql_query($query)
					or die("Query_failed :" .mysql_error());
					$quer="Insert into userscore values('".$_REQUEST["name"]."',0,1)";
					$rem=mysql_query($quer) or die("Quer fail :".mysql_error());
					echo "User created successfully. <br/>Please login";
				}
			}
		}
	}
	}
	else
	echo "**user exit";
}
}
}
mysql_close($mysql);
?>
<br/><br/>
<input type="reset" id="reset">
<input type="submit" id="submit">
</form>
</div>

</div>

</section>

</body>

</html>