<?php
class NewsController
{
    //Hiển thị chi tiết tin tức
    public function detail()
    {
        if (isset($_GET["id"])) {
            $newID = $_GET['id'];
            $newModel = new News();
            $newDetail = $newModel->getNewsDetail($newID);
            require_once "../views/news/detail.php";
        } else {
            header('Location: index.php');
            exit();
        }
    }
    public function create()
    {
        require_once '../views/admin/news/add.php';
    }
    public function store()
    {
        if (isset($_POST['title'], $_POST['content'], $_POST['category_id'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $uploadDir = 'uploads/';
                $image = time() . '_' . basename($_FILES['image']['name']);
                $uploadFIle = $uploadDir . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadFIle);
            }
            $newsModel = new News();
            $newsModel->addNews($title, $content, $image, $category_id);
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }
    public function update()
    {
        if (isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['category_id'])) {
            $newsId = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            $image = '';

            // Kiểm tra nếu có upload ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $uploadDir = 'uploads/';
                $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $image = time() . '_' . basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $image;

                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $_SESSION['error'] = "Lỗi tải ảnh lên!";
                        header('Location: index.php?page=new&action=edit&id=' . $newsId);
                        exit();
                    }
                } else {
                    $_SESSION['error'] = "Chỉ chấp nhận file ảnh có định dạng: jpg, jpeg, png, gif!";
                    header('Location: index.php?page=new&action=edit&id=' . $newsId);
                    exit();
                }

                // Xóa ảnh cũ
                $newsModel = new News();
                $oldNews = $newsModel->getNewsById($newsId);
                if (!empty($oldNews['image']) && file_exists('uploads/' . $oldNews['image'])) {
                    unlink('uploads/' . $oldNews['image']);
                }
            }

            // Cập nhật dữ liệu tin tức
            $newsModel = new News();
            $newsModel->updateNews($newsId, $title, $content, $image, $category_id);

            $_SESSION['success'] = "Tin tức đã được cập nhật thành công!";
            header('Location: index.php?page=new&action=index');
            exit();
        } else {
            $_SESSION['error'] = "Dữ liệu không hợp lệ!";
            header('Location: index.php?page=new&action=index');
            exit();
        }
    }
    public function delete()
    {
        // Kiểm tra xem có id được truyền qua URL hay không
        if (isset($_GET['id'])) {
            $newsId = $_GET['id'];

            // Gọi model News để kiểm tra và xóa
            $newsModel = new News();

            // Lấy thông tin tin tức (kiểm tra sự tồn tại)
            $newsDetail = $newsModel->getNewsById($newsId);
            if ($newsDetail) {
                // Xóa file ảnh liên quan (nếu có)
                if (!empty($newsDetail['image']) && file_exists('uploads/' . $newsDetail['image'])) {
                    unlink('uploads/' . $newsDetail['image']);
                }

                // Xóa tin tức khỏi CSDL
                $newsModel->deleteNews($newsId);

                // Chuyển hướng về trang danh sách
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