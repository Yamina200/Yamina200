// models/Post.php
<?php
class Post {
    private $conn;
    private $table_name = "posts";

    public $id;
    public $user_id;
    public $image;
    public $description;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllPosts() {
        $query = "SELECT posts.*, users.username FROM " . $this->table_name . " JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsByUserId($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>



