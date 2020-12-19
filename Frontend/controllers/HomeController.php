<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';

class HomeController extends Controller {
  public function index() {
    $category_model = new Category();
    $categories = $category_model->getAllProductNames();
    $_SESSION['categories_name'] = $categories;
    $this->content =
        $this->render('views/homes/index.php');
    require_once 'views/layouts/main.php';
  }
}