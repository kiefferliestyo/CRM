<?php
class DB {
    public $db;
    
    // Connect to the localhost CRM database
    function __construct() {
        $this->db =   new mysqli("localhost", "root", "", "crm");
    }
    // Get all customers 
    public function getCustomers() {
        $query  =   "SELECT * FROM customer ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
    // Get all products
    public function getProducts() {
        $query  =   "SELECT * FROM product ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
}
?>