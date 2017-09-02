<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Du er nu logget ud - Orange Sky</title>

<link rel="stylesheet" href="browser_reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="style_logout.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates|Roboto" rel="stylesheet">

</head>

<body>
<h1>Du er nu logget ud!</h1>
<h2>Vi ses igen en anden gang</h2>

<div class="col-1-1">
	<a href="index.php"><button>Til forsiden</button></a>
</div>

</body>
</html>