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

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	</head>

	<body>

		<div class="container">
			<div class="col-md-12">
				<br>
				<a href="view_posts.php">[Powrót do ogłoszeń]</a>

				<body>
					<font size="3">
                            <form method="post" action="insert_post.php?insert" enctype="multipart/form-data">

                               <table font-family="sans-serif"   >

                                    <tr>
                                        <td align="center"  font-family="sans-serif">
                                            <h5><b>DODAJ POSTA</b></h5>
                                        </td>

                                    <tr>
                                        <td font-family="sans-serif" align="right">TYTUŁ POSTA:</td>
                                        <td>
                                            <input type="text" name="post_title" size="50">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td font-family="sans-serif" align="right" >ZAŁĄCZ ZDJĘCIE:</td>
                                        <td>
                                            <input type="file" name="post_image" >
                                        </td>
                                    <tr>
                                        <td font-family="sans-serif" align="right" >KATEGORIA JĘZYKA:</td>
                                        <td>
                                            <select name="post_cat">
                                                <option>Wybierz?</option>

                                                </font>
					<?php

                                            include("db.php");


                                            $get_cats = $db -> query("select * from categories");
                                            while($cats_row = $get_cats ->fetch(PDO::FETCH_ASSOC)) {

                                                $cat_id=$cats_row['cat_id'];
                                                $cat_title=$cats_row['cat_title'];

                                                echo "<option value='$cat_id'>$cat_title</option>";	
                                            }

                                            ?>

						</select>

						</tr>
						<tr>
							<td align="right">Opis:</td>
							<td>
								<textarea name="post_content" size="100" cols="800" rows="12"></textarea>
							</td>
						</tr>
						<tr>
							<td align="center" colspan="6">
								<input type="submit" name="submit" value="DODAJ" </td>

						</tr>

						</table>
						</form>

				</body>

				<div class="col-xs-4">


				</div>


				<?php
    if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
    ?>



					<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
					<script>
						tinymce.init({
							selector: 'textarea'
						});
					</script>


	</html>

	<?php

include("db.php");
	if(isset($_POST['submit']))
	
	{

		$post_title = $_POST['post_title'];
		$issued_by = $_SESSION['id'];
		$post_author= $_SESSION['user'];
		$post_cat = $_POST['post_cat'];
        $post_date = date('Y-m-d, H:i');
		$post_content = $_POST['post_content'];
		$post_image = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];
				  
if ($post_title=='' or $post_cat=='null'  or $post_content==''){
						  
echo "<script>alert('Proszę o wpisanie pustych miejsc')</script>"; 

exit();
}
						  
else {
	
move_uploaded_file($image_tmp,"news_images/$post_image");

$insert_posts= $db->prepare("INSERT INTO posts  (category_id, post_title, post_date, post_author, post_image, post_content, issued_by) VALUES (:category_id, :post_title, :post_date, :post_author, :post_image, :post_content, :issued_by)");
	
if ($insert_posts->execute(array(':category_id' => $post_cat, ':post_title' => $post_title, ':post_date' => $post_date,':post_author' => $post_author, ':post_image' =>$post_image , ':post_content' =>$post_content, ':issued_by' => $issued_by))){		   

   echo "<script>alert ('Zapisano post!')</script>";


	}
}
}