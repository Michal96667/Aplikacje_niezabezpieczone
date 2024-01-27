<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: view_posts.php');
		exit();
	}

?>

	<!DOCTYPE HTML>

	<html lang="pl">

	<head>

		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Ogłoszenia IT</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="includes/stylei.css" media="all">
		<meta name="keywords" content="cms,data base" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
		<meta charset="utf-8" />

	</head>

	<body>

		<a href="../index.php"> Powrót do Menu </a>
		<?php   			
	
				
if (isset($_GET['insert'])){
	
	include("insert_post.php");
	
}
			
if (isset($_GET['view_posts'])){
	
	include("view_posts.php");
	

}	
			
if (isset($_GET['edit_post'])){
	
	include("edit_posts.php");
	
}	


    if (isset($_GET['delete_posts'])){
	
	include("delete_post.php");
	
}
    
?>

			<div class=container>

				<?php include("includes/head.php");?>
					<?php include("includes/nav.php");?>

						<?php include("includes/post_area.php");?>

							<?php include("includes/ad.php");?>

								<?php include("includes/footer.php");?>

			</div>
	</body>

	</html>