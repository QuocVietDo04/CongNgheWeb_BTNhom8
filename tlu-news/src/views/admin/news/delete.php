<?php
function getDeleteAlert()
{
    return '
    <dialog id="deleted" class="modal">
        <form id="deleteAlert" action="index.php?page=news&action=delete" method="post" enctype="multipart/form-data" class="modal-box space-y-4">
            <input type="hidden" id="delete_id" name="id">
            <input type="hidden" id="delete_image" name="image">
            <div class="flex justify-between items-center px-6 modal-action">
                <h3 class="text-2xl font-semibold text-gray-700">
                    Xác nhận xóa tin tức
                </h3>
                <button type="button" class="font-extrabold text-lg text-gray-500 hover:text-gray-700" onclick="deleted.close()">
                    ✕
                </button>
            </div>
            <hr />
            <p class="px-6 text-xl">Bạn có chắc chắn muốn xóa tin tức này không?</p>
            <div class="flex-container-right px-6 space-x-3 modal-action">
                <button type="button" class="btn btn-ghost hover:text-red-500 hover:bg-white" onclick="deleted.close()">
                    Hủy
                </button>
                <button type="submit" class="btn btn-error text-white">Xoá</button>
            </div>
        </form>
    </dialog>';
}
