<?php

session_start();

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		
	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
		
	}

?>

	<!DOCTYPE HTML>
	<html lang="pl">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Ogłoszenia IT</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="chrome=1">
		<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<script src="./src/script.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

	</head>

	<div class="nav">

		<ul id="menu">

			<?php
	
	include ("db.php");
	
            
            $get_ca = $db -> query("select * from categories");
        while($ca_row = $get_ca ->fetch(PDO::FETCH_ASSOC)) {

            $cat_id=$ca_row['cat_id'];
            $cat_title=$ca_row['cat_title'];
            echo "<li><a class='btn btn-primary' href='index.php?post_cat=$cat_id'>$cat_title</a></li>";

	}
	

	?>

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal">
					Zaloguj się
				</button>

		</ul>
	</div>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="action-title">Logowanie</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="horizontally-aligned">
						<a href="https://fontawesome.com/v4.7.0/icon/github"><i class="fab fa-github-square fa-4x" style="color: #413B3B"></i></a>
						<a href="https://aboutme.google.com/u/0/?referer=gplus"><i class="fab fa-google-plus-square fa-4x" style="color: #F94A35"></i></a>
						<a href="https://facebook.com"><i class="fab fa-facebook-square fa-4x" style="color: #435CAC"></i></a>
					</div>
				</div>
				<div class="horizontally-aligned">
					<div class="horizontal-line"></div>
					<div class="horizontal-line"></div>
				</div>
				<div id="login-form">
					<form action="login.php" class="container" method="post">
						<input type="text" class="form-control" placeholder="Login" name="login" autocomplete="off">
						</br>
						<input type="password" class="form-control" placeholder="Password" name="haslo" autocomplete="off">
						</br>
						<input type="submit" class="form-input btn-login" value="Zaloguj się">
					</form>
					<div class="modal-footer">

					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>