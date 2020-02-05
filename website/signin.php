<html>

<head>
	<title>Sign in</title>
</head>

<body>
	<p>Accedi</p>
	<form action="signin.php" method="post">
		<table>
			<tr>
				<td><input type="text" placeHolder="email" name="email">
			<tr>
				<td><input type="password" placeHolder="Password" name="password">
			<tr>
				<td><input type="submit" value="Registrati"></td>
			<tr>
				<td>
					<input type="reset" value="ripristina">
				</td>
			</tr>
		</table>
	</form>
	<?php
	//$con = new mysqli("sgarlato.luca.tave.osdb.it", "c92_UserProgetto", "ProgettoBello01", "c92_Progetto"); --> da usare a scuola
	$con = new mysqli("localhost", "root", "", "progetto");
	if ($con->connect_errno) {
		echo "errore di connessione al Database";
		exit();
	}
	if (count($_POST) > 0) {
		$check = "SELECT email from utenti";
		$results = $con->query($check);
		if (mysqli_num_rows($result) > 0) {
			while ($row = $result->fetch_assoc()) {
				if ($row['email'] == $_POST['email']) {
					echo "email gia usata";
					die;
				}
			}
		}
		$password = md5($_POST['password']);
		$query = "INSERT INTO utenti (email, password) VALUES (" . "'" . $_POST['email'] . "'" . "," . "'" . $password . "'" . ")";
		$con->query($query);
	}
	?>
</body>

</html>
