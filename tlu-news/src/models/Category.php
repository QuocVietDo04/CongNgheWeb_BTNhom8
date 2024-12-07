<?php
require_once 'Database.php';

class Category
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Lấy tất cả danh mục
    public function getAllCategories()
    {
        try {
            $query = "SELECT * FROM categories";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            error_log("Lỗi lấy danh sách danh mục: " . $exception->getMessage());
            return [];
        }
    }

}
