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
		<input type='submit' name='Submit' value='Pretrazi korisnika'>
	</form>
	</ul>
	</div>
	<div id="ct">
	<form method='post' action='Login.php'>
		<b>Ulogujte se <b><br><br>
		Unesite e-mail:<input type='e-mail' name='email'><br>
		Unesite lozinku:<input type='text' name='lozinka'><br>
		<input type='submit' name='slanje' value='Prosledi'><br>
	<form>
	<?php
		if(isset($_POST['slanje'])){
			$email=$_POST['email'];
			$sifra=$_POST['lozinka'];
			$conn=mysqli_connect("localhost","root","","projekat");
			$upit="select * from korisnici where email='$email' and sifra='$sifra'";
			$rez=mysqli_query($conn,$upit);
			//print_r($rez);
			$x=mysqli_fetch_assoc($rez);
			if($email=$x['email'] && $sifra=$x['sifra'])
				echo 'Uspesno ste se ulogovali';
			else { echo 'Pogresan unos'; }
		}
	?>
</div>
	

	<div id="ft">Dusan Gavrilovic<br>Prilike</div>
 </body>
</html>