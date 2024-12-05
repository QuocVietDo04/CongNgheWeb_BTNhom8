<div class="card lg:card-side">
    <!-- Image -->
    <figure class="w-1/3">
        <img
            src="<?php echo 'uploads/' . htmlspecialchars($news['image']); ?>"
            alt="Team Image"
            class="rounded-lg"
        />
    </figure>

    <!-- Content -->
    <div class="card-body w-2/3">
        <!-- Title -->
        <h2 class="card-title text-blue-500 hover:underline cursor-pointer">
            <?php echo $news['title']; ?>
        </h2>
        <!-- Date -->
        <p class="text-gray-500 text-sm"><?php echo $news['created_at']; ?></p>
        <!-- Description -->
        <p class="text-black text-sm">
            <?php echo $news['content']; ?>
        </p>
        <!-- Link -->
        <a
            href="news_detail.php?id=<?php echo $news['id']; ?>" 
            class="text-blue-500 text-sm hover:underline flex justify-end"
        >
            › Xem chi tiết
        </a>
    </div>
</div>
<hr />
