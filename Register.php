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
	<b>Registration form<b><br>
	<form method='post' action='Register.php'>
	Unesite e-mail:<input type='e-mail' name='email'><br>
	Unesite ime:
	<input type='text' name='ime'><br>
	Unesite sifru:<input type='password' name='sifra'><br>
	Ponovite sifru:<input type='password' name='psifra'><br>
	<input type='submit' name='submit' value='Prosledi'>
	</form><br><br><br>
	<?php 
	
	
	$conn=mysqli_connect("localhost","root","","projekat");
		if(isset($_POST['submit'])){
			if($_POST['email']!='' && $_POST['ime']!='' && $_POST['sifra']!='' && $_POST['psifra']!='' ){
			$em=$_POST['email'];
			$im=$_POST['ime'];
			$sifra=$_POST['sifra'];
			$ponovnaSifra=$_POST['psifra'];
			if($sifra == $ponovnaSifra){
			$proveraImena=mysqli_query($conn,"select * from korisnici where ime='$im' ");
			$proveraMejla=mysqli_query($conn,"select * from korisnici where email='$em' ");
			$x1=mysqli_fetch_assoc($proveraImena);
			$x2=mysqli_fetch_assoc($proveraMejla);
			
			
				if($im!=$x1['ime'] && $em!=$x2['email'] ){
					$unos=$conn->query("insert into korisnici values(null,'$im','$em','$sifra')");
					echo 'Uspesno ste se registrovali';
				}else if($im==$x1['ime']){ echo 'Korisnik sa takvim imenom je vec registrovan';}
				else{ echo 'Korisnik sa takvom e-mail adresom je vec registrovan'; }
			}else{ echo 'Niste uneli iste sifre';}
		}else{
			echo "Niste popunili sva polja";
		}
		}
	?>
	
	
</div>
	

	<div id="ft">Dusan Gavrilovic<br>Prilike</div>
 </body>
</html>

