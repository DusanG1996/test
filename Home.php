<!DOCTYPE html>
<html>
 <head>
  <title>Backend</title>
  <link rel="stylesheet" href="blokovi.css">
  <meta charset="UTF-8">
 </head>
 <body>
	<div id="hd"></div>
	<div >
	<ul>
	 <li><a href="Home.php"> Home </a></li>
	 <li><a href="Login.php">Login</a></li>
	 <li><a href="Register.php">Register</a></li>
	 <form method='post' action='Home.php'>
		<input type='text' name='search' placeholder='Search text' >
		<input type='submit' name='submit' value='Pretrazi korisnika'>
	</form>
	</ul>
	</div>
	<div id="ct">
	<?php
	require_once 'Korisnik.class.php';
	if(isset($_POST['submit'])){
		$unos=$_POST['search'];
		//echo $unos;
		$conn=new mysqli("localhost","root","","projekat");
		$upit="select * from korisnici where ime like '%$unos%' ";
		$niz=array();
		$rez=$conn->query($upit);
		while($x=$rez->fetch_object('Korisnik')){
		$niz[]=$x;
		}
		foreach($niz as $korisnik){
			$korisnik->ispis();
		}
	}
	?>
</div>
	

	<div id="ft">Dusan Gavrilovic<br>Prilike</div>
 </body>
</html>