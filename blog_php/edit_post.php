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

		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector: 'textarea'
			});
		</script>

	</head>

	<body>
		<div class="container">
			<div class="col-md-12">

				<font size="3">
                        <?php
                   if (isset($_GET['edit_post'])) {

                                require_once("connection.php");
                            $edit_id = $_GET['edit_post'];
                
                            $query = "select * from posts where post_id='".$edit_id."'";
                            $result = mysqli_query($con,$query);

                            while($row_post=mysqli_fetch_assoc($result))
                            {
                                
                                $User_ID = $row_post ['post_id'];                     
                                $title = $row_post ['post_title'];
                                $post_cat = $row_post ['category_id'];
                                $author = $row_post ['post_author'];
                             
                                $post_image = $row_post ['post_image'];
                                $content = $row_post ['post_content'];

                        
                            }
                        }

                        ?>
  
                        <form action="update.php?ID=<?php echo $User_ID ?>" method="post" enctype="multipart/form-data">
                           
                            <tr>
                                <br>
                                <a href="view_posts.php">[Powrót do ogłoszeń]</a>
                                <td align="center" ><h4><b>MODYFIKUJ POST </b></h4></td>

                            <tr>
                                <td align="right">Język programowania:</td>
                                <td>
                                    <input type="text" name="post_title" size="50"value="<?echo $title; ?>"/>
                                </td>
                            </tr>

                <tr>
                    <td >

                                <input type="file" name="post_image" size="50" value="zmień zdjęcie"> <img src="news_images/<?php echo $image; ?>" width="90" height="50" /></td>

                        <tr>
                            <td align="right">Kategoria:</td>
                            <td>
                                <select name="post_cat">

                                    <?php
                      
                                    require_once("connection.php");
                                    $query = " select * from categories ";
                                    $result = mysqli_query($con,$query);

                                    while($row=mysqli_fetch_assoc($result))
                                    {

                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>";	


                                    }

                                    ?>


                                </select>

                        </tr>
                        <tr>

                            <td>

                                <textarea name="post_content" rows="10"><?echo $content; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="6">
                                <input type="submit" name="UP" value="zmień" /></td>

                        </tr>

                        </table>
               			</form>
                        </body>

                        
    </div>

</div>