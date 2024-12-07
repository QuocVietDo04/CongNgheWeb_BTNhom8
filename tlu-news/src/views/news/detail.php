<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?></title>

    <!-- Liên kết CSS -->
    <link href="src\tailwind.css" rel="stylesheet" />
    <link href="src\style.css" rel="stylesheet" />

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

    <!-- Import Header và hiển thị -->
    <?php
    require_once 'src/views/partials/header.php';
    echo getHeader();
    ?>

    <div class="main-content px-[500px]">
        <div class="container p-4">
            <div class="text-center my-4 space-y-2">
                <h1 class="text-left font-bold text-blue-700" style="font-size: 32px">
                    <?php echo htmlspecialchars($news['title']); ?>
                </h1>
                <p class="text-gray-600 text-left"><?php echo $news['created_at']; ?></p>
            </div>

            <div class="pt-5">
                <p class="text-[17px] text-gray-800">
                    <?php echo htmlspecialchars($news['content']); ?>
                </p>
            </div>

            <div class="px-12 my-6 flex justify-center">
                <img
                    src="<?php echo 'uploads/' . htmlspecialchars($news['image']); ?>"
                    alt="Ảnh bài viết"
                    class="shadow-lg w-full h-auto" />
            </div>

            <div class="flex justify-between pt-5">
                <div class="text-left text-sm text-gray-500">
                    Chuyên mục: <span class="text-blue-600"><?php echo htmlspecialchars($news['category_name']); ?></span>
                </div>
                <a href="index.php" class="btn btn-sm btn-info text-white">Về trang chủ</a>
            </div>
        </div>
    </div>

    <?php
    require_once 'src/views/partials/footer.php';
    echo getFooter();
    ?>

</body>

</html>