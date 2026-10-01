<?php
require_once '../config/config.php';


if (isset($_POST['state_id'])) {
  $state_id = $_POST['state_id'];
  $db = Database::getDB();
  $stmt = $db->prepare("SELECT id, name FROM web_districts WHERE state_id = ? ORDER BY name ASC");
  $stmt->execute([$state_id]);
  $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '<option value="">Select District</option>';
  foreach ($districts as $district) {
    echo '<option value="'. $district['id'] .'">'. htmlspecialchars($district['name']) .'</option>';
  }
}
?>
