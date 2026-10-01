<?php
require_once '../config/config.php';


if (isset($_POST['district_id']) && isset($_POST['product_id'])) {
  $district_id = $_POST['district_id'];
  $product_id = $_POST['product_id'];
  $db = Database::getDB();
  $stmt = $db->prepare("SELECT name, price FROM web_sections WHERE district_id = ? AND product_id = ? ORDER BY name ASC");
  $stmt->execute([$district_id, $product_id]);
  $sections = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($sections) {
    echo '<table class="custom_price_table">';
    echo '<thead><tr><th>Section</th><th>Price (Rs)</th></tr></thead><tbody>';
    foreach ($sections as $section) {
      echo '<tr>';
      echo '<td>'. htmlspecialchars($section['name']) .'</td>';
      echo '<td>'. htmlspecialchars($section['price']) .'</td>';
      echo '</tr>';
    }
    echo '</tbody></table>';
  } else {
    echo 'No data found for the selected filters.';
  }
}
?>
