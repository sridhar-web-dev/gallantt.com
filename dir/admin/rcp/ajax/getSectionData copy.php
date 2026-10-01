<?php
require_once '../../../../config/config.php';

$handler = new FormHandler();

if (!empty($_POST['district_id']) && !empty($_POST['product_id'])) {
    $data = $handler->getSectionData($_POST['district_id'], $_POST['product_id']);
   if($_POST['page_name'] == 'rcp')
   {
    if ($data) {
        echo '<table class="table table-bordered"><thead><tr><th>Section</th><th>Consumer Price</th></tr></thead><tbody>';
        foreach ($data as $row) {
            echo '<tr>
                    <td contenteditable="true" class="editable-section" data-id="'.$row['id'].'" data-field="section">'.htmlspecialchars($row['section']).'</td>
                    <td contenteditable="true" class="editable-price" data-id="'.$row['id'].'" data-field="consumer_price">'.htmlspecialchars($row['consumer_price']).'</td>
                </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No data found.</p>';
    }
   }
   else
   {
    if ($data) {
        echo '<table class="table table-bordered"><thead><tr><th>Section</th><th>Consumer Price</th><th>Action</th></tr></thead><tbody>';
        foreach ($data as $row) {
            echo '<tr>
                    <td contenteditable="true" class="editable-section" data-id="'.$row['id'].'" data-field="section">'.htmlspecialchars($row['section']).'</td>
                    <td contenteditable="true" class="editable-price" data-id="'.$row['id'].'" data-field="consumer_price">'.htmlspecialchars($row['consumer_price']).'</td>
                   <td><button class="btn btn-sm btn-danger delete-row" data-id="'.$row['id'].'">Delete</button></td>
                </tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No data found.</p>';
    }
   }
    
}
