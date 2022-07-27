<?php

use App\Servaces\Page;

if ($_SESSION['users']) {
  \App\Servaces\Rout::redirect('/profile');
}

Page::slice('head');
Page::slice('navbar');
?>

<div class="form-wrap">
  <h3 class="title-form">Приєднайся до наших лав</h3>
  <form action="/auth/register" method="POST" enctype='multipart/form-data'>
    <label>Створіть позивний</label>
    <input type="text" name="userName" placeholder="Ведіть Ваше ім' я">
    <label>Ваша скринька</label>
    <input type="email" name="email" placeholder="Ведіть адрес скриньки">
    <label>Ваша аватар</label>
    <input type="file" name="avatar" style="border: none;">
    <label>Застосуйте кодове слово</label>
    <input type="password" name="pass" placeholder="Захист від окупанта">
    <label>Повторіть кодове слово</label>
    <input type="password" name="passAgen" placeholder="Джевелін в дії">
    <button type="submit">Смерть ворогам!</button>
  </form>
</div>
</body>

</html>