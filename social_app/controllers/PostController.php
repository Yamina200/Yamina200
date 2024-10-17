<?php
require_once '../config/database.php';

class PostController {
    public function getAllPosts() {
        global $pdo;
        $stmt = $pdo->query("SELECT Posts.*, Users.pseudo FROM Posts JOIN Users ON Posts.user_id = Users.id ORDER BY date_post DESC");
        return $stmt->fetchAll();
    }

    public function getPostById($post_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT Posts.*, Users.pseudo FROM Posts JOIN Users ON Posts.user_id = Users.id WHERE Posts.id = ?");
        $stmt->execute([$post_id]);
        return $stmt->fetch();
    }
}
?>
