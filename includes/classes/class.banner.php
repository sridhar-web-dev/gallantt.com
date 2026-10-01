<?php
class Banner {
    // Insert a new banner
    public static function addBanner($title, $subtitle, $imageName) {
        $db = Database::getDB();
        // Insert the banner data into the database with just the file name
        $query = "INSERT INTO web_banners (title, subtitle, image) VALUES (:title, :subtitle, :image)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':subtitle', $subtitle);
        $stmt->bindParam(':image', $imageName); // Store only the image name in the database
        if ($stmt->execute()) {
            return true; // Success
        } else {
            return false; // Failure
        }
    }
    // Get all banners
    public static function getBanners() {
        $db = Database::getDB();
        $query = "SELECT * FROM web_banners ORDER BY `order` ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Dashboard 
    // class.media.php or class.homebanner.php
    public function getTotalBanners()
    {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) AS total FROM web_banners";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    // Get a specific banner by ID
    public static function getBannerById($banner_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM web_banners WHERE id = :banner_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':banner_id', $banner_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Delete a banner by ID
    public static function deleteBanner($bannerId) {
        $db = Database::getDB();
        // Fetch the banner data to get the image path
        $query = "SELECT image FROM web_banners WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $bannerId);
        $stmt->execute();
        $banner = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($banner) {
            $imagePath = $banner['image'];
            error_log($imagePath);
            $fullImagePath = ABS_PATH . 'uploads/home-banner/uploads/' . basename($imagePath);
            // Check if the image file exists, then delete it
            if (file_exists($fullImagePath)) {
                if (!unlink($fullImagePath)) {
                    return "Error deleting the image.";
                }
            }
            // Delete the banner record from the database
            $deleteQuery = "DELETE FROM web_banners WHERE id = :id";
            $deleteStmt = $db->prepare($deleteQuery);
            $deleteStmt->bindParam(':id', $bannerId);
            if ($deleteStmt->execute()) {
                return "Banner deleted successfully.";
            } else {
                return "Error deleting banner from database.";
            }
        } else {
            return "Banner not found.";
        }
    }
    public static function updateBanner($bannerId, $title, $subtitle, $imagePath) {
        $db = Database::getDB();
        // Update the banner in the database
        $query = "UPDATE web_banners SET title = :title, subtitle = :subtitle, image = :image WHERE id = :banner_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':subtitle', $subtitle);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':banner_id', $bannerId);
        return $stmt->execute();
    }
}
?>
