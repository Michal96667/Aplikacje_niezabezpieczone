<div class="ad">
	<div class="recent_posts">
		<div id='title_ad'>Posty przychodzące</div>

		<form method="get" action="results.php" enctype="multipart/form-data" role="search">
			<input type="text" name="search_query" placeholder="wpisz........." />
			<p>
				<input type="submit" name="search" value="Szukaj" />
			</p>

		</form>
		<?php
		
			include("db.php");
					
            
                $run_posts = $db -> query("select * from posts  order by 1 desc limit 0,8");
            while($row_posts = $run_posts ->fetch(PDO::FETCH_ASSOC)) {

							
							$post_id = $row_posts['post_id'];
							$post_title = $row_posts['post_title'];
							$post_image = $row_posts['post_image'];
							
	echo "<div class='recent_posts'>
 <h3><a href='details.php?post=$post_id'>$post_title</a></h3>

				<a href ='details.php?post=$post_id'>
		<img src='news_images/$post_image' width='120' height='100'/></a>		
        
 
	</div>
	";
							
		}
		
		?>
	</div>
</div>