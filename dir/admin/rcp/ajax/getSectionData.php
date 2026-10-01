<?php
require_once '../../../../config/config.php';

$handler = new FormHandler();
error_log($_POST['district_id']);
if (!empty($_POST['district_id']) && !empty($_POST['product_id'])) {
    $data = $handler->getSectionData($_POST['state_Id'], $_POST['district_id'], $_POST['product_id']);
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
        echo '<div class="elementor-element elementor-element-31a3b22 e-flex e-con-boxed e-con e-parent" data-id="31a3b22" data-element_type="container">
          <div class="e-con-inner">
            <div class="elementor-element elementor-element-7ac0709 e-con-full e-flex e-con e-child" data-id="7ac0709" data-element_type="container">
              <div class="elementor-element elementor-element-026c9e1 elementor-widget elementor-widget-heading" data-id="026c9e1" data-element_type="widget" data-widget_type="heading.default">
                <div class="elementor-widget-container">
                  <h3 class="elementor-heading-title elementor-size-default">These prices are applicable in the state of&nbsp;'.htmlspecialchars($row['state_name']).'&nbsp;for material sold through the Authorised Distributor and its network, with effective from&nbsp;'.strtoupper((new DateTime($row['created_at']))->format('d M Y')).'</h3>
                </div>
              </div>
              <div class="elementor-element elementor-element-7993c08 elementor-widget__width-initial elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="7993c08" data-element_type="widget" data-widget_type="icon-list.default">
                <div class="elementor-widget-container">
                  <ul class="elementor-icon-list-items">
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">Above prices are all inclusive of taxes </span>
                    </li>
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">Above prices are not for credit purchase </span>
                    </li>
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">All measures between BIS tolerance range </span>
                    </li>
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">Prices can change without prior notice  </span>
                    </li>
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">Every TMT piece is approximately 12m in length  </span>
                    </li>
                    <li class="elementor-icon-list-item">
                      <span class="elementor-icon-list-icon">
                        <i aria-hidden="true" class="fas fa-circle"></i> </span>
                      <span class="elementor-icon-list-text">Free home delivery up to 5 KM on min <span style="font-weight:600; color:#000000;">purchase of 1 MT</span></span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>';
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
