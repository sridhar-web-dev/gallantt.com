<?php
require_once '../../../config/config.php';
if (isset($_POST['job_id'])) {
    $job = new Job();
    $result = $job->deleteJob($_POST['job_id']);
    if ($result) {
        clearVarnishCache();
        echo "Job deleted successfully!";
    } else {
        echo "Failed to delete job.";
    }
}
?>
