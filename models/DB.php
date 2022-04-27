<?php
/*
For bind_param:
i - integer
d - double
s - string
b - blob
*/
class DB {
    private $db;
    private $username;
    
    // Connect to the localhost CRM database
    function __construct() {
        $this->db       =   new mysqli("localhost", "root", "", "crm");
        $this->username =   'DeeDee';
    }
    // Get all customers 
    public function getCustomers($limit = 25, $pagination = 1, $searchValue = NULL, $searchFilter = NULL) {
        $query  =   "SELECT * FROM customer";
        if (!empty($searchValue) && !empty($searchFilter)) {
            if ($searchFilter == 'FirstName' || $searchFilter == 'LastName' || $searchFilter == 'Email') {
                $query  .=   " WHERE $searchFilter LIKE '$searchValue%'";
            }
            else {
                $query  .=   " WHERE $searchFilter = '$searchValue'";
            }
            $query  .=  " ORDER BY $searchFilter ASC";
        }
        else {
            $query  .=   " ORDER BY LastModified DESC, CreatedOn DESC";
        }
        $query  .=  " LIMIT $limit";
        if ($pagination > 1) {
            $query .= " OFFSET " . ($limit * ($pagination - 1));
        }
        $result =   $this->db->query($query);
        return $result;
    }
    // Get the total number of customers currently in the DB
    public function getCustomerCount($searchValue = NULL, $searchFilter = NULL) {
        $query  =   "SELECT COUNT(*) AS TotalCustomers FROM customer";
        if (!empty($searchValue) && !empty($searchFilter)) {
            if ($searchFilter == 'FirstName' || $searchFilter == 'LastName' || $searchFilter == 'Email') {
                $query  .=   " WHERE $searchFilter LIKE '$searchValue%'";
            }
            else {
                $query  .=   " WHERE $searchFilter = '$searchValue'";
            }
        }
        $result =   intval($this->db->query($query)->fetch_array(MYSQLI_ASSOC)['TotalCustomers']);
        return $result;
    }
    // Get customer names based on entered value
    public function getCustomerName($value) {
        $query  =   "SELECT FirstName, LastName FROM customer WHERE FirstName LIKE '$value%' OR LastName LIKE '$value%'";
        $result =   $this->db->query($query);
        return $result;
    }
    // Add customer
    public function addCustomer($data) {
        $query      =   "INSERT INTO customer (FirstName, LastName, DOB, Email, PhoneNumber, CreatedBy) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt       =   $this->db->prepare($query);
        $stmt->bind_param("ssssss", $data['FirstName'], $data['LastName'], $data['DOB'], $data['Email'], $data['PhoneNumber'], $this->username);
        $success    =   $stmt->execute();
        return $success;
    }
    // Get all products
    public function getProducts() {
        $query  =   "SELECT * FROM product ORDER BY LastModified DESC, CreatedOn DESC;";
        $result =   $this->db->query($query);
        return $result;
    }
    // Add product
    public function addProduct($data) {
        $query      =   "INSERT INTO product (ProductName, Price, Description, CreatedBy) VALUES (?, ?, ?, ?);";
        $stmt       =   $this->db->prepare($query);
        $stmt->bind_param("sdss", $data['ProductName'], $data['Price'], $data['Description'], $this->username);
        $success    =   $stmt->execute();
        return $success;
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