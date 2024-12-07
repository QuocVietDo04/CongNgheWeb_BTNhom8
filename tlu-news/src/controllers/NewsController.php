<?php
require_once 'src\models\Database.php'; // Kết nối Database
require_once 'src\models\News.php'; // Model News

class NewsController
{
    private $newsModel;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection(); // Kết nối CSDL
        $this->newsModel = new News($db); // Khởi tạo model News
    }

    // Hiển thị danh sách bài viết
    public function index()
    {
        $news = $this->newsModel->getAllNews();
        include 'views/news/list.php'; // Hiển thị giao diện danh sách bài viết
    }

    // Lưu bài viết mới
    public function store()
    {
        // Lấy dữ liệu từ form
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = intval($_POST['category_id']);
        $image = null;

        // Xử lý ảnh tải lên
        if (!empty($_FILES['image']['name'])) {
            $uploadDir = 'uploads/';
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = $fileName;
            } else {
                echo "Lỗi khi tải lên ảnh!";
                return;
            }
        }

        // Lưu bài viết
        if ($this->newsModel->createNews($title, $content, $image, $category_id)) {
            header('Location: index.php?page=admin&action=dashboard'); // Quay lại danh sách bài viết
            exit;
        } else {
            echo "Thêm bài viết thất bại.";
        }
    }

    // Cập nhật bài viết
    public function update()
    {
        $id = intval($_POST['id']);
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = intval($_POST['category_id']);
        $image = null;

        // Xử lý ảnh nếu có tải lên
        if (!empty($_FILES['image']['name'])) {
            // Delete the old image if it exists
            $oldNews = $this->newsModel->getNewsById($id);
            if ($oldNews) {
                if (!empty($oldNews['image']) && file_exists('uploads/' . $oldNews['image'])) {
                    unlink('uploads/' . $oldNews['image']);
                }
            }

            $image = $_FILES['image']['name']; // Use the new image name for the update query
            $uploadDir = 'uploads/';
            $fileName = time() . '_' . basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = $fileName;
            }
        }

        // Cập nhật bài viết
        if ($this->newsModel->updateNews($id, $title, $content, $image, $category_id)) {
            header('Location: index.php?page=admin&action=dashboard'); // Quay lại danh sách bài viết
            exit;
        } else {
            echo "Cập nhật bài viết thất bại.";
        }
    }

    // Xóa bài viết
    public function delete()
    {
        // Get the ID from the POST request
        $id = intval($_POST['id']);
        // $image = $_POST['image'];

        // Fetch the news item to get the current image
        $newsItem = $this->newsModel->getNewsById($id);

        if ($newsItem) {
            // If an image exists, delete the file
            if (!empty($newsItem['image']) && file_exists('uploads/' . $newsItem['image'])) {
                unlink('uploads/' . $newsItem['image']);
            }

            // Delete the news item from the database
            if ($this->newsModel->deleteNews($id)) {
                $_SESSION['success_message'] = "Tin tức đã được xóa thành công!";
            } else {
                $_SESSION['error_message'] = "Không thể xóa tin tức. Vui lòng thử lại.";
            }
        } else {
            $_SESSION['error_message'] = "Tin tức không tồn tại!";
        }

        // Redirect back to the news list
        header('Location: index.php?page=admin&action=dashboard');
        exit;
    }
}
