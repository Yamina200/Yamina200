// models/User.php
<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $pseudo;
    public $email;
    public $password;
    public $date_inscription;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET pseudo=:pseudo, email=:email, password=:password, date_inscription=:date_inscription";
        $stmt = $this->conn->prepare($query);

        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->date_inscription = htmlspecialchars(strip_tags($this->date_inscription));

        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", password_hash($this->password, PASSWORD_BCRYPT));
        $stmt->bindParam(":date_inscription", $this->date_inscription);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET pseudo=:pseudo, email=:email, password=:password WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->pseudo = htmlspecialchars(strip_tags($this->pseudo));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(":pseudo", $this->pseudo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", password_hash($this->password, PASSWORD_BCRYPT));
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
