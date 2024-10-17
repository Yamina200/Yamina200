<?php
require_once '../controllers/UserController.php';
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $userController->register($pseudo, $email, $password);
    echo $message;
}
?>

<form method="post">
    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" required>
    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Inscription</button>
</form>
