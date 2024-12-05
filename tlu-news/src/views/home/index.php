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

    <!-- Import Header và hiển thị -->
    <?php
    require_once 'src/views/partials/header.php';
    echo getHeader();
    ?>

    <!-- Nội dung động được hiển thị -->
    <main class="main-content">
        <!-- Phần tiêu đề và thanh tìm kiếm -->
        <div class="flex-container-between border-b-[1px] border-black pb-5">
            <span class="text-3xl font-medium">TIN TỨC</span>
            <div class="flex items-center gap-1">
                <form method="POST" action="index.php?page=home&action=index" class="flex items-center gap-1">
                    <label class="input input-bordered flex items-center gap-2 w-[320px] h-[33px]">
                        <span class="iconify" data-icon="material-symbols:search"></span>
                        <input type="text" name="keyword" class="grow" placeholder="Tìm kiếm" value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" />
                    </label>
                    <button type="submit" class="btn btn-sm bg-[#e5e7eb]">Tìm kiếm</button>
                </form>
            </div>

        </div>

        <!-- Kiểm tra và hiển thị danh sách bài viết -->
        <?php
        if (empty($newsList)) {
            echo "<p>Không có bài viết nào để hiển thị.</p>";
        } else {
            // Lặp qua danh sách bài viết và hiển thị từng bài viết
            foreach ($newsList as $news) {
                include 'src/views/partials/news_card.php';
            }
        }
        ?>
    </main>

</body>

</html>