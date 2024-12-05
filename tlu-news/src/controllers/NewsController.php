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

    // // Hiển thị form thêm bài viết
    // public function create()
    // {
    //     include 'views/news/create.php'; // Hiển thị form thêm bài viết
    // }

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

    // Hiển thị form sửa bài viết
    // public function edit($id)
    // {
    //     $news = $this->newsModel->getNewsById($id);
    //     include 'views/news/edit.php'; // Hiển thị giao diện sửa bài viết
    // }

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
    public function delete($id)
    {
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

    // Tìm kiếm bài viết
    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        $news = $this->newsModel->searchNews($keyword);
        include 'views/news/list.php'; // Hiển thị danh sách kết quả tìm kiếm
    }
}

// class NewsController
// {

//     private $newsModel;

//     public function __construct() {
//         $database = new Database();
//         $db = $database->getConnection(); // Kết nối CSDL
//         $this->newsModel = new News($db); // Khởi tạo model News
//     }

//     // Hiển thị chi tiết tin tức
//     public function detail()
//     {
//         if (isset($_GET["id"])) {
//             $newsId = $_GET['id'];
//             $newsDetail = $this->newsModel->getNewsById($newsId);

//             if ($newsDetail) {
//                 require_once "../Views/news/detail.php"; // Đường dẫn tới view
//             } else {
//                 $_SESSION['error'] = "Tin tức không tồn tại!";
//                 header('Location: index.php?page=new&action=index');
//                 exit();
//             }
//         } else {
//             header('Location: index.php?page=new&action=index');
//             exit();
//         }
//     }

//     // Hiển thị form thêm tin tức
//     public function create()
//     {
//         require_once '../Views/admin/news/add.php'; // View form thêm bài viết
//     }

//     // Xử lý lưu tin tức mới
//     public function store()
//     {
//         // Lấy dữ liệu từ form
//         $title = $_POST['title'];
//         $content = $_POST['content'];
//         $category_id = intval($_POST['category_id']);
//         $image = null;
    
//         // Xử lý ảnh tải lên
//         if (!empty($_FILES['image']['name'])) {
//             $uploadDir = 'uploads/';
//             $fileName = time() . '_' . basename($_FILES['image']['name']);
//             $uploadFile = $uploadDir . $fileName;
    
//             if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
//                 $image = $fileName;
//             } else {
//                 echo "Lỗi khi tải lên ảnh!";
//                 return;
//             }
//         }
    
//         // Lưu bài viết
//         if ($this->newsModel->createNews($title, $content, $image, $category_id)) {
//             header('Location: admin.php?route=news'); // Quay lại danh sách bài viết
//             exit;
//         } else {
//             echo "Thêm bài viết thất bại.";
//         }
//     }

//     // Hiển thị form sửa tin tức
//     public function edit()
//     {
//         if (isset($_GET['id'])) {
//             $newsId = $_GET['id'];
//             $newsDetail = $this->news->getNewsById($newsId);

//             if ($newsDetail) {
//                 require_once '../Views/admin/news/edit.php'; // View form sửa bài viết
//             } else {
//                 $_SESSION['error'] = "Tin tức không tồn tại!";
//                 header('Location: index.php?page=new&action=index');
//                 exit();
//             }
//         } else {
//             header('Location: index.php?page=new&action=index');
//             exit();
//         }
//     }

//     // Xử lý cập nhật tin tức
//     public function update()
//     {
//         if (isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category_id'])) {
//             $newsId = $_POST['id'];
//             $title = $_POST['title'];
//             $content = $_POST['content'];
//             $category_id = $_POST['category_id'];
//             $image = null;

//             // Upload ảnh mới nếu có
//             if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
//                 $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
//                 $uploadDir = 'uploads/';
//                 $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

//                 if (in_array($fileExtension, $allowedExtensions)) {
//                     $image = time() . '_' . basename($_FILES['image']['name']);
//                     $uploadFile = $uploadDir . $image;

//                     move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);

//                     // Xóa ảnh cũ nếu có
//                     $oldNews = $this->news->getNewsById($newsId);
//                     if (!empty($oldNews['image']) && file_exists('uploads/' . $oldNews['image'])) {
//                         unlink('uploads/' . $oldNews['image']);
//                     }
//                 } else {
//                     $_SESSION['error'] = "Định dạng ảnh không hợp lệ!";
//                     header('Location: index.php?page=new&action=edit&id=' . $newsId);
//                     exit();
//                 }
//             }

//             $this->news->updateNews($newsId, $title, $content, $image, $category_id);

//             $_SESSION['success'] = "Cập nhật tin tức thành công!";
//             header('Location: index.php?page=new&action=index');
//             exit();
//         } else {
//             $_SESSION['error'] = "Dữ liệu không hợp lệ!";
//             header('Location: index.php?page=new&action=index');
//             exit();
//         }
//     }

//     // Xóa tin tức
//     public function delete()
//     {
//         if (isset($_GET['id'])) {
//             $newsId = $_GET['id'];
//             $newsDetail = $this->news->getNewsById($newsId);

//             if ($newsDetail) {
//                 // Xóa file ảnh nếu có
//                 if (!empty($newsDetail['image']) && file_exists('uploads/' . $newsDetail['image'])) {
//                     unlink('uploads/' . $newsDetail['image']);
//                 }

//                 $this->news->deleteNews($newsId);

//                 $_SESSION['success'] = "Tin tức đã được xóa thành công!";
//                 header('Location: index.php?page=new&action=index');
//                 exit();
//             } else {
//                 $_SESSION['error'] = "Tin tức không tồn tại!";
//                 header('Location: index.php?page=new&action=index');
//                 exit();
//             }
//         } else {
//             header('Location: index.php?page=new&action=index');
//             exit();
//         }
//     }
// }
