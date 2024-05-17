<?php

require_once __DIR__ . '/Query.php';

// Initialize the Query object.
$ob = new Query();
// Check if the products data is set in the POST request.
if (isset($_POST['products'])) {
  $products = $_POST['products'];
  foreach ($products as $product) {
    $name = $product['name'];
    $qty = $product['qty'];
    $price = $product['price'];
  }
}
?>



