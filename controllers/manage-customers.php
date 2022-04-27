<?php
// Set default number of rows to display
$rows           =   !empty($_GET['rows']) ? $_GET['rows'] : 25;
// Set current pagination and starting row location
$pagination     =   !empty($_GET['pagination']) ? $_GET['pagination'] : 1;
// Set search and filter type values if the GET variables are set
if (!empty($_GET['SearchValue']) && !empty($_GET['SearchFilter'])) {
    $searchValue    =   trim($_GET['SearchValue']);
    $searchFilter   =   $_GET['SearchFilter'];
    // Set the GET string for pagination clicks
    $searchString   =   "&SearchValue=$searchValue&SearchFilter=$searchFilter";
    // Set the default input type based on the search filter
    if ($searchFilter == 'FirstName' || $searchFilter == 'LastName' || $searchFilter == 'Email') {
        $inputType  =   'text';
    }
    else if ($searchFilter == 'CustomerID') {
        $inputType  =   'number';
    }
    else if ($searchFilter == 'DOB') {
        $inputType  =   'date';
    }
    else {
        $inputType  =   'select';
    }
    // Get customer count based on the search
    $customerCount  =   $db->getCustomerCount($searchValue, $searchFilter);
    $customers      =   $db->getCustomers($rows, $pagination, $searchValue, $searchFilter);
}
// Search for all customers
else {
    $searchString   =   '';
    // Get the current total customer count in the DB
    $customerCount  =   $db->getCustomerCount();
    // Get all customers data
    $customers      =   $db->getCustomers($rows, $pagination);
}
?>