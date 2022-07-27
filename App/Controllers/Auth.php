<?php

namespace App\Controllers;

use App\Servaces\Rout;


class Auth
{

  public function login($data)
  {
    $userName = $data['userName'];
    $pass = $data['pass'];

    $user = \R::findOne('users', 'user_name = ?', [$userName]);

    if (!$user) {
      die('Користувача не знайдено');
    }

    if (password_verify($pass, $user->pass)) {
      session_start();
      $_SESSION['user'] =
        [
          'id'       => $user->id,
          'userName' => $user->userName,
          'email'    => $user->email,
          'group'    => $user->group,
          'avatar'   => $user->avatar,
        ];

      Rout::redirect('/profile');
    } else {
      die('Не коректний логін або пароль');
    }
  }


  public function register($data, $files)
  {

    $userName = $data['userName'];
    $email = $data['email'];
    $pass = $data['pass'];
    $passAgen = $data['passAgen'];

    if ($pass !== $passAgen) {
      Rout::errors('500');
      die();
    }
    
    $avatar = $files['avatar'];
    $fileName = time() . $avatar['name'];


    $path = 'uploads/avatars/' . $fileName;

    if (move_uploaded_file($avatar['tmp_name'], $path)) {

      $user = \R::dispense('users');
      $user->userName = $userName;
      $user->email = $email;
      $user->group = 1;
      $user->pass = password_hash($pass, PASSWORD_DEFAULT);
      $user->avatar = '/' . $path;
      \R::store($user);

      Rout::redirect('/login');
    } else {
      Rout::errors('500');
    }
  }

  public function logout()
  {

    unset($_SESSION['user']);
    Rout::redirect('/home');
  }

 public function profile($post)
  {

    $title = $post['title'];
    $description = $post['description'];

    if (!$title) {
      die('Заповніть заголовок');
    } elseif (!$description) {
      die('Заповніть текст');
    } else {
      $post = \R::dispense('posts');
      $post->title = $title;
      $post->description = $description;
      \R::store($post);
    }
 
    session_start();
    $_SESSION['post'] =
      [
        'id'          => $post->id,
        'title'       => $post->title,
        'description' => $post->description,


      ];
    Rout::redirect('/home');
  }

  public function update($post)
  {
    $title = $post['title'];
    $description = $post['description'];
    Rout::redirect('/home');
  }

}
