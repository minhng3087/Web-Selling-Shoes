<?php
require_once 'controllers/Controller.php';

class BlogController extends Controller {
    public function blog_grid() {
    
        $this->content =
            $this->render('views/blog/blog_grid.php');
        require_once 'views/layouts/main.php';
      }
    public function detail() {
    
        $this->content =
            $this->render('views/blog/blog_detail.php');
        require_once 'views/layouts/main.php';
      }
  
}