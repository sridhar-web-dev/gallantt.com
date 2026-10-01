<?php
class Tables
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getDB();
    }
    // --- STATES ---
    public function getStates()
    {
        $stmt = $this->db->prepare("SELECT * FROM web_states ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addState($name)
    {
        $stmt = $this->db->prepare("INSERT INTO web_states (name) VALUES (:name)");
        return $stmt->execute([':name' => $name]);
    }
    public function updateState($id, $name)
    {
        $stmt = $this->db->prepare("UPDATE web_states SET name = :name WHERE id = :id");
        return $stmt->execute([':name' => $name, ':id' => $id]);
    }
    public function deleteState($id)
    {
        $stmt = $this->db->prepare("DELETE FROM web_states WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    // --- DISTRICTS ---
    public function getDistricts()
    {
        $stmt = $this->db->prepare("
            SELECT d.id, d.name AS district_name, d.state_id, s.name AS state_name
            FROM web_districts d
            LEFT JOIN web_states s ON d.state_id = s.id
            ORDER BY d.id DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addDistrict($name, $state_id)
    {
        $stmt = $this->db->prepare("INSERT INTO web_districts (name, state_id) VALUES (:name, :state_id)");
        return $stmt->execute([':name' => $name, ':state_id' => $state_id]);
    }
    public function updateDistrict($id, $name, $state_id)
    {
        $stmt = $this->db->prepare("UPDATE web_districts SET name = :name, state_id = :state_id WHERE id = :id");
        return $stmt->execute([':name' => $name, ':state_id' => $state_id, ':id' => $id]);
    }
    public function deleteDistrict($id)
    {
        $stmt = $this->db->prepare("DELETE FROM web_districts WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    // --- PRODUCTS ---
    public function getProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM web_products ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addProduct($name)
    {
        $stmt = $this->db->prepare("INSERT INTO web_products (name) VALUES (:name)");
        return $stmt->execute([':name' => $name]);
    }
    public function updateProduct($id, $name)
    {
        $stmt = $this->db->prepare("UPDATE web_products SET name = :name WHERE id = :id");
        return $stmt->execute([':name' => $name, ':id' => $id]);
    }
    public function deleteProduct($id)
    {
        $stmt = $this->db->prepare("DELETE FROM web_products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
