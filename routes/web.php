<?php
declare(strict_types=1);
use ForExamBot\Router;
Router::get('/',fn()=>require 'public/pages/home.php');
Router::post('/send',fn()=>require 'public/pages/sendMessage.php');