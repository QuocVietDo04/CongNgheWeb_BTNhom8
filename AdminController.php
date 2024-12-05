<?php
require_once '../models/User.php';

class AdminController {
    private $user;

    public function __construct($db) {
        $this->user = new User($db); // Khởi tạo đối tượng User với kết nối cơ sở dữ liệu
    }

    // Hàm hiển thị form đăng nhập
    public function login() {
        // Nếu admin đã đăng nhập, chuyển đến dashboard
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            header('Location: index.php?page=admin&action=dashboard');
            exit();
        }

        // Hiển thị form đăng nhập nếu chưa đăng nhập
        include_once '../view/admin/login.php';
    }

    // Hàm xử lý đăng nhập
    public function postLogin() {
        // Kiểm tra nếu form đã được submit
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Xác thực thông tin người dùng
            if ($this->user->authenticate($username, $password)) {
                // Kiểm tra vai trò
                if ($_SESSION['role'] == 1) { // 1: Quản trị viên
                    header('Location: index.php?page=admin&action=dashboard');
                } else {
                    // Nếu không phải admin, quay về trang chính
                    header('Location: index.php');
                }
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
        $this->user->logout(); // Gọi phương thức logout từ User Model
        header('Location: index.php');
        exit();
    }

    // Hàm hiển thị trang dashboard cho admin
    public function dashboard() {
        // Kiểm tra quyền admin trước khi hiển thị dashboard
        if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
            include_once '../view/admin/dashboard.php';
        } else {
            // Chuyển hướng nếu không có quyền truy cập
            $_SESSION['error'] = 'Bạn không có quyền truy cập trang quản trị.';
            header('Location: index.php');
            exit();
        }
    }
}
?>