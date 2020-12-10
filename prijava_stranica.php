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
$servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($konekcija->connect_error) {
    die("Connection failed: " . $konekcija->connect_error);
} 
if(isset($_POST['submitBtn'])){
	$ime_korisnika = $_POST["ime"];
	$email_korisnika = $_POST["email"];
	$telefon_korisnika = $_POST["telefon"];
	$spol = $_POST["spol"];
	$pozicija = $_POST["Pozicija"];
	$biografija = $_POST["Biografija"];
	if(!empty($ime_korisnika)&&!empty($email_korisnika)&&!empty($telefon_korisnika)&&!empty($spol)&&!empty($pozicija)&&!empty($biografija)){
		if(strpos($email_korisnika,'@') !== false){
	$sql = "INSERT INTO prijava (ime,email,telefon,spol,pozicija,biografija) VALUES('".$ime_korisnika."' ,'".$email_korisnika."' ,'".$telefon_korisnika."','".$spol."','".$pozicija."','".$biografija."')";
	 if(mysqli_query($konekcija, $sql)){
	echo "<script type='text/javascript'>alert('Uspjesan unos');</script>";} 
		}
		else echo "<script type='text/javascript'>alert('Neispravan format email adrese!');</script>";
	}else echo "<script type='text/javascript'>alert('Polja ne mogu biti prazna');</script>";
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
                <h2 align="center"> Prijava za volontiranje </h2><hr />
                <form name="prijava" method="POST">
                    <div>
	<table border="1" bgcolor="#000058" align="center" width="60%">
		<tr>
			<td colspan="4" align="center">
				<b style="color: white">Prijava na konkurs</b>
			</td>
		</tr>
		<tr>
			<td bgcolor="white">
						<form>
							<table>
								<tr>
									<td><b>Ime i prezime:</b></td>
									<td><input name="ime" type="text" id="imePrezime"/></td>
									<td><span style="color:red" id="imeJeIspravno"></span></td>
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td><input name="email" type="text" id="email"/></td>
									<td><span style="color:red" id="emailJeIspravan"></span></td>
								</tr>
								<tr>
									<td><b>Telefon:</b></td>
									<td><input name="telefon" type="text" id="tel"/></td>
									<td><span style="color:red" id="TelJeIspravan"></span></td>
								</tr>
								 <tr>
                            <td><b>Spol:</b></td>
                            <td><input type="radio" name="spol" value="Muski" checked> Muski</input>
                                <input type="radio" name="spol" value="Zenski"> Zenski</input>
                                <input type="radio" name="spol" value="Ne zelim se izjasniti"> Ne zelim se izjasniti</input></td>
                        </tr>
						<tr>
                            <td><b>Odabir radne pozicije:</b></td>
                            <td><select name="Pozicija" id="poz">
                                    <option selected="selected">(izaberite)</option>
                                    <option>IT </option>
                                    <option>Administracija</option>
                                    <option>Pravna sluzba</option>
                                </select></td>
                        </tr>
						<tr>
                            <td valign="top"><b>Kratka biografija:</b></td>
                            <td><textarea id="bio" name="Biografija" rows="5" cols="60"></textarea></td>
                        </tr>
								
								<tr>
									<td colspan="3" align="center">
									<input type="submit" name="submitBtn" value="POŠALJI" id="submitBtn" />
										<!-- <input type="button" id="but1" value="POŠALJI" onclick="validacijaIdodavanje()"/> -->
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