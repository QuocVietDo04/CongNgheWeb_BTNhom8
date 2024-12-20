<?php
require_once 'src\models\Database.php'; // Kết nối Database
require_once 'src\models\User.php';

class AdminController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db); // Khởi tạo đối tượng User với kết nối cơ sở dữ liệu
    }

    // Hàm hiển thị form đăng nhập
    public function login() {
        // Nếu admin đã đăng nhập, chuyển đến dashboard
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            header('Location: index.php?page=admin&action=dashboard');
            exit();
        }

        // Hiển thị form đăng nhập nếu chưa đăng nhập
        include_once 'src\views\admin\login.php';
    }

    public function postLogin() {
        // Kiểm tra nếu form đã được submit
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Xác thực thông tin người dùng
            if ($this->userModel->authenticate($username, $password)) {
                header('Location: index.php');
                exit();
            } else {
                // Nếu đăng nhập thất bại, hiển thị lỗi
                $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu sai.';
                header('Location: index.php?page=admin&action=login');
                exit();
            }
        }
    }

    // Hàm xử lý đăng xuất
    public function logout() {
        session_unset();  // Xóa tất cả session variables
        session_destroy(); // Hủy session
        header('Location: index.php');
        exit();
    }

    // Hàm hiển thị trang dashboard cho admin
    public function dashboard() {
        // Kiểm tra quyền admin trước khi hiển thị dashboard
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            // Hiển thị trang dashboard
            include_once 'src\views\admin\dashboard.php';
        } else {
            // Chuyển hướng nếu không có quyền truy cập
            $_SESSION['error'] = 'Bạn không có quyền truy cập trang quản trị.';
            header('Location: index.php');
            exit();
        }
    }

    // // Hàm thay đổi vị trí trang admin
    // public function changePage($mode) {
    //     if ($mode == 'Chế độ chỉnh sửa') {
    //         header('Location: index.php?page=admin&action=dashboard');
    //     } else {
    //         header('Location: index.php');
    //     }
    // }

    // Hàm hiển thị form thêm

}
?>
