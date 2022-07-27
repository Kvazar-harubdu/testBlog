<?php

namespace App\Servaces;


class Rout{

  private static $list = [];

  public static function page($uri, $pageName){
    self::$list[] = [
      "uri" => $uri,
      "pageName" => $pageName,
    ];
  }

  public static function post($uri, $class, $method, $formData = false, $files = false){

    self::$list[] = [
      "uri" => $uri,
      "class" => $class,
      "method" => $method,
      "post" => true,
      "formData" => $formData,
      "files" => $files,
    ];
  }

  public static function enable(){
    $qvery = $_GET['route'];

    foreach (self::$list as $rout) {
      if ($rout['uri'] === '/' . $qvery) {
        if ($rout['post'] === true && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
          $action = new $rout['class'];
          $method = $rout['method'];

            if($rout['formData'] && $rout['files']){

              $action->$method($_POST, $_FILES);

            } elseif($rout['formData'] && !$rout['files']) {

              $action->$method($_POST);

            } else {

              $action->$method();
            }

          die();
        } else {
          require_once "views/pages/" . $rout['pageName'] . ".php";
          die();
        }
      }
    }
    return self::errors('404');
  }

  public static function errors($error){
    require_once('views/errors/' . $error . '.php');
  }

  public static function redirect($url){
   header('Location: ' . $url);
  }
}

