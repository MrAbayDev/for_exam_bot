<?php
declare(strict_types=1);
use ForExamBot\Router;
Router::get('/',fn()=>require 'public/home.php');
Router::post('/addInfo',fn()=>require 'controller/addInfo.php');
Router::get('/getInfo',fn()=>require 'controller/getInfo.php');
