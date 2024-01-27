<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}

?>

	<!DOCTYPE HTML>
	<html lang="pl">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Ogłoszenia IT</title>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>

	<body>

		<div class="container">

			<div class="col-md-12">

				<?php echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';?>

					<br>

					<center>

						<table class="table table-bordered">
							<font size="3">

                                <tr>
                                   
                                        <h5><b><center>BADANIA PRACY MAGISTERSKIEJ</center></b></h5>
								
                                </tr>

                                <tr align="center">

                                    <th>Ogłoszenie</th>
                                    <th>Tytuł posta</th>
                                    <th>Imię</th>
                                    <th>Zdjęcie</th>
                                    <th>Data</th>
                                    <th>Zobacz post</th>
                                    <th><a href="insert_post.php?insert_post=<?php echo $post_id; ?>">Dodaj</a> </th>
                                    <th>Modyfikuj</th>
                                    <th>Usuń</th>

 <hr>
	<Godzina:
	<div id="zegarek" style="FONT-WEIGHT:bold;font-size:18px;COLOR:#03263E; MARGIN-LEFT: 4PX;"></div>
<script type="text/javascript">
function zegar() {
var data = new Date();
var godzina = data.getHours();
var min = data.getMinutes();
var sek = data.getSeconds();
 var terazjest = ""+godzina+
((min<10)?":0":":")+min+
((sek<10)?":0":":")+sek;
document.getElementById("zegarek").innerHTML = terazjest;
setTimeout("zegar()", 1000); }
zegar();
</script>
               
                                </tr>

                                <?php
                                include ("db.php");
								$issued_by = $_SESSION['id'];
								
                             $run_posts = $db -> query("select posts.post_title, posts.post_author, post_date, posts.post_id, posts.post_image from posts, users where posts.issued_by = users.id AND users.id  = '".$issued_by."'");
				
                                $i=1; 
                                while($row_posts = $run_posts ->fetch(PDO::FETCH_ASSOC)) {

									$issued_by = $_SESSION['id'];
                                    $post_id = $row_posts ['post_id'];
                                    $post_title = $row_posts ['post_title'];
                                    $post_author = $row_posts ['post_author'];
                                    $mpost_image = $row_posts ['post_image'];
                                    $post_date = $row_posts ['post_date'];
									 $id_user = $row_posts ['id'];
                                ?>

                                <tr align="center">
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $post_title; ?>
                                    </td>
                                    <td>
                                        <?php echo $post_author; ?>
                                    </td>

                                    <td><a href="details.php?post=<?php echo $post_id;?>"><img src="news_images/<?php echo $mpost_image; ?>" width="80" height="50" /></a></td>
                                    <td>
                                        <?php echo $post_date; ?>
                                    </td>

                                </font>
							</td>
							<td><a href="details.php?post=<?php echo $post_id; ?>">Zobacz post</a></td>
							<td><a href="insert_post.php?insert_post=<?php echo $post_id; ?>">Dodaj</a></td>
							<td><a href="edit_post.php?edit_post=<?php echo $post_id; ?>">Edytuj</a></td>
							<td><a href="includes/delete_post.php?delete_post=<?php echo $post_id; ?>">Usuń</a></td>

							</tr>

							<?php } ?>

						</table>
					</center>

	</body>

	<div class="col-xs-4">

	</div>

	</html>