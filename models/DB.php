<?php
class DB {
    private $db;
    private $username;
    
    // Connect to the localhost CRM database
    function __construct() {
        $this->db       =   new mysqli("localhost", "root", "", "crm");
        $this->username =   'DeeDee';
    }
    // Get all customers 
    public function getCustomers() {
        $query  =   "SELECT * FROM customer ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
    // Add customer
    public function addCustomer($data) {
        $query  =   "INSERT INTO customer (FirstName, LastName, DOB, Email, PhoneNumber, CreatedBy) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt   =   $this->db->prepare($query);
        $stmt->bind_param("ssssss", $data['FirstName'], $data['LastName'], $data['DOB'], $data['Email'], $data['PhoneNumber'], $this->username);
        $stmt->execute();
    }
    // Get all products
    public function getProducts() {
        $query  =   "SELECT * FROM product ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
    // Get all invoices
    public function getInvoices() {
        $query  =   "SELECT * FROM invoice ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
    // Get all users
    public function getUsers() {
        $query  =   "SELECT * FROM user ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
}
?>