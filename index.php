<?php
session_start();

use App\Controllers\Auth;
use App\Servaces\App;
require_once __DIR__ . "/vendor/autoload.php";

App::start();
require_once __DIR__ . "/router/routers.php";


