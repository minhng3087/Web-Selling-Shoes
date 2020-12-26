<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
    public $order_id;
    public $product_id;
    public $quantity;
    public $price;
    public function insert(){
        // + Tạp truy vấn dạng tham số
        $sql_insert = "INSERT INTO order_details(order_id, product_id, price, quantity) 
        VALUES(:order_id, :product_id, :price, :quantity)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':order_id' => $this->order_id,
            ':product_id' => $this->product_id,
            ':price' => $this->price,
            ':quantity' => $this->quantity,
            ];
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }

}