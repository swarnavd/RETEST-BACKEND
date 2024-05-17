<?php

require_once __DIR__ . '/Query.php';

// Initializing object for Query class.
$ob = new Query();
// Fetching all the products which is under healthy category after clicking on
// healthy button.
$product = $ob->fetchProductUnhealthy();
?>

<?php if (!empty($product)) : ?>
  <table border="1" width="100%">
    <tr>
      <th>Select</th>
      <th>Product name</th>
      <th>Product Quantity</th>
      <th>Product Price</th>
    </tr>
    <?php foreach ($product as $x) : ?>
      <tr>
        <td><input type="checkbox" name="product" class="product" value="<?= $x['productname'] ?>"></td>
        <td><?= $x['productname'] ?></td>
        <td><input type="number" class="qty" name="qty" max="10" placeholder="Qty"></td>
        <td><?= $x['price'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <button type="button" class="product_submit">Submit</button>
<?php endif ?>
