<!DOCTYPE HTML>

<html lang="pl">

<head>
	<link rel="stylesheet" a href="includes/stylei.css" media="all">

	<meta charset="utf-8" />
	<title>Ogłoszenia IT</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

</head>

<body>
	<div class=container>

		<?php include("includes/head.php");?>
			<?php include("includes/nav.php");?>


				<div class="post_area">

					<?php
	
	include ("db.php");
	if(isset($_GET['search'])){

//	echo
	$get_query = $_GET['search_query'];
			
			$get_query_filtred = preg_replace("#[^0-9a-z]#i","",$get_query);

		if($get_query==''){
			
			echo "<script>alert('Proszę uzupełnić puste pole')</script>";
			echo"<script>window.open('index.php','_self')</script>";
			exit();
						
		}

            $get_posts = $db -> query("select * from posts where post_title like '%$get_query_filtred%'");


        while($row_posts = $get_posts ->fetch(PDO::FETCH_ASSOC)) {
            
    

							$post_id = $row_posts['post_id'];
							$post_title = $row_posts['post_title'];
							$post_date = $row_posts['post_date'];
							$post_author = $row_posts['post_author'];
							$post_image = $row_posts['post_image'];
							$post_content = substr($row_posts['post_content'],0,0.5);	
								
					
            echo "	<?php print_r( $db->errorInfo()  ?>

						</br>
						</br>
						<h4><a id='ltitle' href ='details.php?post=$post_id'>$post_title</h4>
						<span><i>Ogłoszenie od: &nbsp</i>$post_author,&nbsp&nbsp$post_date</span>


						<img src='news_images/$post_image' width='150' height='100' class='img-responsive'></a>
						<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>czytaj całość</a></div>
						</br>
						</br>


						"; } } else if(isset($_GET['post_cat'])){ $cat_id = $_GET['post_cat']; $get_posts = "select * from posts where category_id='$cat_id'"; $run_posts = $db -> query("select * from posts where category_id='$cat_id'"); while($row_posts =$run_posts ->fetch(PDO::FETCH_ASSOC)) { $post_id = $row_posts['post_id']; $post_title = $row_posts['post_title']; $post_date = $row_posts['post_date']; $post_author = $row_posts['post_author']; $post_image = $row_posts['post_image']; $post_content = substr($row_posts['post_content'],0,300); echo "
						<h3><a id='ltitle' href ='details.php?post=$post_id'>$post_title</a></h3>

						<span><i>Ogłoszenie od: &nbsp</i>$post_author,&nbsp&nbsp$post_date</span>

						<img src='news_images/$post_image' width='100' height='100' />
						<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>czytaj więcej</a></div>
						<br /> "; } } ?>

				</div>

				<?php include("includes/ad.php");?>
					<?php include("includes/footer.php");?>
	</div>

</body>

</html>