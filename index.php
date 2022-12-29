<!DOCTYPE html PUNLIC"-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.3w.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang"hu">
<head>
<link rel="stylesheet" href="ikon.css" type="text/css"/>
<meta http-equiv="content-type" content="text/html; charsset-8859-2"/>
<title>Regisztráció</title>
</head>
<body>
<div style="text-align:center;">
<?
include("kapcsolat.php");

  $regi = $_POST['regi'];
  $felhasznalo = $_POST['felhasznalo'];
  $jelszo1 = $_POST['jelszo1'];
  $jelszo2 = $_POST['jelszo2'];
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];

   //valos Felhasznalo
 function valosf($felhasznalo) {
	 if ($felhasznalo == "")
		 return false;
	 $engedelyezett = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	 for ($i = 0; $1 < strlen($felhasznalo); ++$1)
		 if (strpos($engedelyezett, $felhasznalo[$1]) === false)
			 return false;
		 return true;
 }
//VALOS EMAIL

function email1($email1) {
	$eremeny = TRUE;
if ("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-])*(\.[a-z]{2,4}$",$email1")) {
	$eredmeny = FALSE;
}
  return $eredmeny;
}

   if(isset($regi)and $regi == "igen") {
   $uzenet="";
   $statusz = "ok";
   
 //FELHASZNALO ELLENORZESEK
   if (emptyempty($felhasznalo)) {
   $uzenet=$uzenet."Nem adtál meg felhasználó nevet.<br/>";
   $statusz= "HIBA";
}
   else {
	   
if (!valosf($felhasznalo)) {
$uzenet=$uzeten,"A felhasználónév csak ezekböl a karakterekből állhat: A-Z,a-z, 0-9<br/>";
$statusz="HIBA";
}
   
 if (strlen($felhasznalo) < 5) {
 $uzenet =$uzenet."A felhasználónév túl rövid min. 5 karakterek.<br/>";
 $statusz= "HIBA";
 }
 
 if (strlen($felhasznalo) > 20){
 $uzenet=$uzenet."A felhasználónév túl hosszú max. 20 karakter.<br/>";
 $statusz="HIBA";
   }
}

if(mysql_num_rows(mysql_query("SELECT felhasznalo FROM regisztráció WHERE felhasznalo ='$felhasznalo'"))){
$uzenet=$uzenet."$felhasznalonev már létezik. Kérjük, próbálj meg egy másikkat<br/>";
$statusz="HIBA";
}

//JELSZO ELLENORZES
if (emptyempty($jelszo)) {
$uzenet=$uzenet."Nem adtál meg jelszó.<br/>";
$statusz= "HIBA"
}else{
if($jelszo1 != $jelszo2){
$uzenet=$uzenet."A két jelszó nem egyforma<br/>";
$statusz="HIBA";
}

if (strlen($jelszo1) < 5){
$uzenet=$uzenet."A jelszó túl rövid min. 5 karakter.<br/>";
$statusz= "HIBA";
}

if (strlen($jelszo2) > 20){
$uzenet=$uzenet."Bocsi, A jelszó túl hosszú max. 20 karakter.</br>";
$statusz= "HIBA";}
}
//EMAIL ELLENORZES
if (emptyempty($email1)) {
$uzenet=$uzenet."Nem adtál meg emailt.<br/>";
$statusz= "HIBA";
}

else {
if (!email($email1)){
  $uzenet=$uzenet."Valótlan email cím.<br/>";
  $statusz= "HIBA";
   }
 
if ($email1 != $email2){
$uzenet=$uzenet."A két email cím nem egyforma<br/>";
$statusz= "HIBA"
   }
}

$jelszo = md5("$jelszo1");
$email = $mail1;

 if (mysql_num_rows(mysql_query("SELECT email FROM regisztracio WHERE email = '$email'"))){
	 
 $uzenet=$uzenet."$email1 cím már létezik.Kérjük,próbálj meg egy másikat<br/>";
 $statusz= "HIBA"
 }

  if($statusz<>"ok"){
  echo"<dív style='text-color:red;'>
  $uzenet</div></br/> <input type='button' value='vissza' onClick='history.go(-1)'><br/>";
  }else{
    $parancs = mysql_query("INSERT INTO regisztracio (felhasznalo,jelszo,email,regisztralt) VALUES('$felhasznalo','$jelszo',NOW())");
	echo"$felhasznalo sikeresen regisztráltál.<br/> <a href='regisztracio.php'>Regisztracio</a>";
  }else{  
  ?}
    <form action="regisztracio.php" method="post">
	<input type="hidden" name="regi" value="igen"/>
	Felhasználó név:<br/>
	<input type="text" name="felhasznalo" maxlength="20" id="felhasznalo"/>
	Jelszó: <br/>
	<input type="password" name="jelszo1" maxlenth="20" id="jelszo1"/><br/>
	jelszó újra: <br/>
	<input type="password" name="jelszo2" maxlength="20" id="jelszo2"/><br/>
	email:<br/>
	<input type="text" name="email1" maxlength="50" id="email1"/><br/>
	email:<br/>
	<input type="text" name="emai2" maxlength="50" id="email2"/><br/>
	
	<input type="submit" value="regizek" name="submit"/>
	</form>
	</div>
 
</body>
</head>
<?
   }
   ?>
