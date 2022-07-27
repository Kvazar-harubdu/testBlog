<?php

use App\Servaces\Page;

if ($_SESSION['users']) {
\App\Servaces\Rout::redirect('/profile');
}

Page::slice('head');
Page::slice('navbar');
?>

<div class="form-wrap">
  <h3 class="title-form">Вхід для зареєстрованих</h3>
  <form action="/auth/login" method="POST" class="form">
    <label>Ваш позивний</label>
    <input type="text" name="userName" placeholder="Ведіть ваше ім'я">
    <label>Кодове слово</label>
    <input type="password" name="pass" placeholder="Захист від окупанта">
    <button type="submit">Слава Україні!</button>
  </form>
</div>
</body>
</html>