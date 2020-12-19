<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';

class ContactController extends Controller {
  public function index() {

    $this->content =
        $this->render('views/contact/index.php');
    require_once 'views/layouts/main.php';
  }
}