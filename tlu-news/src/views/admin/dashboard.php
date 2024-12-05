<?php
require_once 'src/models/Database.php'; // Kết nối Database
require_once 'src/models/News.php'; // Model News

// Lấy dữ liệu
$database = new Database();
$db = $database->getConnection();
$news = new News($db);
$newsList = $news->getAllNews();
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Website Tin tức</title>

    <!-- Liên kết CSS -->
    <link href="./src/style.css" rel="stylesheet" />
    <link href="./src/tailwind.css" rel="stylesheet" />

    <!-- Liên kết JavaScript -->
    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</head>

<body class="roboto-regular">

    <?php
    require_once 'src/views/partials/header.php';
    echo getHeader();
    ?>

    <?php
    require_once 'src\views\admin\news\index.php';
    echo getTable($newsList);
    ?>

</body>

</html>