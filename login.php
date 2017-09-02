<?php session_start(); ?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Orange Sky - Log ind</title>

<link rel="stylesheet" href="browser_reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="style_login.css">

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




		require_once('db_con.php');

		$sql = 'SELECT id, pwhash FROM users WHERE username=?';

		$stmt = $con->prepare($sql);
				$stmt->bind_param('s', $un);
				$stmt->execute();
				$stmt->bind_result($uid, $pwhash);

		while($stmt->fetch()) {};

		if (password_verify($pw, $pwhash)){
			
			echo '<div class="echo_registrering">';
				
				echo '<div class="echo_content">';
					echo '<h1>Velkommen ' .$un. '!</h1>';
					echo '<p>Du er nu logget ind på den Orange Sky.<p>';
					echo '<p style="margin-top: -80px;">Tryk på knappen herunder for at komme videre.</p>';

					echo '<a href="contentpage.php"><button style="margin-left: 20%;">Hemmelig verden</button></a>';	
			
				echo '</div>';
			echo '</div>';
			
			
			
			$_SESSION['uid'] = $uid;
			$_SESSION['username'] = $un;
		}
		
		
		

		else {
			
			echo '<div class="else_registrering">';
				
				echo '<div class="else_content">';
					echo '<h1>En fejl er sket!</h1>';
			
					echo '<h3 style="margin-top: -40px;">Du blev ikke logget ind på den Orange Sky.</h3>';
					
					echo '<h3 style="margin-top: -65px;">Brugernavn eller adgangskode er forkert.</h3>';
			
					echo '<h2>Prøv venligst igen!</h2>';
			
				echo '</div>';
			echo '</div>';
		}

		

	}



	?>	

<div id="wrapper">

	<form name="login-form" class="login-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	
		<div class="header">
		<h1>Log ind</h1>
		<span>Udfyld brugeroplysninger herunder.</span>
		</div>
	
		<div class="content">
		<input name="un" type="text" class="input username" placeholder="Brugernavn" required/>
		<div class="user-icon"></div>
		<input name="pw" type="password" class="input password" placeholder="Adgangskode" required/>
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<input type="submit" name="submit" value="Log ind" class="button" />
		<p>Har du ikke en bruger? <a href="registrer.php">Opret en her</a></p>
		</div>
	
	</form>

</div>
	
	




</div>

</body>
</html>