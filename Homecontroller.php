<?php
require_once '../Models/Database.php'; // Kết nối Database
require_once '../Models/News.php'; // Model News

class HomeController {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); // Kết nối CSDL
    }

    // Hiển thị danh sách bài viết
    public function index() {
        $newModel = new News($this->db); // Khởi tạo model News
        $newList = $newModel->getAllNews(); // Lấy tất cả tin tức
        require_once '../Views/home/index.php'; // Gửi dữ liệu tới view
    }

    // Tìm kiếm bài viết theo từ khóa
    public function search() {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword']; // Lấy từ khóa tìm kiếm
            $newModel = new News($this->db); // Khởi tạo model News
            $result = $newModel->searchNews($keyword); // Tìm kiếm bài viết
            require_once '../Views/home/index.php'; // Gửi dữ liệu tới view
        } else {
            header('Location: index.php'); // Quay về trang chủ nếu không có từ khóa
            exit();
        }
    }
}
?>
