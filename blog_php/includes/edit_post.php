<!DOCTYPE HTML>
<html lang="pl">

<head>

	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea'
		});
	</script>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Dołączanie nowego posta</title>
</head>


<div>

	<body bgcolor="gray">

		<?php
	include("mycmsdb.php");
	
	if (isset($_GET['edit_post'])) {
		
		$edit_id = $_GET['edit_post'];
		
		$select_post= "select * from posts where post_id='$edit_id'";
		
		$run_query = mysql_query($select_post);
		
		while ($row_post = mysql_fetch_array($run_query)){
			
			
					$post_id = $row_post ['post_id'];
					$title = $row_post ['post_title'];
					$post_cat = $row_post ['category_id'];
					$author = $row_post ['post_author'];
					$keywords = $row_post ['post_keywords'];
					$image = $row_post ['post_image'];
					$content = $row_post ['post_content'];

		
	}
	
	}
	

	
	?>


			<form action="includes/edit_post.php?edit_form=<?php echo $edit_post; ?>" method="post" enctype="multipart/form-data">

				<table width="1100" height="680" align="center" border="01">

					<tr>
						<td align="center" colspan="26">
							<h1>Modyfikuj ogłoszenie</h1>
						</td>

						<tr>
							<td align="right">Marka pojazdu:</td>
							<td>
								<input type="text" name="post_title" size="50" value="<?echo $title; ?>" />
							</td>
						</tr>
						<tr>
							<td align="right">Sprzedawca:</td>
							<td>
								<input type="text" name="post_author" size="50" value="<?echo $author; ?>
						" />
							</td>


						</tr>

						<tr>
							<td align="right">Telefon:</td>
							<td>
								<input type="text" name="post_keywords" size="50" value="<?echo $keywords; ?>" />
							</td>
						</tr>
						<tr>
							<td align="right">Załącz zdjęcie pojazdu:</td>
							<td>

								<input type="file" name="post_image" size="50"> <img src="news_images/<?php echo $image; ?>" width="90" height="50" /></td>

							<tr>
								<td align="right">Kategoria:</td>
								<td>
									<select name="post_cat">

										<?php

                            include("mycmsdb.php");

			$get_cats = "select * from categories where cat_id='$post_cat'";					
							
	$run_cats = mysql_query($get_cats) or die (mysql_error());
	while ($cats_row = mysql_fetch_array($run_cats)) {
		
	
						$cat_id=$cats_row['cat_id'];
						$cat_title=$cats_row['cat_title'];


		echo "<option value='$cat_id'>$cat_title</option>";	
		
		$get_more_cats = "select * from categories";
		
		$run_more_cats = mysql_query($get_more_cats);
		
		while ($row_more_cats = mysql_fetch_array($run_more_cats)){
			
			
						$cat_id=$row_more_cats['cat_id'];
						$cat_title=$row_more_cats['cat_title'];


		echo "<option value='$cat_id'>$cat_title</option>";	
		

		}
		

	}
	
	?>


									</select>

							</tr>
							<tr>
								<td align="right">Opis:</td>
								<td>
									<textarea name="post_content" cols="80" rows="15">
										<?echo $content; ?>
									</textarea>
								</td>
							</tr>
							<tr>
								<td align="center" colspan="6">
									<input type="submit" name="update" value="zmień" />
								</td>

							</tr>

				</table>
			</form>

			<?php

    include("mycmsdb.php");
	if(isset($_POST['update']))
	
	{		
		$update_id = $_GET['edit_form'];
		$post_title1 = $_POST['post_title'];
		$post_cat1 = $_POST['post_cat'];
		$post_date1 = date('d-m-y');
		$post_author1 = $_POST['post_author'];
		$post_keywords1 = $_POST['post_keywords'];
		$post_content1 = $_POST['post_content'];
		$post_image1 = $_FILES['post_image']['name'];
		$image_tmp = $_FILES['post_image']['tmp_name'];
						  
	if ($post_title1=='null' or $post_cat1=='null' or $post_keywords1=='null' or $post_author1=='null' or $post_content1=='null' or $post_image=='null'){
						  
echo "<script>alert('Proszę o wpisanie pustych miejsc')</script>"; 


exit();
}
						  
else {
	
	move_uploaded_file($image_tmp,"../news_images/$post_image1");
	


$update_posts = "update posts set category_id='$post_cat1',post_title='$post_title1',post_date='$post_date1',post_author='$post_author1',
post_keywords='$post_keywords1',post_image='$post_image1',post_content='$post_content1' where post_id='$update_id'";


			if(mysql_query($update_posts)){
				
				
		echo "<script>alert ('Ogłoszenie zostanie zmodyfikowane!')</script>";
		echo "<script>window.open('../index.php?view_posts','_self')</script>";	

	
}
}
}
	?>
	</body>
</div>

</html>