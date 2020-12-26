<?php
require_once 'models/Model.php';
class Order extends Model {
    public $id;
    public $user_id;
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status; // 0 - chưa thanh toán, 1 - đã thanh toán
    public function insert(){
        // + Viết câu truy vấn
        $sql_insert = "INSERT INTO orders(user_id,fullname,address,mobile,email,note,price_total ,payment_status)
VALUES(:user_id, :fullname,:address,:mobile,:email,:note,:price_total ,:payment_status)";
        // + Chuẩn bị đối tương
        $obj_insert = $this->connection->prepare($sql_insert);
        // + Tạo mảng
        $arr_insert = [
            ':user_id' => NULL,
            ':fullname'=> $this->fullname,
            ':email'=> $this->email,
            ':address'=> $this->address,
            ':mobile'=> $this->mobile,
            ':note'=> $this->note ,
            ':price_total'=> $this->price_total,
            ':payment_status'=> $this->payment_status,
        ];
        // + Thực thi: execute
        // Cần lấy ra id của bảng order để insert tiếp vào bảng order_details nên hàm này cần trả về id của chính nó
        $obj_insert->execute($arr_insert);
        $id_insert = $this->connection->lastInsertId();
        return $id_insert;

    }
        public function getOrder($order_id){
            $sql_select = "SELECT * FROM orders WHERE id = $order_id";
            $obj_select = $this->connection->prepare($sql_insert);
            $obj_select->execute();
            $order =  $obj_select->fetch(PDO::FETCH_ASSOC);
            return $order;
        }
}