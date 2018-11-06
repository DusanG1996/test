<?php
 class Korisnik{
	 private $ime;
	 private $email;
	 private $lozinka;
	 public function ispis(){
		 echo "Ime:$this->ime   E-mail:$this->email<br>";
	 }
 }
?>