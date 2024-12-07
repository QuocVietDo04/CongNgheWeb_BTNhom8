<?php
function getEditForm()
{
    return '
    <dialog id="edit" class="modal">
        <form id="editForm" action="index.php?page=news&action=update" method="post" enctype="multipart/form-data" class="modal-box space-y-4">
            <input type="hidden" id="edit_id" name="id">
            <div class="flex justify-between items-center px-6 modal-action">
                <h3 class="text-2xl font-semibold text-gray-700">
                    Chỉnh sửa tin tức
                </h3>
                <button type="button" class="font-extrabold text-lg text-gray-500 hover:text-gray-700" onclick="edit.close()">
                    ✕
                </button>
            </div>
            <hr />
            <div class="px-6 py-2 space-y-6">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Tiêu đề</label>
                    <input type="text" id="edit_title" name="title" class="input input-bordered w-full" required>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Ảnh bìa</label>
                    <input type="file" id="edit_image" name="image" class="file-input file-input-bordered w-full">
                    <img id="current_image" src="" alt="Ảnh hiện tại" class="max-w-xs mt-2">
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nội dung</label>
                    <textarea id="edit_content" name="content" class="textarea textarea-bordered w-full" required></textarea>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Danh mục</label>
                    <select id="edit_category_id" name="category_id" class="select select-bordered w-full" required>
                        <option value="1">Tin KHCN và HTQT</option>
                        <option value="2">Tin đào tạo</option>
                        <option value="3">Tin tức chung</option>
                        <option value="4">Tin công tác sinh viên</option>
                    </select>
                </div>
            </div>
            <hr />
            <div class="flex-container-right px-6 space-x-3 modal-action">
                <button type="button" class="btn btn-ghost hover:text-red-500 hover:bg-white" onclick="edit.close()">
                    Hủy
                </button>
                <button type="submit" class="btn btn-success text-white">Cập nhật</button>
            </div>
        </form>
    </dialog>';
}
