<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {

  public function detail() {
    $name = str_replace('-', ' ',$_GET['name']);
    $product_model = new Product();
    $product = $product_model->getProductByName($name);
    $suggestProducts = $product_model->getSuggestProducts($name);
    $this->content = $this->render('views/products/detail.php',[
      'product' => $product,
      'suggestProducts' => $suggestProducts
    ]);
    require_once 'views/layouts/main.php';
  }

  public function showAllProductsByCategory() {
    $name = $_GET['name'];
    $product_model = new Product();
    $count_total = $product_model->countTotal();
    $query_additional = '';
    if (isset($_GET['name'])) {
      $query_additional .= '&name=' . $_GET['name'];
    }
    if (isset($_GET['orderBy'])) {
      $query_additional .= '&orderBy=' . $_GET['orderBy'];
    }
    if (isset($_GET['filterPrice']) && isset($_GET['price'])) {
      // if (isset($_GET['price'])) {
      //   $query_additional .= '&filterPrice=Filter' . '&price=' . $_GET['price'];
      // }
      $query_additional .= '&filterPrice=Filter' . '&price=' . $_GET['price'];

      // if (isset($_GET['price2'])) {
      //   $query_additional .= '&filterPrice=' . $_GET['price2'];
      // }
      // if (isset($_GET['price3'])) {
      //   $query_additional .= '&filterPrice=' . $_GET['price3'];
      // }
      // if (isset($_GET['price4'])) {
      //   $query_additional .= '&filterPrice=' . $_GET['price4'];
      // }
    }
    $arr_params = [
        'total' => $count_total,
        'limit' => 12,
        'query_string' => 'page',
        'controller' => 'product',
        'action' => 'showAllProductsByCategory',
        'full_mode' => false,
        'query_additional' => $query_additional,
        'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $products = $product_model->getAllPagination($arr_params);
    $pagination = new Pagination($arr_params);
    $pages = $pagination->getPagination();
    
    $this->content = $this->render('views/products/show_all.php',[
      'products' => $products,
      'pages' => $pages,
    ]);
    require_once 'views/layouts/main.php';

  }

  public function saleProducts() {
    $product_model = new Product();
    $count_total = $product_model->countTotalProductsSale();
    $arr_params = [
      'total' => $count_total,
      'limit' => 12,
      'query_string' => 'page',
      'controller' => 'product',
      'action' => 'saleProducts',
      'full_mode' => false,
      'page' => isset($_GET['page']) ? $_GET['page'] : 1
    ];
    $products = $product_model->getProductsSale($arr_params);
    $pagination = new Pagination($arr_params);
    $pages = $pagination->getPagination();
    $this->content = $this->render('views/products/show_all.php',[
      'products' => $products,
      'pages' => $pages
    ]);
    require_once 'views/layouts/main.php';
  }

}