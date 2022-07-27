<?php

use App\Servaces\Page;
if($_SESSION['user'] && $_SESSION['user']['group'] != 2){
  \App\Servaces\Rout::redirect('/profile');
}

Page::slice('head');
Page::slice('navbar');


?>

<h2 class="title m-4">Сторінка адміністратора</h2>

</body>

</html>