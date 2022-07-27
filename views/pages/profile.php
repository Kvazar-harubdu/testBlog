<?php

use App\Servaces\Page;


if (!$_SESSION['user']) {
  \App\Servaces\Rout::redirect('/login');
};


Page::slice('head');
Page::slice('navbar');
?>

<h2 class="title m-4">Вітаємо <?= $_SESSION['user']['userName'] ?> Ви зареєструвалися</h2>
<img src="<?= $_SESSION['user']['avatar'] ?>" height="300" alt="">

<div class="container-md">
  <form action="/auth/profile" method="POST">
    <div class="mb-3">
      <label class="form-label">Назва Вашої історії</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
      <label class="form-label">Ваша історія</label>
      <textarea class="form-control" rows="8" style="resize: none;" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Поділитися</button>
  </form>
</div>
</body>

</html>