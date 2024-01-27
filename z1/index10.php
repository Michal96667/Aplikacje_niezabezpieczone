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

					</li>
					<li class="nav-item">
						<a class="nav-link" href="index2.php">Strona główna</a>
					</li>

					<li class="nav-item">

					</li>
				</ul>
			</div>
		</nav>
		<?php
$ipaddress = $_SERVER["REMOTE_ADDR"]; function ip_details($ip) { $json = file_get_contents ("http://ipinfo.io/{$ip}/geo"); $details = json_decode ($json); return $details; } $details = ip_details($ipaddress); $ip_g = $details -> ip; $region_g = $details -> region; $country_g = $details -> country; $city_g = $details -> city; $loc_g = $details -> loc; $czas1 = time ();
	$dbhost="localhost"; $dbuser="root"; $dbpassword=""; $dbname="michalc4_A";
		$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
			mysqli_select_db ($polaczenie, $dbname);
							$result_adres = mysqli_query($polaczenie, "SELECT `ip_nr` FROM `goscieportalu` WHERE `ip_nr`='$ip_g'");
						$rows = array();
						while ($row = mysqli_fetch_assoc($result_adres)) {
							$rows[] = $row;
						}
						if ($ip_g == @$rows[0]['ip_nr']) {
							
						}  else {
							
							$dodaj = mysqli_query($polaczenie, "INSERT INTO `goscieportalu` (`id`,`ip_nr`,`czas`,`region`,`country`,`city`,`location`) VALUES ('','".$ip_g."','".$czas1."','".$region_g."','".$country_g."','".$city_g."','".$loc_g."')");
					
						}
			
		$rezultat1 = mysqli_query ($polaczenie, "SELECT * FROM goscieportalu");
			print "<TABLE CELLPADDING=5 CELLSPACING=3 BORDER=2 ALIGN=CENTER>";
    
    print "<TR><TD>Numer IP</TD><TD>Czas</TD><TD>Miasto</TD><TD>Państwo</TD><TD>Region</TD></TR>\n";
			while ($wiersz1 = mysqli_fetch_array ($rezultat1)) {
				$ip = $wiersz1[1];
				$czas = $wiersz1[2];
				$region = $wiersz1[3];
				$country = $wiersz1[4];
				$city = $wiersz1[5];
				$location = $wiersz1[6];
				$czas2 = date ("r", $czas);
		
			print "<TR ALign=Centre><TD>$ip</TD><TD>$czas2</TD><TD><center>$city</center></TD><TD><center>$country</center></TD><TD>$region</TD>"?>

			<?php
			print "</TD></TR>\n";
			}
			print "</TABLE>";
			
		?>
</body>

</html>