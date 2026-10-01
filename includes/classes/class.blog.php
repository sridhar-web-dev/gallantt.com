<?php
class Blog
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
    public function createBlog($title, $image, $description, $status)
    {
        $stmt = $this->db->prepare("INSERT INTO web_blogs (title, image, description, status) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $image, $description, $status]);
    }
    public function getAllBlogs($limit, $offset)
    {
        $db   = Database::getDB();
        $stmt = $db->prepare("SELECT * FROM web_blogs ORDER BY post_date DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBlogById($id)
    {
        $db   = Database::getDB();
        $stmt = $this->db->prepare("SELECT * FROM web_blogs WHERE blog_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateBlog($id, $title, $image, $description)
    {
        $stmt = $this->db->prepare("UPDATE web_blogs SET title=?, image=?, description=? WHERE blog_id=?");
        return $stmt->execute([$title, $image, $description, $id]);
    }
    public function deleteBlog($blog_id)
    {
        $db = Database::getDB();
        // Get the blog image filename before deleting the entry
        $stmt = $db->prepare("SELECT image FROM web_blogs WHERE blog_id = ?");
        $stmt->execute([$blog_id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($blog && ! empty($blog['image'])) {
            $imagePath = ABS_PATH . 'uploads/blog/uploads/' . basename($blog['image']);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image from the folder
            }
        }
        // Delete the blog from the database
        $stmt   = $db->prepare("DELETE FROM web_blogs WHERE blog_id = ?");
        $result = $stmt->execute([$blog_id]);
        return $result;
    }
    // dashboard
    public function getActiveBlogs()
    {
        return $this->db->query("SELECT COUNT(*) FROM web_blogs WHERE status = '1'")->fetchColumn();
    }
    public function getDisabledBlogs()
    {
        return $this->db->query("SELECT COUNT(*) FROM web_blogs WHERE status = '0'")->fetchColumn();
    }
    public function getTotalBlogs()
    {
        $db    = Database::getDB();
        $query = "SELECT COUNT(*) AS total FROM web_blogs"; // Make sure this matches your table name
        $stmt  = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function updateBlogStatus($blogId, $status)
    {
        $db   = Database::getDB(); // this returns a PDO object
        $stmt = $db->prepare("UPDATE web_blogs SET status = ? WHERE blog_id = ?");
        return $stmt->execute([$status, $blogId]);
    }
}
