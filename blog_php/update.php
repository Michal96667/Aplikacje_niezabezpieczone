<!DOCTYPE HTML>

<html lang="pl">

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ogłoszenia IT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="includes/stylei.css" media="all">
	<meta name="description" content="Serwis" />
	<meta name="keywords" content="cms,data base" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Cabin&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">


</head>

<?php 
	session_start();
require_once("connection.php");

if(isset($_POST['UP']))
{
        
    $User_ID = $_GET['ID'];
   $post_title = $_POST['post_title'];
    $post_cat = $_POST['post_cat'];
    $post_date = date('Y-m-d, H:i');
    $post_author = $_SESSION['user']; 
	$post_content = $_POST['post_content'];
   $post_image = $_FILES['post_image']['name'];
    $image_tmp = $_FILES['post_image']['tmp_name'];
    
  if ($post_title=='null' or  $post_content=='null'){

            echo "<script>alert('Proszę o wpisanie pustych miejsc')</script>"; 

            exit();
        }

    else {

        move_uploaded_file($image_tmp,"news_images/$post_image");
        
$query  =  "UPDATE posts SET category_id = '".$post_cat."', post_title = '".$post_title."', post_date = '".$post_date."', post_author = '".$post_author."', post_image = '".$post_image."', post_content = '".$post_content."' WHERE post_id = '".$User_ID."'"; 
    
    require_once("connection.php");
    $result = mysqli_query($con,$query);

    if($result)
    {
        
        echo "<script>alert ('Zmodyfikowano post!')</script>";
        echo "<script>window.open('view_posts.php','_self')</script>";	
    }
    else
    {
        echo ' Sprawdź dane!';
    }
}
}
?>

	<div class="col-xs-4">

	</div>

	<?php
if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</html>