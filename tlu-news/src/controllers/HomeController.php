<?php
require_once 'src\models\Database.php'; // Kết nối Database
require_once 'src\models\News.php'; // Model News
require_once 'src\models\Category.php'; // Model Category

class HomeController
{
    private $newsModel;
    private $categoryModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection(); // Kết nối CSDL
        $this->newsModel = new News($db); // Khởi tạo model News
        $this->categoryModel = new Category($db); // Khởi tạo model Category
    }

    // Hiển thị danh sách bài viết
    public function index()
    { 
        // Lấy danh mục
        $categories = $this->categoryModel->getAllCategories();
        
        // Khởi tạo model News
        if (isset($_GET['category']) && is_numeric($_GET['category'])) {
            $category_id = $_GET['category'];
            $newsList = $this->newsModel->getNewsByCategory($category_id);
        } elseif (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword']; // Lấy từ khóa tìm kiếm
            $newsList = $this->newsModel->searchNews($keyword); // Tìm kiếm bài viết
        } else {
            $newsList = $this->newsModel->getAllNews(); // Lấy tất cả tin tức
        }
        require_once 'src\views\home\index.php'; // Gửi dữ liệu tới view
    }

    public function detail()
    {
        // Kiểm tra tham số id
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $news_id = $_GET['id'];

            // Sử dụng kết nối $this->newsModel để lấy dữ liệu chi tiết bài viết
            $news = $this->newsModel->getNewsById($news_id);

            if (!$news) {
                die("Không tìm thấy bài viết!");
            }

            // Gọi view chi tiết
            require 'src/views/news/detail.php';
        } else {
            echo "ID bài viết không hợp lệ.";
        }
    }
}
