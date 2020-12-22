<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Home.php';
require_once 'models/News.php';
class HomeController extends Controller {
  public function index() {
    $category_model = new Category();
    $home_model = new Home();
    $product_model = new Product();
    $news_model = new News();
    $_SESSION['categories_name'] = $category_model->getAllProductNames();
    $imgSlider = $home_model->getImg(0);
    $imgBanner = $home_model->getImg(1);
    $productsTopSale = $product_model->getTopSale();
    $productsNew = $product_model->getNewProducts(); 
    $news = $news_model->getAllNews();
    $this->content =
        $this->render('views/homes/index.php',[
          'imgSlider' => $imgSlider,
          'imgBanner' => $imgBanner,
          'productsTopSale' => $productsTopSale,
          'productsNew' => $productsNew,
          'news' => $news,
        ]);
    require_once 'views/layouts/main.php';
  }
}