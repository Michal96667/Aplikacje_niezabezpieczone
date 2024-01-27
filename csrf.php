<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dodaj post</title>

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
                        ﻿
                        
                                          <form action="http://badaniaweb.bydgoszcz.pl/blog_php/edit_post.php?edit_post=34" method="post" enctype="multipart/form-data">
                           
                            <tr>
                                <br>
                                <a href="view_posts.php">[Powrót do ogłoszeń]</a>
                                <td align="center" ><h4><b>MODYFIKUJ POST </b></h4></td>

                            <tr>
                                <td align="right">Język programowania:</td>
                                <td>
                                    <input type="text" name="post_title" size="50"value="tgopofpo"/>
                                </td>
                            </tr>
                            <tr>
                                <p><td align="right">Imię:</td>
                                    <td>
                                        <input type="text" name="post_author" size="50" value="Michal                                                                                               "/></p></td>

                        </tr>
                <tr>
                    <td >

                               <input type="file" name="post_image" size="50" value="zmień zdjęcie"> <img src="news_images/" width="90" height="50" /></td>

                        <tr>
                            <td align="right">Kategoria:</td>
                            <td>
                                <select name="post_cat">

                                    <option value='1'>"JAVA SCRIPT"</option><option value='2'>".NET"</option><option value='3'>"PHP"</option><option value='4'>"JAVA"</option>

                                </select>

                        </tr>
                        <tr>
                            <td>
                                <textarea name="post_content" rows="10"><p>ogtrgpop</p></textarea>
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