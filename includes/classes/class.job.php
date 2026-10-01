<?php
class Job
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
    // Create Job
    public function createJob($data)
    {
        $sql = "INSERT INTO web_jobs (job_title, department, experience, job_type, location, vacancies, job_description)
                VALUES (:job_title, :department, :experience, :job_type, :location, :vacancies, :job_description)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    // Fetch All Jobs
    public function getJobsWithPagination($limit, $offset)
    {
        $stmt = Database::getDB()->prepare("SELECT * FROM web_jobs ORDER BY date_posted DESC LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getActiveJobs($location = null)
    {
        try {
            $db = Database::getDB();
            if ($location) {
                $stmt = $db->prepare("SELECT * FROM web_jobs WHERE status = 'active' AND location = :location ORDER BY date_posted DESC");
                $stmt->bindParam(':location', $location);
            } else {
                $stmt = $db->prepare("SELECT * FROM web_jobs WHERE status = 'active' ORDER BY date_posted DESC");
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    // Get Single Job
    public function getJobById($job_id)
    {
        $sql  = "SELECT * FROM web_jobs WHERE job_id = :job_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['job_id' => $job_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Update Job
    public function updateJob($data)
    {
        $sql = "UPDATE web_jobs SET job_title = :job_title, department = :department, experience = :experience,
                job_type = :job_type, location = :location, vacancies = :vacancies, job_description = :job_description
                WHERE job_id = :job_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }
    // Delete Job
    public function deleteJob($job_id)
    {
        $sql  = "DELETE FROM web_jobs WHERE job_id = :job_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['job_id' => $job_id]);
    }
    public function getDisabledJobs()
    {
        return $this->db->query("SELECT COUNT(*) FROM web_jobs WHERE status = 'disabled'")->fetchColumn();
    }
    // DAshboard
    public function getTotalJobs()
    {
        $db    = Database::getDB();
        $query = "SELECT COUNT(*) AS total FROM web_jobs"; // Assuming table name is 'jobs'
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
