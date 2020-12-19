<?php
require_once 'controllers/Controller.php';
require_once 'models/Register.php';

class RegisterController extends Controller {
  public function index() {

    $this->content =
        $this->render('views/register/index.php');
    require_once 'views/layouts/main.php';
  }
}