<?php
require_once 'models/User.php';  

class AdminController {

    // Hàm hiển thị form đăng nhập
    public function login() {
        // Nếu đã đăng nhập rồi thì chuyển đến dashboard
        if (isset($_SESSION['admin'])) {
            header('Location: index.php?page=admin&action=dashboard');
            exit();
        }

        // Hiển thị form đăng nhập nếu chưa đăng nhập
        include_once 'view/admin/login.php';
    }

    // Hàm xử lý đăng nhập khi form được submit
    public function postLogin() {
        // Kiểm tra nếu form đã được submit
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Tạo đối tượng User và gọi phương thức login
            $user = new User();
            $result = $user->login($username, $password);

            // Kiểm tra kết quả đăng nhập
            if ($result) {
                // Lưu thông tin người dùng vào session
                $_SESSION['admin'] = $result; // Lưu thông tin người dùng vào session khi đăng nhập thành công
                header('Location: index.php?page=admin&action=dashboard');
                exit();
            } else {
                // Nếu đăng nhập thất bại, hiển thị lỗi và quay lại trang login
                $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu sai';
                header('Location: index.php?page=admin&action=login');
                exit();
            }
        }
    }

    // Hàm xử lý đăng xuất
    public function logout() {
        // Xóa thông tin admin khỏi session
        unset($_SESSION['admin']);
        header('Location: index.php');
        exit();
    }

    // Hàm hiển thị trang dashboard cho admin
    public function dashboard() {
        include_once 'view/admin/dashboard.php';
    }
}
?>
