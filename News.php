<?php

class News {
    private $db;

    // Constructor nhận vào đối tượng PDO
    public function __construct($db) {
        $this->db = $db;
    }

    // Thêm tin tức mới
    public function addNews($title, $content, $image,$created_at, $category_id) {
        $sql = "INSERT INTO news (title, content, image, created_at, category_id) 
                VALUES (:title, :content, :image, :category_id)";
        
        $stmt = $this->db->prepare($sql);

        // Gán các giá trị vào tham số
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':category_id', $category_id);

        return $stmt->execute();
    }

    // Sửa tin tức
    public function updateNews($id, $title, $content, $image,$created_at, $category_id) {
        $sql = "UPDATE news SET title = :title, content = :content, image = :image, created_at = :created_at, category_id = :category_id
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);

        // Gán các giá trị vào tham số
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Xoá tin tức
    public function deleteNews($id) {
        $sql = "DELETE FROM news WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);

        // Gán giá trị id vào tham số
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Lấy tất cả tin tức
    public function getAllNews() {
        $sql = "SELECT * FROM tictuc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tin tức theo ID
    public function getNewsById($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
