<?php
function getFooter() {
    return '
    <footer class="bg-blue-900 text-white py-5 bottom-0 w-full">
        <div class="container mx-auto flex justify-between items-center">
            <p class="text-sm ml-[200px]">@ 2024 Trường Đại học Thuỷ Lợi</p>

            <div class="flex space-x-4 mr-[100px]">
                <a href="https://facebook.com" target="_blank" class="text-white hover:text-blue-400">
                    <i class="fab fa-facebook"></i> Facebook
                </a>
                <a href="https://youtube.com" target="_blank" class="text-white hover:text-red-600">
                    <i class="fab fa-youtube"></i> YouTube
                </a>
                <a href="https://twitter.com" target="_blank" class="text-white hover:text-blue-400">
                    <i class="fab fa-twitter"></i> Twitter
                </a>
            </div>
        </div>

        <div class="container mx-auto mt-4 flex justify-between items-center">
            <div class="flex-shrink-0">
                <img src="src/assets/TLU-map.png" alt="Map" class="ml-[200px] max-w-[300px] h-auto" />
            </div>

            <div class="text-left text-sm mr-[700px]">
                <p>Trường Đại học Thuỷ Lợi</p>
                <p>Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội</p>
                <p>Điện thoại: (024) 38522201 - Fax: (024) 35633351</p>
                <p>Email: phonghcth@tlu.edu.vn</p>
            </div>
        </div>
    </footer>';
}
?>