<div class="post_area">

	<?php
	include("db.php");
	if(!isset($_GET['post_cat'])){


	$get_posts = $db -> query("select * from posts order by 1 desc limit 0,1");
    while($row_posts = $get_posts ->fetch(PDO::FETCH_ASSOC)) {
		
							$post_id = $row_posts['post_id'];
							$post_title = $row_posts['post_title'];
							$post_date = $row_posts['post_date'];
							$post_author = $row_posts['post_author'];
							$post_image = $row_posts['post_image'];
							$post_content = $row_posts['post_content'];	
		
		echo "</br></br><h4><a id='ltitle' href ='details.php?post=$post_id'>$post_title</h4>
        <span><i>Ogłoszenie od: &nbsp</i>$post_author,&nbsp&nbsp$post_date</span> 

		<img src='news_images/$post_image' width='180' height='90' class='img-responsive'></a>			
				<div>$post_content<a id='rmlink' href ='details.php?post=$post_id'></a></div></br>
		
				";				
	}
							
	}

else

		if(isset($_GET['post_cat'])){	
		$cat_id = $_GET['post_cat'];
		
	
		$get_posts = $db -> query("select * from posts where category_id='$cat_id'");
    while($row_posts = $get_posts ->fetch(PDO::FETCH_ASSOC)) {
		
							$post_id = $row_posts['post_id'];
							$post_title = $row_posts['post_title'];
							$post_date = $row_posts['post_date'];
							$post_author = $row_posts['post_author'];
							$post_image = $row_posts['post_image'];

							$post_content = substr($row_posts['post_content'],0,0.5);
					
		echo "</br></br><h4><a id='ltitle' href ='details.php?post=$post_id'>$post_title</h4>
        <span><i>$post_date&nbsp&nbsp&nbspOgłoszenie od: &nbsp</i>$post_author</span> 
     
		<img src='news_images/$post_image' width='150' height='100' class='img-responsive'></a>			
				<div>$post_content<a id='rmlink' href='details.php?post=$post_id'>czytaj całość</a></div></br></br>
				
		
				";				}
	}
							
?>
</div>