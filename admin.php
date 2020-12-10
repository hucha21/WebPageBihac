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
 function Brisanje(){
	$servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);
//$id=$_COOKIE["gfg"];
echo "<script type='text/javascript'>alert('nesto');</script>";
	//$query = "DELETE FROM prijava WHERE id='".$id."'";
	//$rezultat = mysqli_query($konekcija,$query);
}


if(isset($_POST['obrisiBtn'])){
	$servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);

	$idd = $_POST["polje"];
	$id = (int)$idd;
	$query = "DELETE FROM prijava WHERE id='".$id."'";
	$rezultat = mysqli_query($konekcija,$query);
}
if(isset($_POST['obrisiSveBtn'])){
	$servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);

	$query = "DELETE FROM prijava";
	$rezultat = mysqli_query($konekcija,$query);
}
if(isset($_POST['odjavaBtn'])){
	$servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
// Create connection
$konekcija = new mysqli($servername, $username, $password, $dbname);

	odjava();
}
 
 function get_prijave(){
        $servername = "sql105.byetcluster.com";
$username = "epiz_26769605";
$password = "TZehtiTpjJP";
$dbname = "epiz_26769605_ip_projekat_baza";
$message = "Neispravan unos podataka.";
        $conn = new mysqli($servername, $username, $password, $dbname, '3306');
        $conn->set_charset("utf8");
        $sql = "";
        if (!$conn)
        {
            die("Fatal Error: Connection Error!");
        }
            $sql = "SELECT* FROM prijava";
        $rezultat = mysqli_query($conn, $sql) or die($conn->error);
        return $rezultat;
    }
	function odjava(){
setcookie("korisnik", "", time() - 3600);
header('Location: pocetna_stranica.html');
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
                <h2 align="center"> ADMIN PANEL </h2><hr />
                <form name="prijava"  method="POST" >
				<input type="submit" style="background-color: red" name="odjavaBtn" value="ODJAVA" id="odjavaBtn" /><br>
		<div id="dodaj">
		<?php if(isset($_COOKIE['korisnik'])):{ ?>
<table border="1" cellpadding="1"  cellspacing ="0"  width="60%">  <!--tabela--> 
<tr>
    <th>ID</th>
    <th>IME</th>
	<th>EMAIL</th>
	<th>TELEFON</th>
	<th>SPOL</th>
	<th>POZICIJA</th>
	<th>BIOGRAFIJA</th>
  </tr>
<?php 
$sve_prijave=get_prijave();
		while ($row = $sve_prijave->fetch_assoc()):
					 if ($row['pozicija'] == "IT") {?>
			<tr style="background-color:lightblue"><br>
		<?php } else if ($row['pozicija'] == "Administracija") { ?>
			<tr style="background-color:red"><br>
			<?php } else { ?>
			<tr style="background-color:lightgreen"><br>
			<?php }?>
<td><?php echo $row['id']?></td><td><?php echo $row['ime']?></td><td><?php echo $row['email']?></td><td><?php echo $row['telefon']?></td>
<td><?php echo $row['spol']?></td><td><?php echo $row['pozicija']?>	</td><td><textarea rows="5" cols="33" readonly><?php echo $row['biografija']?></textarea></td>
<!--<td><input type="button" value="Obriši" onclick="ObrisiIzTabele(this)"></td>	--> 		 
	</tr>
<?php endwhile;?>
 </table>
	<table align="center">
            <tr>
               <td><h3 style="color:#000058">Spisak prijava</h3><td>
            </tr>
            <tr>
               <td> <div id="tabela"></div></td>
            <tr>
            <tr><td>Označi ID:<br></td></tr>
            <tr>
               <td><input type="number" min="0" step="1" name="polje" id="polje">
			   <input type="submit" name="obrisiBtn" value="BRISANJE" id="obrisiBtn" />
			   <input type="submit" name="obrisiSveBtn" value="OBRIŠI SVE IZ TABELE" id="obrisiSveBtn" />
                  <input type="button" id="btn4" value="PRINTANJE" onclick="window.print()"/>
				  
               </td>
            </tr>
         </table>
		 <?php } endif?>
	 </div>
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
    </table>
    <script>
    function ObrisiIzTabele(o) {
     var p=o.parentNode.parentNode;
    var id=p.cells[0].innerText;
    createCookie("gfg", id, "2"); 
  var phpadd= <?php echo Brisanje();?> //call the php add function
         //p.parentNode.removeChild(p);
    }
// Function to create the cookie 
function createCookie(name, value, days) { 
    var expires; 
      
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
      
    document.cookie = escape(name) + "=" +  
        escape(value) + expires + "; path=/"; 
} 
    </script>
    </body>
</html>