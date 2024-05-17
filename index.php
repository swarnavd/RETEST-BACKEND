<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode("?", $url);

switch ($url[0]) {
  case '/':
    require_once __DIR__ .  '/dashboard.php';
    break;
  case '/login':
    require_once __DIR__ .  '/Login.php';
    break;
  case '/Home':
    require_once __DIR__ .  '/dashboard.php';
    break;
  case '/form':
    require_once __DIR__ .  '/adminform.php';
    break;
  case '/logout':
    require_once __DIR__ .  '/logout.php';
    break;
  default:
    require_once __DIR__ . '/dashboard.php';
}
