<?php
function getHeader()
{
    $headerHTML = '
    <header class="background">
        <div class="header px-[250px]">
            <img src="./src/assets/logo.png" alt="Logo" />
            <div class="mode-box">';

    if (!isset($_SESSION['role'])) {
        // Chưa đăng nhập
        $headerHTML .= '
                <div class="flex gap-2 pb-1 border-b-2">
                    <a href="index.php?page=admin&action=login" class="btn btn-sm btn-ghost text-base">
                        <span class="iconify text-2xl" data-icon="solar:user-linear"></span>
                        <span>Đăng nhập</span>
                    </a>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:vn-4x3"></span>
                    </button>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:gb-4x3"></span>
                    </button>
                </div>
                <p class="text-blue-700 font-[500] italic underline">
                    Cổng thông tin chính thức của trường Đại học Thuỷ Lợi!
                </p>';
    } elseif ($_SESSION['role'] == 0) {
        // Đăng nhập với tư cách User
        $headerHTML .= '
                <div class="flex gap-2 pb-1 border-b-2">
                    <button class="btn btn-sm btn-ghost text-base">
                        <span class="iconify text-3xl" data-icon="solar:user-circle-bold"></span>
                        <span>Xin chào, </span>
                        <span class="text-red-500">User</span>
                    </button>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:vn-4x3"></span>
                    </button>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:gb-4x3"></span>
                    </button>
                </div>
                <div class="flex justify-end gap-2 pt-1">
                    <form action="index.php?page=admin&action=logout" method="POST">
                        <button type="submit" class="btn btn-sm btn-error text-white">Đăng xuất</button>
                    </form>
                </div>';
    } elseif ($_SESSION['role'] == 1) {
        // Đăng nhập với tư cách Admin
        $headerHTML .= '
                <div class="flex gap-2 pb-1 border-b-2">
                    <button class="btn btn-sm btn-ghost text-base">
                        <span class="iconify text-3xl" data-icon="solar:user-circle-bold"></span>
                        <span>Xin chào, </span>
                        <span class="text-red-500">Admin</span>
                    </button>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:vn-4x3"></span>
                    </button>
                    <button class="pt-[2px]">
                        <span class="iconify" data-icon="flag:gb-4x3"></span>
                    </button>
                </div>
                <div class="flex justify-end gap-2 pt-1">';
        if (isset($_GET['page']) && $_GET['page'] == 'admin' && isset($_GET['action']) && $_GET['action'] == 'dashboard') {
            $headerHTML .= '
                    <a href="index.php" class="btn btn-sm btn-info text-white">Về hệ thống</a>
                    <form action="index.php?page=admin&action=logout" method="POST">
                        <button type="submit" class="btn btn-sm btn-error text-white">Đăng xuất</button>
                    </form>';
        } else {
            $headerHTML .= '
                    <a href="index.php?page=admin&action=dashboard" class="btn btn-sm btn-info text-white">Chế độ chỉnh sửa</a>
                    <form action="index.php?page=admin&action=logout" method="POST">
                        <button type="submit" class="btn btn-sm btn-error text-white">Đăng xuất</button>
                    </form>';
        }
        $headerHTML .= '</div>';
    }

    $headerHTML .= '</div>
        </div>
    </header>';

    return $headerHTML;
}
