<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        try {
            // Tìm người dùng trong cơ sở dữ liệu theo username
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Kiểm tra nếu tìm thấy người dùng và so sánh mật khẩu
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }

            return false;
        } catch (PDOException $exception) {
            error_log("Lỗi xác thực: " . $exception->getMessage());
            return false;
        }
    }
}
