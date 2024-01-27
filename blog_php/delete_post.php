<?php
session_start();

?>

	<!DOCTYPE HTML>

	<html lang="pl">

	<head>
		<link rel="stylesheet" href="css/style2.css" media="all">
		<meta charset="utf-8" />
		<title>Ogłoszenia IT!</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


	</head>

	<?php
include("connect.php");
	
	if(isset($_GET['delete_post'])){

		$delete_id = $_GET['delete_post'];
		
		$delete_post = "delete from posts where post_id='".$delete_id."'";
		
		$run_delete = mysqli_query($connect, $delete_post);

	echo "<script>alert('Post został usunięty!')</script>";
		
		echo "<script>window.open('../view_posts.php','_self')</script>";
	}
    ?>