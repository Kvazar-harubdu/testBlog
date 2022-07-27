<?php

use App\Servaces\Page;


Page::slice('head');
Page::slice('navbar');

//api
$date = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
$course = json_decode($date, true);

//posts
$element = R::find('posts');
$avthor = R::find('users');
?>
<div class="container">
  <div class="slider">
    <div class="slider__container">
      <div class="slider__img">slider-1</div>
      <div class="slider__img">slider-2</div>
      <div class="slider__img">slider-3</div>
      <div class="slider__img">slider-4</div>
      <div class="slider__img">slider-5</div>
    </div>
    <a href="#" class="slider__btn action-prev" data-dir="prev">prev</a>
    <a href="#" class="slider__btn action-next" data-dir="next">next</a>
  </div>
</div>
<h2 class="title m-4">Курси валют</h2>
<div class="container-md">
  <table class="table table-primary table-striped-columns">
    <thead>
      <tr>
        <th scope="col">Код валюти</th>
        <th scope="col">Код національної валюти</th>
        <th scope="col">Курс купівлі</th>
        <th scope="col">Курс продажу</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($course as $item) : ?>
        <tr>
          <?php foreach ($item as $content) : ?>
            <td> <?= $content ?> </td>
          <?php endforeach ?>
        </tr>
      <?php endforeach ?>
    </tbody>
    <tfoot></tfoot>
  </table>

  <div class="box">
    <?php foreach ($element as $item) : ?>
      <h3 class="title"><?= $item->title ?></h3><br>
      <p class="text"><?= $item->description ?></p><br>
      <div class="wrap-btn">
        <a href="/upDataForm?id=<?= $item->id ?>" class="udate">редагувати запис</a>
        <a href="/home?id=<?= $item->id ?>" class="udate">видалити запис</a>
      </div>
      <hr>
      <div class="author-box">
        <spam class="name-athor"><? $item->name ?></spam>
      </div>
    <?php endforeach; ?>
  </div>

</div>
<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>