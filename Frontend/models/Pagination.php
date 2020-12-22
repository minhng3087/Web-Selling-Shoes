<?php
//models/Pagination.php
//Class phân trang
//ý tương của phân trang:
//giả sử trong bảng categories có 36 bản ghi
//và yêu cầu là hiển thị 10 bản ghi trên 1 trang
//-> tổng số trang cần tạo để chứa hết 36 bản ghi
// = ceil(36/10) = 4
//như vậy cần xác định các tham số sau
// - tổng số bản ghi: total
// - số bản ghi trên 1 trang: limit
//url phân trang sẽ có dạng sau, theo mô hình mvc
//index.php?controller=category&action=index&page=3
//- controller xử lý phân trang: controller
//- action xử lý phân trang: action
// - chế độ hiển thị phân trang: full_mode
class Pagination
{
  //khai báo 1 thuộc tính chứa tất cả các tham số vừa liệt
//    kê ở trên
  public $params = [
    //tổng số bản ghi trên trang
    'total' => 0,
    //giới hạn bản ghi trên 1 trang
    'limit' => 0,
    //controller xử lý phân trang
    'controller' => '',
    //action xử lý phân trang
    'action' => '',
    //chế độ hiển thị phân trang (show ra tất cả page hay ko)
    'full_mode' => FALSE
  ];
  public function __construct($params) {
    $this->params = $params;
  }

  public function getTotalPage() {
    $total = $this->params['total'] / $this->params['limit'];
    return $total;
  }

  //tạo 1 phương thức lấy ra trang hiện tại
  public function getCurrentPage() {
    //url phân trang theo mô hình MVC hiện tại đang có dạng:
//        index.php?controller=&action=&page=3
    //khởi tạo page mặc định = 1
    $page = 1;
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
      $page = $_GET['page'];
      $total_page = $this->getTotalPage();
      if ($page >= $total_page) {
        $page = $total_page;
      }
    }
    return $page;
  }

  //tạo phương thức lấy ra link HTML của trang trước đó
  // - Link Prev
  public function getPrevPage() {
    $prev_page = '';
    $current_page = $this->getCurrentPage();
    if ($current_page >= 2) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      if($this->params['query_additional']) $query_additional = $this->params['query_additional'];
      $page = $current_page - 1;
      $prev_url =
        "index.php?controller=$controller&action=$action$query_additional&page=$page";
      //tạo cấu trúc li cho biến $prev_page
      $prev_page = "<li><a href='$prev_url'><i class='fa fa-angle-left'></i></a></li>";
    }
    return $prev_page;
  }

  //xây dựng phương thức tạo ra link Next cho phân trang
  public function getNextPage() {
    $next_page = '';
    $current_page = $this->getCurrentPage();
    $total_page = $this->getTotalPage();
    if ($current_page < $total_page) {
      $controller = $this->params['controller'];
      $action = $this->params['action'];
      if($this->params['query_additional']) $query_additional = $this->params['query_additional'];
      $page = $current_page + 1;
      $next_url =
      "index.php?controller=$controller&action=$action$query_additional&page=$page";
      $next_page = "<li><a href='$next_url'><i class='fa fa-angle-right'></i></a></li>";
    }
    return $next_page;
  }

  public function getPagination() {
    $data = '';
    //nếu tổng số trang hiện tại chỉ = 1, thì ko cần hiển thị
    //cấu trúc phân trang
    $total_page = $this->getTotalPage();
    if ($total_page == 1) {
      return '';
    }

    $data .= "<ul class='pagination'>";
    //gắn link Prev vào đầu tiên
    $prev_link = $this->getPrevPage();
    $data .= $prev_link;

    //tạo các biến controller, action lấy từ thuộc tính params
    $controller = $this->params['controller'];
    $action = $this->params['action'];
    if($this->params['query_additional']) $query_additional = $this->params['query_additional'];
    //nếu như hiển thị phân trang theo kiểu ..
    // -> full_mode = FALSE
    $full_mode = $this->params['full_mode'];
    if ($this->params['full_mode'] == FALSE) {
      for ($page = 1; $page <= $total_page; $page++) {
        $current_page = $this->getCurrentPage();
        //hiển thị trang 1, trang cuối, trang ngay trước trang hiện tại và trang ngay sau trang hiện tại
        if ($page == 1 || $page == $total_page || $page  == $current_page - 1 || $page == $current_page + 1) {
          $page_url = "index.php?controller=$controller&action=$action$query_additional&page=$page";
          $data .= "<li><a href='$page_url'>$page</a></li>";
        }
        //nếu là trang hiện tại thì sẽ ko có link
        else if ($page == $current_page) {
          $data .= "<li class='active'><a href=''>$page</a></li>";
        }
//        còn nếu hoặc là trang 2, trang 3 hoặc trang tổng - 1, trang tổng -2 thì hiển thị ..
        else if (in_array($page, [$current_page - 2, $current_page - 3, $current_page + 2, $current_page + 3])){
          $data .= "<li><a href=''>...</a></li>";
        }
      }
//ngược lại nếu là chế độ fullpage
    }
    //hiển thị full page
    else {
      //chạy vòng lặp từ 1 đến tổng số trang
      //để hiển thị ra các trang
      for ($page = 1; $page <= $total_page; $page++) {
        $current_page = $this->getCurrentPage();
        //nếu trang hiện tại trùng với với số lần lặp hiện
        //tại thì sẽ thêm class active và ko gắn link
//                cho trang hiện tại
        if ($current_page == $page) {
          $data .= "<li class='active'><a href='#'>$page</a></li>";
        } else {
          $page_url
            = "index.php?controller=$controller&action=$action$query_additional&page=$page";
          $data .= "<li><a href='$page_url'>$page</a></li>";
        }
      }
    }


    //gắn link NExt vào cuối của cấu trúc phân trang
    $next_link = $this->getNextPage();
    $data .= $next_link;
    $data .= "</ul>";
    return $data;
  }
}
