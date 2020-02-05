<html>

<head>
	<title>Login</title>
</head>

<body>
	<p>Accedi</p>
	<form action="login.php" method="post">
		<table>
			<tr>
				<td><input type="text" placeHolder="email" name="email">
			<tr>
				<td><input type="password" placeHolder="Password" name="password">
			<tr>
				<td><input type="submit" value="accedi"></td>
			<tr>
				<td>
					<input type="reset" value="ripristina">
				</td>
			</tr>
		</table>
	</form>
	<?php
	//$con = new mysqli("sgarlato.luca.tave.osdb.it", "c92_UserProgetto", "ProgettoBello01", "c92_Progetto"); --> da usare a scuola
	$con = new mysqli("2.36.178.21", "user", "userpsw001", "progetto");
	if ($con->connect_errno) {
		echo "errore di connessione al Database";
		exit();
	}
	if (count($_POST) > 0) {
		$query = "SELECT * FROM utenti where email = " . "'" . $_POST['email'] . "'" . " and password = " . "'" . $_POST['password'] . "'";
		
		$result = $con->query($query);
		if (mysqli_num_rows($result) > 0) {

			while ($row = $result->fetch_assoc()) {
				if ($row['email'] == $_POST['email'] and $row['password'] == $_POST['password']) {
					
					header("location: /index.html"); //cambia pagina 
				}
			}
		} else {
			echo "password o email errati";
		}
	}
	?>
</body>

</html>