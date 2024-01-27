<!DOCTYPE HTML>
<html lang="pl">

<head>
	<link rel="stylesheet" href="includes/stylei.css" media="all">
	<meta charset="utf-8" />
	<title>Ogłoszenia IT</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

</head>

<body>

	<a href="../index.php"> Powrót do Menu </a>

	<div class=container>

		<?php include("includes/head.php");?>
			<?php include("includes/nav.php");?>

				<div class="post_area">


					<?php

	include("db.php");
		if (isset($_GET['post'])){
   
                $post_id = $_GET['post'];  
            $run_posts = $db -> query("select * from posts  where post_id='$post_id'");			
            while($row_posts = $run_posts  ->fetch(PDO::FETCH_ASSOC)) {

							$post_title = $row_posts['post_title'];
							$post_date = $row_posts['post_date'];
							$post_author = $row_posts['post_author'];
							$post_image = $row_posts['post_image'];
							$post_content = $row_posts['post_content'];
	
		echo "
		<h3>$post_title</h3>
		 <span><i>Ogłoszenie od: &nbsp</i>$post_author,&nbsp&nbsp$post_date</span> 
        
		<img src='news_images/$post_image' width='300' height='220'/>			
				<div>$post_content
                </div>
                  <div> </br></br> </br>  </br> </div>";	

	}
	}
	

	$post_id=$_GET['post'];

        $get = $db -> query("select * from comments where post_id='$post_id'");			

    while($row = $get ->fetch(PDO::FETCH_ASSOC)) {


							$author= $row['comment_name'];
							$date = $row['comment_date'];
							$content = $row['comment_text'];

                
		echo "
        <span><i>Ogłoszenie od: &nbsp</i>$author,&nbsp&nbsp$date</span> 
		<p>	$content</p>
       <p> ------------------------------------------------------------</p></p>
       
            ";
            
	}

	?>
				</div>
				<?php include("includes/ad.php");?>

					<?php include("includes/comment_form.php");?>

						<?php include("includes/footer.php");?>
	</div>

</body>

</html>