<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Orange Sky - Opret Bruger</title>

<link rel="stylesheet" href="browser_reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="style_registrer.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates|Roboto" rel="stylesheet">


</head>

<body>

<div class="grid grid-pad">

	<div class="button_wrapper">
		<a href="index.php"><button class="button_back">Tilbage til forside</button></a>
	</div>


	<?php


	if(filter_input(INPUT_POST, 'submit')){	

		$un = filter_input(INPUT_POST, 'un') 
			or die ('Brugernavn er ikke korrekt - Prøv igen');

		$pw = filter_input(INPUT_POST, 'pw')
			or die ('Adgangskode er ikke korrekt - Prøv igen');

		$pw = password_hash($pw, PASSWORD_DEFAULT);

		// echo 'Tilføjer bruger: <br>' .$un. ' : ' .$pw;



		require_once('db_con.php');

		$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';

		$stmt = $con->prepare($sql);
				$stmt->bind_param('ss', $un, $pw);
				$stmt->execute();

		if($stmt->affected_rows > 0){
			
			echo '<div class="echo_registrering">';
				
				echo '<div class="echo_content">';
					echo '<h1>Din bruger ' .$un. ' er nu oprettet!</h1>';
					echo '<p>Log ind via knappen herunder, for at besøge den hemmelige verden.<p>';

					echo '<a href="login.php"><button>Log ind</button></a>';	
			
				echo '</div>';
			echo '</div>';
			
			
		}

		else {
			
			echo '<div class="else_registrering">';
				
				echo '<div class="else_content">';
					echo '<h1>En fejl er sket!</h1>';
			
					echo '<h3 style="margin-top: -40px;">Din bruger blev ikke tilføjet.</h3>';	
			
					echo '<h3 style="margin-top: -60px;">Dit valgte brugernavn findes muligevis allerede i vores system.</h3>';
			
					echo '<h2 style="margin-top: -45px;">Prøv venligst igen!</h2>';
			
				echo '</div>';
			echo '</div>';
		
		}
	}	

	?>


	<div id="wrapper">

		<form name="registrering-form" class="registrering-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

			<div class="header">
			<h1>Opret Bruger</h1>
			<span>Udfyld oplysningerne herunder for at oprette bruger.</span>
			</div>

			<div class="content">
			<input name="un" type="text" class="input username" placeholder="Brugernavn" required/>
			<div class="user-icon"></div>
			<input name="pw" type="password" class="input password" placeholder="Adgangskode" required/>
			<div class="pass-icon"></div>		
			</div>

			<div class="footer">
			<input type="submit" name="submit" value="Opret bruger" class="button" />
			<p>Har du allerede en bruger? <a href="login.php">Log ind her</a></p>
			</div>

		</form>

	</div>
	
	
</div>
	

</body>
</html>