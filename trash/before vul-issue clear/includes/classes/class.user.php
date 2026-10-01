<?php
class User {
    private $db;
    public function __construct() {
        $this->db = Database::getDB();
    }
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, password FROM web_users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }
}
?>
