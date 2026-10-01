<?php
// require_once '../../../../config/config.php';
// $db = Database::getDB();

// if (!empty($_POST['name'])) {
//     $stmt = $db->prepare("INSERT INTO web_states (name) VALUES (?)");
//     $stmt->execute([trim($_POST['name'])]);
//     $id = $db->lastInsertId();
//     echo json_encode(['id' => $id, 'name' => $_POST['name']]);
// }
// <?php
require_once '../../../../config/config.php';
$db = Database::getDB();

if (!empty($_POST['name'])) {
    // Insert into web_states
    $stmt = $db->prepare("INSERT INTO web_states (name) VALUES (?)");
    $stmt->execute([trim($_POST['name'])]);
    $stateId = $db->lastInsertId();

    // Insert default district with name "All districts" for this state
    $stmt2 = $db->prepare("INSERT INTO web_districts (state_id, name) VALUES (?, ?)");
    $stmt2->execute([$stateId, 'All districts']);
    clearVarnishCache();

    // Return inserted state data
    echo json_encode(['id' => $stateId, 'name' => $_POST['name']]);
}
