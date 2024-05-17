<?php

require_once __DIR__ . '/sessioncheck.php';
require_once __DIR__ . '/itementryprocess.php';
require_once __DIR__ . '/fetchitem.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Form</title>
  <link rel="stylesheet" href="./CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/logout">Log out</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <form action="/form" method="post" class="form">
      <h3><?= $message ?>!!!</h3></br>
      <label for="title">Item Name:</label><br>
      <input type="text" id="title" name="title"><br>
      <label for="price">Price of Item</label><br>
      <input type="number" id="price" name="price"><br>

      <label for="category">Category Name:</label><br>
      <input type="text" id="category" name="category"><br>
      <input type="submit" name="Submit" class="sub">
    </form>
    <div class="default-show">
      <?php if (!empty($product)) : ?>
        <table border="1" width="100%">
          <tr>
            <th>Product name</th>
            <th>Product Price</th>
            <th>Category</th>
          </tr>
          <?php foreach ($product as $x) : ?>
            <tr>
              <td><?= $x['productname'] ?></td>
              <td><?= $x['price'] ?></td>
              <td><?= $x['category'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif ?>
        </table>
    </div>
  </main>

  <script src="./JS/script.js"></script>
</body>

</html>
