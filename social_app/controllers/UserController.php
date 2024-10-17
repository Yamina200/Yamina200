// controllers/UserController.php
<?php
include_once '../config/Database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->user->pseudo = $_POST['pseudo'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];
            $this->user->date_inscription = date('Y-m-d H:i:s');

            if ($this->user->findByEmail($this->user->email)) {
                echo "Email déjà utilisé.";
                return;
            }

            if ($this->user->create()) {
                echo "Inscription réussie.";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->user->findByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                echo "Connexion réussie.";
            } else {
                echo "Email ou mot de passe incorrect.";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        echo "Déconnexion réussie.";
    }
}
?>

