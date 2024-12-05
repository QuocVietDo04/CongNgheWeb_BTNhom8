<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - TLU</title>

    <!-- Liên kết CSS -->
    <link href="./src/style.css" rel="stylesheet">
    <link href="./src/tailwind.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <!-- Card Container -->
    <div class="flex flex-col md:flex-row bg-white shadow-md rounded-lg overflow-hidden w-[800px] h-[480px]">
        <!-- Left Section -->
        <div class="bg-gradient-to-r from-cyan-400 to-blue-300 flex items-center justify-center p-6 md:w-1/2">
            <img src="src/assets/logo-truongthumb.png" alt="Logo" class="w-[60%] max-w-sm">
        </div>
        <!-- Right Section -->
        <div class="p-12 md:w-1/2">
            <h2 class="text-sm font-medium text-gray-700 mb-4">TÊN ĐĂNG NHẬP</h2>
            <form action="index.php?page=admin&action=postLogin" method="POST">
                <input
                    type="text"
                    name="username"
                    placeholder="Tài khoản đăng nhập"
                    class="input input-bordered w-full mb-4"
                    required
                >
                <h2 class="mt-3 text-sm font-medium text-gray-700 mb-4">MẬT KHẨU</h2>
                <input
                    type="password"
                    name="password"
                    placeholder="*******"
                    class="input input-bordered w-full mb-4"
                    required
                >
                <button type="submit" class="btn btn-black w-full my-6">ĐĂNG NHẬP</button>
            </form>
            <div class="text-sm text-gray-500">
                <p>
                    Đăng nhập bằng email
                    <span class="text-blue-600">@tlu.edu.vn</span>
                </p>
                <p>
                    Bạn chưa có tài khoản?
                    <a href="#" class="text-blue-600">Tạo tài khoản mới</a>
                </p>
                <p>
                    <a href="#" class="text-blue-600">Bạn đã quên mật khẩu?</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
