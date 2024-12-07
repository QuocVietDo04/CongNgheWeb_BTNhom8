<?php
function getAddForm()
{
    return '
    <dialog id="add" class="modal">
        <!-- Modal Content -->
        <form action="index.php?page=news&action=store" method="post" enctype="multipart/form-data" class="modal-box space-y-4">
            <!-- Modal Header -->
            <div class="flex justify-between items-center px-6 modal-action">
                <h3 class="text-2xl font-semibold text-gray-700">
                    Thêm tin tức mới
                </h3>
                <button type="button" class="font-extrabold text-lg text-gray-500 hover:text-gray-700" onclick="add.close()">
                    ✕
                </button>
            </div>
            <hr />

            <!-- Modal Body -->
            <div class="px-6 py-2 space-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                    <input
                        type="text"
                        name="title"
                        placeholder="Nhập tiêu đề"
                        class="input input-bordered w-full" required />
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Ảnh bìa</label>
                    <input
                        type="file"
                        name="image"
                        class="file-input file-input-bordered w-full" required />
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nội dung</label>
                    <textarea
                        name="content"
                        placeholder="Nhập nội dung"
                        class="textarea textarea-bordered w-full" required></textarea>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select name="category_id" class="select select-bordered w-full" required>
                        <option value="1">Tin KHCN và HTQT</option>
                        <option value="2">Tin đào tạo</option>
                        <option value="3">Tin tức chung</option>
                        <option value="4">Tin công tác sinh viên</option>
                    </select>
                </div>
            </div>
            <hr />
            <!-- Modal Footer -->
            <div class="flex-container-right px-6 space-x-3 modal-action">
                <button type="button" class="btn btn-ghost hover:text-red-500 hover:bg-white" onclick="add.close()">
                    Cancel
                </button>
                <button type="submit" class="btn btn-success text-white">Add</button>
            </div>
        </form>
    </dialog>';
}
