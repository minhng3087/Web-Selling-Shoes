<?php
require_once 'models/Model.php';
class Home extends Model {
    public function getImg($type) {
        $sql_select_all = "SELECT * FROM home WHERE type = $type";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $images = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $images;
      }

}

