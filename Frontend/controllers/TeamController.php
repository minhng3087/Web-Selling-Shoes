<?php
require_once 'controllers/Controller.php';
require_once 'models/Team.php';

class TeamController extends Controller {
  public function index() {

    $this->content =
        $this->render('views/team/index.php');
    require_once 'views/layouts/main.php';
  }
}