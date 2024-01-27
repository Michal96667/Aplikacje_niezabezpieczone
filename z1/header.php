<!doctype html>
<html lang="pl">

<head>
	<title>Moje dane</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>

<body class="bg-">
	<?php
		session_start();
    	  echo "<p><b><span style='color:green'>Witaj  </spadn></b>".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
			?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index10.php">Goście <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index2.php">Strona główna</a>

					</li>
					<a class="nav-link" href="create.php">Utwórz wpis</a>
					</li>
					</li>

					<li class="nav-item">

					</li>
				</ul>
			</div>

		</nav>
		<div class="col-md-4">

			<?php
echo $_SESSION['id']."<br/>".$_SESSION['user']."<br/>"; 
				echo $_SESSION['pass']."<br/>".$_SESSION['email']; 
											
		?>
		</div>