function preuzmi(id) {
	var p = document.getElementById(id);
	if (p) {return p;} 
	else {return false;}
}
function validacijaIme() {
	preuzmi("imeJeIspravno").innerHTML = "";
	var ime = preuzmi("imePrezime").value;
	var reg = /^[a-zA-Z\s]+$/;
	if (ime.match(reg)) {
		return true;} 
		else {
		preuzmi("imeJeIspravno").innerHTML = "Unesite ispravno ime!";
		return false;
	}
}
function validacijaMail() {
	preuzmi("emailJeIspravan").innerHTML = "";
	var email = preuzmi("email").value;
	if (email == "") {
		preuzmi("emailJeIspravan").innerHTML = "Unesite ispravan email!";
		return false;
	} else {
		for (i = 0; i < email.length; i++) {
			if (email[i] == "@") {
				return true;
			}
		}
		preuzmi("emailJeIspravan").innerHTML = "Unesite ispravan email!";
		return false;
	}
}
function validacijaTelefon() {
	preuzmi("TelJeIspravan").innerHTML = "";
	var tel = preuzmi("tel").value;
	var reg = /^[0-9]+$/;
	if (tel == "") {
		preuzmi("TelJeIspravan").innerHTML = "Unesite ispravan telefon!";
		return false;
	} else if (tel.match(reg)) {
		return true;
	} else {
		preuzmi("TelJeIspravan").innerHTML = "Unesite ispravan telefon!";
		return false;
	}
}
function validacijaUvjeti() {
	if (preuzmi("uvjetPrihvacen").checked) {
		return true;
	} else {
		preuzmi("uvjetJeIspravan").innerHTML = "Prihvatite uvjete!";
		return false;
	}
}
function ponisti() {
	preuzmi("imePrezime").value = "";preuzmi("email").value = "";
	preuzmi("tel").value = "";preuzmi("bio").value = "";
	preuzmi("poz").selectedIndex = 0;preuzmi("TelJeIspravan").innerHTML = "";
	preuzmi("imeJeIspravno").innerHTML = "";preuzmi("emailJeIspravan").innerHTML = "";
	preuzmi("uvjetPrihvacen").checked = false;preuzmi("uvjetJeIspravan").innerHTML = "";
}