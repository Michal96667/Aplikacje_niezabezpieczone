<?php
	
	include("db.php");
	
if (isset($_GET['post'])){
			
 $post_id = $_GET['post'];
$get_cats = $db -> query("select * from posts  where post_id='$post_id'");
    while($cats_row = $get_cats ->fetch(PDO::FETCH_ASSOC)) {
				
                        $post_new_id =$cats_row['post_id'];
        
    }
	
	?>

	<?php
	
	include("db.php");
	

$run_comments = $db -> query("select * from comments where post_id='".$post_new_id."'");
    while($row_comments = $run_comments ->fetch(PDO::FETCH_ASSOC))
    {
                    $comment_name = $row_comments['comment_name'];
	                $comment_text = $row_comments['comment_text'];
                    $comment_date = $row_comments['comment_date'];

	}
	
	?>

		<form method="post" align="center" action="details.php?post=<?php echo $post_new_id; ?>" <table width="730" align="center" bgcolor="#fbfbfb">

			<tr>
				<td align="right"><strong><i>Komentuje:</i></strong></td>
				<td>
					<Input type="text" name="comment_name" size="43" />
				</td>
			</tr>

			<tr>
				<td align="right" valign="middle"><strong>Twoja odpowiedź</strong></td>
				<td>
					<textarea name="comment_text" cols='40' rows='14'></textarea>
				</td>
			</tr>


			<tr>
				<td colspan="2" align="center"><strong></strong></td>
				<td>
					<Input type="submit" name="sub" value="odpowiedz" />
				</td>
			</tr>

			</table>
		</form>

		<?php

include("db.php");
	if(isset($_POST['sub']))
	
	{
		

$comment_name = $_POST['comment_name'];
	
	 $comment_text = $_POST['comment_text'];
     $comment_date = date('Y-m-d, H:i');

	if($comment_name=='' or $comment_text=='') {

	echo "<script>window.open('details.php?post=$post_id')</script>";
	exit();
}
		
	else {
        

	 $insert_comment = $db->prepare("INSERT into comments (post_id, comment_name, comment_date, comment_text) VALUES (:post_id, :comment_name, :comment_date, :comment_text)");
		
if ($insert_comment->execute(array(':post_id' => $post_new_id, ':comment_name' => $comment_name, ':comment_date' => $comment_date,':comment_text' => $comment_text))){

         $post_id = $_GET['post'];

			echo "<script>window.open('details.php?post=$post_id','_self')</script>";	

		}

	}}
			
	}