<html>
<head>
<title> prova </title>
</head>
<body>

	<form action="registra.php" method="POST">
		 Nome <input type="text" name="name" id="name" /> <br><br>
		 Cognome <input type="text" name="cognome" id="cognome" /> <br><br>
		 Username <input type="text" name="username" id="username" /> <br><br>
		 Password <input type="password" name="pass" id="pass" /> <br><br>
		 Email  <input type="text" name="email" id="email" /><br><br>
		<input type="submit" value="ISCRIVITI" /><br>

	</form>

	<?php

		if(isset($_POST["username"]))
			{
 				$conn=database("chat");
 				$user=$_POST["username"];
				$email=$_POST["email"];
 				$query="select count(*) as tot from chat where username='$username' OR email='$email'";
 				$tabella=$conn->query($query);
 				$riga=$tabella->fetchArray();
 				$trovati=$riga["tot"];
 				if($trovati==0)
 				{
					$nome=$_POST["name"];
					$cognome=$_POST["cognome"];
					$pass=$_POST["pass"];
					if(strlen($pass)>=8){
  					$query="INSERT INTO chat VALUES('$nome','$cognome','$user','$pass','$email')";
					if ($conn->query($query)) {
						$err="Registrazione completata!";
					}
					else {
    						$err="errore nella creazione del record";
					}
				}
				else{$err="password troppo corta";}}
				else{$err="email gia registrata o utente gia' esistente";}
				echo $err;die();
 				$conn->close();
			}

	?>
</body>
</html>