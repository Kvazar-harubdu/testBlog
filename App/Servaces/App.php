<?php

namespace App\Servaces;
use R;

class App{

  public static function start() {

    self::libs();
    self::connectDb();
  }
  
  public static function libs(){

    $config = require_once "config/app.php";

    foreach ($config['libs'] as $lib) {
      require_once "libs/" . $lib . '.php';
    }
  }

  public static function connectDb(){
    $config = require_once "config/db.php";

    if($config['enable']){
      R::setup('mysql:host=' . $config['host'] . ';dbname=' . $config['bdName'],$config['login'],$config['password']);
      if(!R::testConnection()){
        die('Error data base connect');
      }
    }
  }
}
