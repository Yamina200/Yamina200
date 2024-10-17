// views/home.php
<?php
session_start();
include_once '../config/Database.php';
include_once '../models/Post.php';

$database = new Database();
$db = $database->getConnection();

$post = new Post($db); // Passez seulement la connexion à la base de données
$posts = $post->getAllPosts();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <?php foreach ($posts as $post): ?>
        <div>
            <h2><?php echo htmlspecialchars($post['pseudo']); ?></h2>
            <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="image">
            <p><?php echo htmlspecialchars($post['description']); ?></p>
            <p><?php echo htmlspecialchars($post['likes']); ?> J'aime</p>
            <a href="post.php?id=<?php echo $post['id']; ?>">Commentaires</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
