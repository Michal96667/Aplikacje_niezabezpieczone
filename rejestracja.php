<!doctype html>
<html lang="en">

<head>
	<title>Ogłoszenia IT</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
</head>

<body class="bg-">
	<a href="../index.php"> Powrót do menu</a></br>
	<a href="../blog_php/index.php"> Zaloguj się do Ogłoszenia IT </a>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		</ul>

		</div>

	</nav>

	<div class="col-md-4">

		<?php

	session_start();
	
	if (isset($_POST['email']))
	{

		$wszystko_OK=true;
		
		$nick = $_POST['nick'];	
	
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Login musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Login może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		$pass = $_POST['pass'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($pass)<4) || (strlen($pass)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 6 do 18 znaków!";
		}
		
		if ($pass!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = md5($pass);
		
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}				
		
        $sekret = "6Le-ZrcUAAAAACheZjVii45-nlGM-Of780W32eHo";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if ($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Potwierdź, że nie jesteś komputerem!";
		}		

		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_pass'] = $pass;
		$_SESSION['fr_haslo2'] = $haslo2;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{

				$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		


				$rezultat = $polaczenie->query("SELECT id FROM users WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już uzytkownik o takim loginie! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{

					
					if ($polaczenie->query("INSERT INTO users VALUES (NULL,'$nick', '$haslo_hash', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						
						echo "<script>alert('Konto zostało założone! Możesz się zalogować!')</script>";
						
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy, brak dostępu</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
	}
	
?>

			<!DOCTYPE HTML>
			<html lang="pl">

			<head>
				<meta charset="utf-8" />
				<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
				
				<script src='https://www.google.com/recaptcha/api.js'></script>

				<style>
					.error {
						color: red;
						margin-top: 10px;
						margin-bottom: 10px;
					}
				</style>
			</head>

			<body>

				<form method="post">

					Podaj login:
					<br />
					<input type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" />
					<br />

					<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>

						E-mail:
						<br />
						<input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" />
						<br />

						<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>

							Twoje hasło:
							<br />
							<input type="password" value="<?php
			if (isset($_SESSION['fr_pass']))
			{
				echo $_SESSION['fr_pass'];
				unset($_SESSION['fr_pass']);
			}
		?>" name="pass" />
							<br />

							<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>

								Powtórz hasło:
								<br />
								<input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" />
								<br />

								<label>
									<input type="checkbox" name="regulamin" <?php if (isset($_SESSION[ 'fr_regulamin'])) { echo "checked"; unset($_SESSION[ 'fr_regulamin']); } ?>/> Akceptuję regulamin
								</label>

								<?php
			if (isset($_SESSION['e_regulamin']))
			{
				echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
				unset($_SESSION['e_regulamin']);
			}
		?>
									<div class="g-recaptcha" data-sitekey="6Le-ZrcUAAAAAGQSHJTaES22u2PJ0FVtTyFtiafz"></div>


									<?php
			if (isset($_SESSION['e_bot']))
			{
				echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
				unset($_SESSION['e_bot']);
			}
		?>

										<br />

										<input type="submit" value="Zarejestruj się" />

				</form>

			</body>

			</html>