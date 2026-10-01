<?php
require_once '../../../config/config.php';
$job = new Job();
$data = [
    'job_id' => $_POST['job_id'] ?? null,
    'job_title' => $_POST['job_title'],
    'department' => $_POST['department'],
    'experience' => $_POST['experience'],
    'job_type' => $_POST['job_type'],
    'location' => $_POST['location'],
    'vacancies' => $_POST['vacancies'],
    'job_description' => $_POST['job_description']
];
if ($data['job_id']) {
    $result = $job->updateJob($data);
    if ($result) {
        clearVarnishCache();
        echo "Job updated successfully!";
    } else {
        echo "Failed to update job.";
    }
} else {
    unset($data['job_id']);
    $result = $job->createJob($data);
    if ($result) {
        clearVarnishCache();
        echo "Job posted successfully!";
    } else {
        echo "Failed to post job.";
    }
}
?>
