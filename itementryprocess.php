<?php

require_once __DIR__ . '/Query.php';
require_once __DIR__ . '/Validation.php';

$val = new Validation();
// Initializing object for query class.
$ob = new Query();
if (isset($_POST['Submit'])) {
  // Checks if all format are in correct format or not.
  if (!empty($_POST['title']) && !empty($_POST['price']) && !empty($_POST['category'])) {
    if ($val->validFullName($_POST['title']) && $val->validNumber((int)$_POST['price']) && ($_POST['category'] == "Healthy" || $_POST['category'] == "Unhealthy")) {
      // Inserting products.
      $ob->insertProduct($_POST['title'], $_POST['price'], $_POST['category']);
      $message = "Item added successfully";
    }
    else {
      $message = "Item name and category should contain only alphabets and price should contain only numbers.";
    }
  }
  else {
    $message = "Please fill all the fields.";
  }
}
