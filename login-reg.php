<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stil.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><!--isprvan prikaz slova-->
	<script src="js/skripta.js" type="text/javascript"></script>
    <title>Web stranica Grada Bihaća</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
</head>
<body>

 <?php


if(isset($_POST['loginBtn'])){
	$username = "";
$password = "";
$dbname = "";
$message = "";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);

	$korisnicko_ime = $_POST["kor"];
	$korisnicka_lozinka = $_POST["lozinka"];
	$prijavljen=prijavaKorisnika($korisnicko_ime,$korisnicka_lozinka,$konekcija);
	if( $prijavljen>0){
	 header("location: admin.php");} //redirekta na page za admina 
	else{
		//ispisuje grešku u unosu	
		echo "<script type='text/javascript'>alert('Neispravni podaci');</script>";
	}
}
 
 function prijavaKorisnika($korisnicko_ime,$korisnicka_lozinka,$konekcija){
	
	$query = "SELECT * FROM korisnik WHERE username='".$korisnicko_ime."' AND password='".$korisnicka_lozinka."'";
	$rezultat = mysqli_query($konekcija,$query);
	
	if(mysqli_num_rows($rezultat)>0){
		//postoji korisnik u bazi podataka sa ovakvim podacima
		while($row = $rezultat->fetch_assoc()) {
		/***** POSTAVLJA SE COOKIE SA ID KORISNIKA RADI PRIKAZA SADRŽAJA *******/
			$sat = time() + 60 * 60 * 24 * 30;
			$userr=$row["username"];
			echo "<script type='text/javascript'>alert('$userr');</script>";
			setcookie('korisnik', $userr, $sat);
		/*****************************************/
			return 1;
		}
	}
	else{
		//ne postoji korisnik sa ovakvim podacima u bazi
		return -1;
	}
}
?>

    <table border="0" cellpadding="10" cellspacing="0" height="100%" width="100%">
		<body>
            <tr>
                <!-- ============ ZAGLAVLJE (HEADER) ============== -->
                <td colspan="3" height="100%" width="100%" bgcolor="#000058">
                    <p align="center">
                        <a href="https://bihac.org/bs" target="_blank"> <img src="Slika/bihac_logo.gif" height="100" align="middle" title="https://bihac.org/bs" border="0" /> </a>
                    </p>
                </td>
            </tr>
            <!-- ============ LINKOVI (NAVIGATION BAR) ============== -->
           <tr>
                <td colspan="3" align="center" height="15" bgcolor="white">
                    <a href="pocetna_stranica.html">  Početna stranica</a> || <a href="slike_stranica.html">Slike</a> || <a href="prijava_stranica.php">Prijavi se</a> || <a href="kontakt_stranica.html">Kontaktiraj nas </a> || <a href="login-reg.php">Admin</a>  </a></td>
            </tr>
            <!-- ============ LIJEVA KOLONA (LINKOVI) ============== -->
            <td bgcolor="#000058" valign="top" width="15%">
                <h3 style="color: white" align="middle"> GLAVNI MENI </h3>
                <ul type="circle" style="color: white">
                    <hr align="right" width="100%" style="color: white" />
                    <li><a style="color: white" href="pocetna_stranica.html">Početna stranica</a></li></br>
                    <li><a style="color: white" href="slike_stranica.html">Slike</a></li></br>
                    <li><a style="color: white" href="prijava_stranica.php">Prijavi se</a></li></br>
                    <li><a style="color: white" href="kontakt_stranica.html">Kontaktiraj nas</a></li></br>
					<li><a style="color: white" href="login-reg.php">Admin</a></li>
                    <hr align="right" width="100%" style="color: white"/>
                </ul>
            </td>
            <!-- ============ DESNA KOLONA (SADRZAJ) ============== -->
            <td bgcolor="white" valign="top" width="80%">
                <h2 align="center"> Prijava</h2><hr />
                <form name="prijava"  method="POST" >
		<div id="dodaj" style="margin-top: 50px;">
	<table border="1" bgcolor="#000058" align="center" width="60%">
		<tr>
			<td colspan="4" align="center">
				<b style="color: white">Login</b>
			</td>
		</tr>
		<tr>
			<td bgcolor="white">
						<form>
							<table>
								<tr>
									<td><b>Korisnicko ime:</b></td>
									<td><input name="kor" type="text" id="kor"/></td>
								</tr>
								<tr>
									<td><b>Lozinka:</b></td>
									<td><input name="lozinka" type="password" id="lozinka"/></td>
								</tr>
								<tr>
									<td colspan="3" align="center">
									<input type="submit" name="loginBtn" value="LOGIN" id="loginBtn" />
										<input type="button" id="but2" value="PONIŠTI" onclick="ponisti()"/>
									</td>
								</tr>
							</table>
						</form>
				</div>
			</td>
		</tr>
		
	</table></div>
                    <hr />
                </form>
                </td>
                </tr>
 <!-- ============ PODNOZJE (FOOTER) ============== -->
                <tr>
                    <td colspan="3" align="center" height="20" bgcolor="white" style="color: black">
                        <a href="https://www.facebook.com/Bihac-loves-Una-225925887938918/" target="_blank"> <img src="Slika/footer_logo.png" align="center" height="60" title="Bihać Loves Una" /></a>
                        <br>Copyright 2020 &copy; Designed by <a href="mailto:hhafuric@gmail.ba"> Husnija Hafurić </a> </td>
                </tr>
    </table></body>
</html>
