<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Lấy page từ URL, mặc định là home
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; // Lấy action từ URL, mặc định là 'index'

// Tạo đường dẫn đến controller
$controllerPath = "src/controllers/" . ucfirst($page) . "Controller.php";

// Kiểm tra xem controller có tồn tại không
if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = ucfirst($page) . "Controller"; // Tạo tên class Controller tương ứng
    $controller = new $controllerClass(); // Khởi tạo controller

    // Kiểm tra action và gọi phương thức tương ứng
    if (method_exists($controller, $action)) {
        $controller->$action(); // Gọi phương thức tương ứng với action
    } else {
        echo "Action không hợp lệ.";
    }
} else {
    echo "Trang không tồn tại.";
}
