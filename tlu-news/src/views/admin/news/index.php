<?php
require_once 'src\views\admin\news\add.php';
require_once 'src\views\admin\news\edit.php';
require_once 'src\views\admin\news\delete.php';

function getTable($newsList)
{
    // Bắt đầu HTML
    ob_start();
?>
    <div class="main-content px-[150px]">
        <div class="w-full shadow-md">
            <div class="table-header">
                <h2 class="text-[26px] font-bold">
                    Quản lý <span class="text-yellow-300">Tin tức</span>
                </h2>
                <button class="btn btn-success text-white" onclick="add.showModal()">
                    <span class="iconify text-2xl" data-icon="material-symbols:add-circle-rounded"></span>
                    <span>Thêm tin tức mới</span>
                </button>
            </div>

            <!-- Table -->
            <div class="table-content">
                <table class="table w-full">
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th class="px-6 py-5 text-left">ID</th>
                            <th class="px-6 py-5 text-left">Tiêu đề</th>
                            <th class="px-6 py-5 text-left">Ảnh bìa</th>
                            <th class="px-6 py-5 text-left">Nội dung</th>
                            <th class="px-6 py-5 text-left">Danh mục</th>
                            <th class="px-6 py-5 text-left">Thời gian đăng bài</th>
                            <th class="px-6 py-5 text-center">Hành động</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        <?php foreach ($newsList as $news): ?>
                            <tr class="hover:bg-gray-100">
                                <th class="px-6 py-5"><?= $news['id']; ?></th>
                                <td class="px-6 py-5"><?= $news['title']; ?></td>
                                <td class="px-6 py-5">
                                    <img src="uploads/<?= htmlspecialchars($news['image']); ?>" alt="Image" class="w-20 h-20 object-cover">
                                </td>
                                <td class="px-6 py-5"><?= $news['content']; ?></td>
                                <td class="px-6 py-5"><?= $news['category_name']; ?></td>
                                <td class="px-6 py-5"><?= $news['created_at']; ?></td>
                                <td class="px-6 py-5">
                                    <div class="h-full flex justify-center item-center gap-2">
                                        <button class="btn btn-sm btn-ghost hover:bg-amber-200 text-lg" onclick="openEditForm(<?php echo htmlspecialchars(json_encode($news)); ?>)">
                                            <span class="iconify text-amber-500" data-icon="fa:pencil"></span>
                                        </button>
                                        <button class="btn btn-sm btn-ghost hover:bg-red-200 text-lg" onclick="openDeleteAlert(<?php echo htmlspecialchars(json_encode($news)); ?>)">
                                            <span class="iconify text-red-500" data-icon="fa:trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center px-6 py-5 bg-gray-50">
                <span class="text-sm text-gray-600">Showing 5 out of <?= count($newsList); ?> entries</span>
                <div class="btn-group">
                    <button class="btn btn-sm btn-outline">Previous</button>
                    <button class="btn btn-sm btn-outline">1</button>
                    <button class="btn btn-sm btn-primary">2</button>
                    <button class="btn btn-sm btn-outline">3</button>
                    <button class="btn btn-sm btn-outline">Next</button>
                </div>
            </div>
        </div>

        <!-- Modal News -->
        <?= getAddForm(); ?>
        <?= getEditForm(); ?>
        <?= getDeleteAlert(); ?>

        <!-- Script JavaScript -->
        <script>
            function openEditForm(news) {
                const editForm = document.getElementById('edit');
                document.getElementById('edit_id').value = news.id;
                document.getElementById('edit_title').value = news.title;
                document.getElementById('edit_content').value = news.content;
                document.getElementById('edit_category_id').value = news.category_id;

                // Hiển thị ảnh hiện tại
                const currentImage = document.getElementById('current_image');
                currentImage.src = 'uploads/' + news.image;
                editForm.showModal();
            }

            function openDeleteAlert(news) {
                const deleteAlert = document.getElementById('deleted');
                document.getElementById('delete_id').value = news.id;
                document.getElementById('delete_image').value = news.id;
                deleteAlert.showModal();
            }
        </script>

    </div>
<?php
    // Kết thúc HTML và trả về
    return ob_get_clean();
}
?>