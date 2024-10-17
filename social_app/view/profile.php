// views/profile.php
<?php
session_start();
include_once '../config/Database.php';
include_once '../models/Post.php';

$database = new Database();
$db = $database->getConnection();

$post = new Post($db);
$user_posts = $post->getPostsByUserId($_GET['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
</head>
<body>
    <h1>Profil de <?php echo htmlspecialchars($_GET['pseudo']); ?></h1>
    <?php foreach ($user_posts as $post): ?>
        <div>
            <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image">
            <p><?php echo htmlspecialchars($post['description']); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>

