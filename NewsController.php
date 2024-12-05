<?php
require_once '../Models/News.php'; // Đảm bảo đường dẫn chính xác
require_once '../Database.php'; // Kết nối Database

class NewsController
{
    private $newsModel;

    public function __construct()
    {
        // Khởi tạo database và model News
        $db = (new Database())->getConnection();
        $this->newsModel = new News($db);
    }

    // Hiển thị chi tiết tin tức
    public function detail()
    {
        if (isset($_GET["id"])) {
            $newsId = $_GET['id'];
            $newsDetail = $this->newsModel->getNewsById($newsId);

            if ($newsDetail) {
                require_once "../Views/news/detail.php"; // Đường dẫn tới view
            } else {
                $_SESSION['error'] = "Tin tức không tồn tại!";
                header('Location: index.php?page=new&action=index');
                exit();
            }
        } else {
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }

    // Hiển thị form thêm tin tức
    public function create()
    {
        require_once '../Views/admin/news/add.php'; // View form thêm bài viết
    }

    // Xử lý lưu tin tức mới
    public function store()
    {
        if (isset($_POST['title'], $_POST['content'], $_POST['category_id'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = '';

            // Upload ảnh nếu có
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploadDir = 'uploads/';
                $image = time() . '_' . basename($_FILES['image']['name']);
                $uploadFile = $uploadDir . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
            }

            $this->newsModel->createNews($title, $content, $image, $category_id);

            $_SESSION['success'] = "Thêm tin tức thành công!";
            header('Location: index.php?page=new&action=index');
            exit();
        } else {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            header('Location: index.php?page=new&action=create');
            exit();
        }
    }

    // Hiển thị form sửa tin tức
    public function edit()
    {
        if (isset($_GET['id'])) {
            $newsId = $_GET['id'];
            $newsDetail = $this->newsModel->getNewsById($newsId);

            if ($newsDetail) {
                require_once '../Views/admin/news/edit.php'; // View form sửa bài viết
            } else {
                $_SESSION['error'] = "Tin tức không tồn tại!";
                header('Location: index.php?page=new&action=index');
                exit();
            }
        } else {
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }

    // Xử lý cập nhật tin tức
    public function update()
    {
        if (isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category_id'])) {
            $newsId = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = null;

            // Upload ảnh mới nếu có
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $uploadDir = 'uploads/';
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $image = time() . '_' . basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $image;

                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

                    // Xóa ảnh cũ nếu có
                    $oldNews = $this->newsModel->getNewsById($newsId);
                    if (!empty($oldNews['image']) && file_exists('uploads/' . $oldNews['image'])) {
                        unlink('uploads/' . $oldNews['image']);
                    }
                } else {
                    $_SESSION['error'] = "Định dạng ảnh không hợp lệ!";
                    header('Location: index.php?page=new&action=edit&id=' . $newsId);
                    exit();
                }
            }

            $this->newsModel->updateNews($newsId, $title, $content, $image, $category_id);

            $_SESSION['success'] = "Cập nhật tin tức thành công!";
            header('Location: index.php?page=new&action=index');
            exit();
        } else {
            $_SESSION['error'] = "Dữ liệu không hợp lệ!";
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }

    // Xóa tin tức
    public function delete()
    {
        if (isset($_GET['id'])) {
            $newsId = $_GET['id'];
            $newsDetail = $this->newsModel->getNewsById($newsId);

            if ($newsDetail) {
                // Xóa file ảnh nếu có
                if (!empty($newsDetail['image']) && file_exists('uploads/' . $newsDetail['image'])) {
                    unlink('uploads/' . $newsDetail['image']);
                }

                $this->newsModel->deleteNews($newsId);

                $_SESSION['success'] = "Tin tức đã được xóa thành công!";
                header('Location: index.php?page=new&action=index');
                exit();
            } else {
                $_SESSION['error'] = "Tin tức không tồn tại!";
                header('Location: index.php?page=new&action=index');
                exit();
            }
        } else {
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }
}
