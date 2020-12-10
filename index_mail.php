<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><!--isprvan prikaz slova-->
    <title>Web stranica Grada Bihaća</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<style>
/*  button,hover nad buttonom */
input[type=submit],
[type=reset],[type=button] {
	background-color: #000058;
	border: none;
	color: white;
	padding: 10px 22px;
	text-align: center;
	text-decoration: none;
	font-size: 14px;
	margin: 4px 2px;
	cursor: pointer;
}
input[type=submit]:hover,
[type=reset]:hover {
	background-color: tomato;
	color: #000058;
}
</style>
</head>
<body>
		<h4 class="sent-notification"></h4>
<center>
		<form id="myForm">
        <table>
			<tr><h2>Postavite pitanje/Pošaljite nam sugestiju</h2><tr>

			<tr><td><label>Ime</label></td>
			<td><input id="name" type="text" placeholder="Unesite ime"></td></tr>
			<tr><td><label>Email</label></td>
			<td><input id="email" type="text" placeholder="Unesite Email"></td></tr>
			<tr><td><label>Naslov</label></td>
			<td><input id="subject" type="text" placeholder=" Unesite Naslov Emaila"> </td></tr>
		<tr><td><p>Sadržaj</p></td>
			<td><textarea id="body" rows="5" placeholder="Unesite poruku/sugestiju"></textarea></td></tr>
			<tr><td colspan="2">
            <button type="button" onclick="sendEmail()" value="Send An Email">Postavite pitanje/Pošaljite nam sugestiju</button> 
             </td></tr></table>
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Poruka uspjesno poslana.");
                        window.alert("Uspjesno!");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>