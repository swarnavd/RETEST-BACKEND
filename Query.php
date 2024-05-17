<?php

require_once __DIR__ . '/Connection.php';

class Query {
  /**
   * A function to check if admin exists in database or not.
   *
   * @param string $email
   *  Admin's email id.
   *
   * @return void|string
   *  If exception occurs then returns string.
  */
  public function validUser(String $email) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM info WHERE email = '$email'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to insert product into database.
   *
   * @param string $name
   *  Product's name.
   * @param integer $price
   *  Product's price.
   * @param string $category.
   *  Product's category
   *
   * @return void
   *  If exception occurs then returns string.
   */
  public function insertProduct(string $name, int $price, string $category) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO product (productname, price, category) VALUES(:productname, :price, :category)");
      $sql->execute(array(':productname' => $name, ':price' => $price, ':category' => $category));
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to fetch details of product on basis of unhealthy category.
   *
   * @return array
   *  Returns array consists of details of product.
  */
  public function fetchProductUnhealthy() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM product where category='unhealthy'");
      $sql->execute();
      $product = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $product;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to fetch details of product on basis of healthy category.
   *
   * @return array
   *  Returns array consists of details of product.
  */
  public function fetchProducthealthy() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM product where category='healthy'");
      $sql->execute();
      $user = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to fetch all the product's details which admin entries.
   *
   * @return array
   *  An array consists of all type of products.
   */
  public function fetchItem() {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM product");
      $sql->execute();
      $user = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }
}


