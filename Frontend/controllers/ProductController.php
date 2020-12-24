<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class ProductController extends Controller {

  public function detail() {

    $this->content = $this->render('views/products/detail.php');
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
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
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

  public function orderBy() {
    $name = $_GET['name'];
    $orderBy = $_GET['assss'];
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    
  }
}