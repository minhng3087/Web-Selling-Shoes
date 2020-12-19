<?php
require_once 'models/Model.php';
class Product extends Model {

    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['name']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }
    public function countTotal($category_name)
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(products.id) FROM products WHERE category_id = (SELECT id FROM categories WHERE name='$category_name')");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }

    public function getAllPagination($arr_params, $category_name)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name='$category_name')
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }


  /**
   * Lấy thông tin sản phẩm theo id
   * @param $id
   * @return mixed
   */
  public function getById($id)
  {
    $obj_select = $this->connection
      ->prepare("SELECT products.*, categories.name AS category_name FROM products 
          INNER JOIN categories ON products.category_id = categories.id WHERE products.id = $id");

    $obj_select->execute();
    $product =  $obj_select->fetch(PDO::FETCH_ASSOC);
    return $product;
  }


  public function getProductById($product_id) {
    $sql_select_one =
        "SELECT * FROM products WHERE id=$product_id";
    $obj_select_one =
        $this->connection->prepare($sql_select_one);
    $obj_select_one->execute();
    $product = $obj_select_one
        ->fetch(PDO::FETCH_ASSOC);
    return $product;
  }

  public function getProductsByCategory($category_name) {
    $sql_select_all = "SELECT * FROM products WHERE category_id = (SELECT id FROM categories WHERE name='$category_name')";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }

  public function getProductsSale() {
    $sql_select_all = "SELECT * FROM products WHERE original_price <> 0";
    $obj_select_all = $this->connection->prepare($sql_select_all);
    $obj_select_all->execute();
    $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    return $products;
  }
}

