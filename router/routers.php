<?php

namespace Router;

use App\Controllers\Auth;
use App\Servaces\Rout;


Rout::page('/login', 'login');
Rout::page('/register', 'register');
Rout::page('/profile', 'profile');
Rout::page('/admin', 'admin');
Rout::page('/home', 'home');
Rout::page('/upDataForm', 'upDataForm');
Rout::page('/update', 'update');


Rout::post('/auth/register', Auth::class, 'register', true, true);
Rout::post('/auth/login', Auth::class, 'login', true);
Rout::post('/auth/logout', Auth::class, 'logout');
Rout::post('/auth/profile', Auth::class, 'profile', true);
Rout::post('/auth/upDataForm', Auth::class, 'upDataForm', true); 
Rout::post('/auth/update', Auth::class, 'update', true); 




Rout::enable();
