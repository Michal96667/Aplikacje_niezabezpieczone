<!DOCTYPE HTML>
<html lang="pl">

<head>
	<title>Moje dane</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="col-md-12">

			<a href="../index.php"> Powrót do Menu </a>
			</br>
			</br>
			<h2><b>Moje dane</b></h2>
			</br>
			</br>
			TEST - badanie SQL injection
			</br>
			</br>

			sposób: login: aaa , hasło: [' OR 1=1 -- ]

			<p>[' union select id, user, pass, email from users where id = 2 -- ]</p>

			</br>
			</br>
			<form method="post" action="index.php">

				<input type="text" class="form-control" placeholder="Login" name="user" autocomplete="on" maxlength="80" size="80">
				</br>
				<input type="password" class="form-control" placeholder="Password" name="pass" autocomplete="off" maxlength="140" size="70">
				</br>

				<input type="submit" class="form-input btn-login" value="Zaloguj się">
			</form>

</HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>

<BODY>

	</ul>
	</div>
	</nav>

	<?php

	session_start();
$user=$_POST['user']; 
$pass=$_POST['pass']; 

  require_once "connect.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		  echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
		echo "Error: ".$polaczenie->connect_errno."Error: ".$polaczenie->connect_error;
			$_SESSION['blad'] = '<span style="color:red">Nieprawidlowy login lub haslo!</span>';
	}
	else
	{
	
	if ($rezultat = $polaczenie->query(
		sprintf("SELECT * FROM users1 WHERE user='".$user."' AND pass='".$pass."'")));
		
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
			 $wiersz = $rezultat->fetch_array();
				var_dump($wiersz);
				$_SESSION['id'] = $wiersz['id'];
			$_SESSION['user'] = $wiersz['user'];
				$_SESSION['pass'] = $wiersz['pass'];
				$_SESSION['email'] = $wiersz['email'];
					unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: index2.php');
                echo "<p><b><span style='color:green'>Witaj  </spadn></b>".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
      
					echo $_SESSION['id']."<br/>".$_SESSION['user']."<br/>"; 
				echo $_SESSION['pass']."<br/>".$_SESSION['email']; 
			
			}
			else   
			{

		    }

		}
		
		$polaczenie->close();
	}
						
 } catch (mysqli_sql_exception $e) { 
		
            echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
            exit; 

 }

?>
</BODY>
</div>
</div>

</HTML>