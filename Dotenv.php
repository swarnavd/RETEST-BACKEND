<?php
require_once __DIR__ . '/vendor/autoload.php';
/**
 *  A class to make .env file more reusable.
*/
class Dotenv {
  /**
   * A constructor to initialize DOTENV class.
  */
  public function __construct() {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
  }
}
