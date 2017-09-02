
<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Orange Sky - Den Hemmelige Verden</title>

<link rel="stylesheet" href="browser_reset.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="style_contentpage.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates|Roboto" rel="stylesheet">

<script type="text/javascript" src="jquery-1.2.6.min.js"></script>


<script type="text/javascript">
    
        $(document).ready(function() {
         
              setInterval( function() {
              var seconds = new Date().getSeconds();
              var sdegree = seconds * 6;
              var srotate = "rotate(" + sdegree + "deg)";
              
              $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});
                  
              }, 1000 );
              
         
              setInterval( function() {
              var hours = new Date().getHours();
              var mins = new Date().getMinutes();
              var hdegree = hours * 30 + (mins / 2);
              var hrotate = "rotate(" + hdegree + "deg)";
              
              $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
                  
              }, 1000 );
        
        
              setInterval( function() {
              var mins = new Date().getMinutes();
              var mdegree = mins * 6;
              var mrotate = "rotate(" + mdegree + "deg)";
              
              $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
                  
              }, 1000 );
         
        }); 
    
</script>


</head>

<body>


<?php
	if(empty($_SESSION['uid'])){
		echo '<div class="fail col-1-1">';
		
			echo '<h1>Du skal være logget ind for at se indholdet på denne side</h1>';
		
		echo '</div>';
		
		echo '<div class="buttons col-1-1">';
		
			echo '<a id="a1" href="registrer.php"><button class="button1">Opret bruger</button></a>';
			echo '<a id="a2" href="login.php"><button class="button2">Log ind</button></a>';
		
		echo '</div>';
	}
	
	else {
		
		echo'<div class="button_logout">';
			echo '<a id="logout" href="logout.php"><button class="button1">Log ud</button></a>';
		echo '</div>';
		
		echo '<h1 class="header col-1-1">Velkommen til den Orange Sky, ' .$_SESSION['username']. '</h1>';
		echo '<h2 class="header2 col-1-1">Du kan her se hvad klokken er der hvor du befinder dig</h2>';
		
		echo '<div class="clock">';
		echo '<ul id="clock">';
			echo '<li id="sec"></li>';
			echo '<li id="hour"></li>';
			echo '<li id="min"></li>';
		
		echo '</ul>';
		echo '</div>';
			
		
	}
	
?>


	
	   	
	   	
		
	




</body>
</html>