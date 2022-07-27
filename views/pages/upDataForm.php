<?php

use App\Servaces\Page;

$servername = "localhost";
$database = "blog";
$username = "root";
$password = "";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// print_r($conn);

if (!$_SESSION['user']) {
  \App\Servaces\Rout::redirect('/login');
}

Page::slice('head');
Page::slice('navbar');

$postId = $_GET['id'];
$element = mysqli_query($conn, "SELECT * FROM `posts` WHERE `id` = '$postId'");
$element = mysqli_fetch_assoc($element);
?>

<div class="container-md">
  <form action="/auth/update" method="POST">

    <div class="mb-3">
      <label class="form-label">Назва Вашої історії</label>
      <input type="hidden" name="id" value="<?= $element['id'] ?>">
      <input type="text" class="form-control" name="title" value="<?= $element['title'] ?> ">
    </div>
    <div class="mb-3">
      <label class="form-label">Ваша історія</label>
      <textarea class="form-control" rows="8" style="resize: none;" name="description"><?= $element['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="btn">Поділитися</button>

  </form>
</div>
</body>

</html>