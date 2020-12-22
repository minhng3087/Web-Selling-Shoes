<?php
require_once 'models/Model.php';
class News extends Model {
    public function getAllNews() {
        $sql_select_all = "SELECT * FROM news";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $news = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $news;
      }
}

