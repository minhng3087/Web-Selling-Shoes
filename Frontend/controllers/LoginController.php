<?php
require_once 'controllers/Controller.php';
require_once 'models/Login.php';

class LoginController extends Controller {
  public function index() {

    $this->content =
        $this->render('views/login/index.php');
    require_once 'views/layouts/main.php';
  }
}