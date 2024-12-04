<?php
require_once '../Models/News.php';
class Homecontroller {
    public function index() {
            $newModel = new News();
            $newList = $newModel->getAllNews();
            require_once '../Views/home/index.php';

        }
    public function search() {
        if(isset($_GET['keyword'])){
            $keyword = $_GET['keyword'];
            $newModel = new News();
            $result = $newModel->searchNews($keyword);
            require_once '../Views/home/index.php';
        }else{
            header('Location: index.php');
            exit();
        }
    }
}
?>