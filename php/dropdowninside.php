<?php
	$i=0;
	$level=0;
	$score=0;
	if(isset($_COOKIE["1234trlko"])&&isset($_COOKIE["3frymepan"])){
			$user=$_COOKIE["1234trlko"];
			$pass=$_COOKIE["3frymepan"];
			
			require_once("..\php\connect.php");	

			$qm="Select * from username where user='".$user."';";
			$rm=mysql_query($qm);
			$qm1="Select * from userscore where user='".$user."';";
			$rm1=mysql_query($qm1);
			while($rq1=mysql_fetch_array($rm1)){

				$le=$rq1["level"];
			}
			$site="../extra/quiz1.php";
			switch($le)
			{
				case 1 : $site="../extra/quiz1.php";
							break;
				case 2 : $site="../extra/quiz2.php";
							break;
				default : $site="../extra/quiz1.php";
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
<a href='signup.php'>LogIn</a>
</div>";
			}
			// if any one tries to change marks of another changing cookie name and playing
		}
	else
	echo "<div class='sign1'>
<a href='signup.php'>LogIn</a>
</div>";
?>