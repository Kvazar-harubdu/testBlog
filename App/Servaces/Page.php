<?php
namespace App\Servaces;

class Page {
  
  public static function slice($parth){
    require_once "views/components/". $parth . '.php';
  }
}
