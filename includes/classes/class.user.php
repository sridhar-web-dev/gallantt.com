<?php
class User {
    private $db;
    private $maxAttempts = 5;        // Max allowed attempts
    private $lockoutTime = 900;      // 15 minutes in seconds

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, password, login_attempts, last_attempt FROM web_users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$user) {
            return false;
        }
    
        // Convert last attempt to timestamp (if not null)
        $lastAttempt = !empty($user['last_attempt']) ? strtotime($user['last_attempt']) : 0;
        $timePassed  = time() - $lastAttempt;
    
        // Check if account is locked
        if ($user['login_attempts'] >= $this->maxAttempts && $timePassed < $this->lockoutTime) {
            return [
                'status' => 'locked',
                'remaining_attempts' => 0
            ];
        }
    
        // Reset attempts if lockout time passed
        if ($user['login_attempts'] >= $this->maxAttempts && $timePassed >= $this->lockoutTime) {
            $this->resetAttempts($user['id']);
        }
    
        // Verify password
        if (password_verify($password, $user['password'])) {
            $this->resetAttempts($user['id']); // reset on successful login
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['last_activity'] = time();
            
            return true;
        } else {
            $this->recordFailedAttempt($user['id']);
            $remainingAttempts = max(0, $this->maxAttempts - ($user['login_attempts'] + 1));
            return [
                'status' => $remainingAttempts === 0 ? 'locked' : 'error',
                'remaining_attempts' => $remainingAttempts
            ];
        }
    }
    
    public function autoResetLockouts() {
        $stmt = $this->db->prepare("
            UPDATE web_users 
            SET login_attempts = 0, last_attempt = NULL 
            WHERE login_attempts >= ? 
            AND TIMESTAMPDIFF(SECOND, last_attempt, NOW()) >= ?
        ");
        $stmt->execute([$this->maxAttempts, $this->lockoutTime]);
    }
    
    private function recordFailedAttempt($userId) {
        $stmt = $this->db->prepare("UPDATE web_users SET login_attempts = login_attempts + 1, last_attempt = NOW() WHERE id = ?");
        $stmt->execute([$userId]);
    }

    private function resetAttempts($userId) {
        $stmt = $this->db->prepare("UPDATE web_users SET login_attempts = 0, last_attempt = NULL WHERE id = ?");
        $stmt->execute([$userId]);
    }
}
?>
