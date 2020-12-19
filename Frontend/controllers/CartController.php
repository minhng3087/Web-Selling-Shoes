<?php
//controllers/CartController
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class CartController extends Controller
{
  public function index() {
    $this->content = $this->render('views/carts/index.php');
    require_once 'views/layouts/main.php';
  }
 
  public function add() {
    $product_id = $_GET['id']; 
    $product_model = new Product();
    $product = $product_model->getProductById($product_id);
    $cart_item = [
      'name' => $product['title'],
      'current_price' => $product['current_price'],
      'avatar' => $product['avatar'],
      'quantity' => 1
  ];
  if (!isset($_SESSION['cart'])||!isset($_SESSION['totalPrice'])||!isset($_SESSION['totalItemPrice'])||!isset($_SESSION['totalQuantity'])) {
    $_SESSION['cart'][$product_id] = $cart_item;
    $_SESSION['totalItemPrice'][$product_id] = 0;
    $_SESSION['totalQuantity'] = 0;
  } else {
    if (array_key_exists($product_id, $_SESSION['cart'])) {
      $_SESSION['cart'][$product_id]['quantity']++;

    }
    else {
      $_SESSION['cart'][$product_id] = $cart_item;
      
    }
  }
  $_SESSION['totalQuantity']++;
  $_SESSION['totalItemPrice'][$product_id] = $_SESSION['cart'][$product_id]['quantity'] * $_SESSION['cart'][$product_id]['current_price'];
  $_SESSION['totalPrice'] += $_SESSION['cart'][$product_id]['current_price'];
  
  $this->content = $this->view('views/carts/header_cart.php');
  }

  public function deleteItemCart() {
    $product_id = $_GET['id'];
    $quantity = $_SESSION['cart'][$product_id]['quantity'];
    unset($_SESSION['cart'][$product_id]);
    $_SESSION['totalPrice'] -= $_SESSION['totalItemPrice'][$product_id];
    $_SESSION['totalQuantity'] -= $quantity;
    $array = [
      'cartTable' => $this->render('views/carts/cart_table.php'), 
      'cartHeader' => $this->render('views/carts/header_cart.php'),
    ];
    echo json_encode($array);
  }

  // Cart Table(index)
  public function deleteTableCart() {
    $product_id = $_GET['id'];
    $quantity = $_SESSION['cart'][$product_id]['quantity'];
    unset($_SESSION['cart'][$product_id]);
    $_SESSION['totalPrice'] -= $_SESSION['totalItemPrice'][$product_id];
    $_SESSION['totalQuantity'] -= $quantity;
    $array = [
      'cartTable' => $this->render('views/carts/cart_table.php'), 
      'cartHeader' => $this->render('views/carts/header_cart.php'),
    ];
    echo json_encode($array);
  }

  public function update() {
  $product_id = $_GET['id'];
  $quantity = $_GET['quantity'];
  if($quantity > $_SESSION['cart'][$product_id]['quantity']) {
    $_SESSION['totalPrice'] += $_SESSION['cart'][$product_id]['current_price'];
    $_SESSION['totalQuantity']++;
  }
  else if ($quantity < $_SESSION['cart'][$product_id]['quantity'] && $quantity > 0) {
  $_SESSION['totalPrice'] -= $_SESSION['cart'][$product_id]['current_price'];
    $_SESSION['totalQuantity']--;
  }
  $_SESSION['cart'][$product_id]['quantity'] = $quantity;
  $_SESSION['totalItemPrice'][$product_id] = $_SESSION['cart'][$product_id]['quantity'] * $_SESSION['cart'][$product_id]['current_price'];
  $array = [
    'cartTable' => $this->render('views/carts/cart_table.php'), 
    'cartHeader' => $this->render('views/carts/header_cart.php'),
  ];
  echo json_encode($array);

  }


}