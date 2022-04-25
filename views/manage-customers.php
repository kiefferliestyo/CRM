<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>Manage Customers</div>
        </div>
    </div>
</div>
<div class="search-wrapper page-search active">
    <form method="get" action="index.php">
        <input type="hidden" name="page" value="manage-customers">
        <div class="input-holder">
            <select id="SearchFilter" name="SearchFilter" class="search-input">
                <option value="CustomerID" <?php if (!empty($searchFilter) && $searchFilter == 'CustomerID') echo 'selected'; ?>>Customer ID</option>
                <option value="FirstName" <?php if ((!empty($searchFilter) && $searchFilter == 'FirstName') || empty($searchFilter)) echo 'selected'; ?>>First Name</option>
                <option value="LastName" <?php if (!empty($searchFilter) && $searchFilter == 'LastName') echo 'selected'; ?>>Last Name</option>
                <option value="DOB" <?php if (!empty($searchFilter) && $searchFilter == 'DOB') echo 'selected'; ?>>DOB</option>
                <option value="Email" <?php if (!empty($searchFilter) && $searchFilter == 'Email') echo 'selected'; ?>>Email Address</option>
                <option value="Status" <?php if (!empty($searchFilter) && $searchFilter == 'Status') echo 'selected'; ?>>Status</option>
            </select>
        </div>
        <div class="input-holder">
            <input type="<?php !empty($inputType) && $inputType != 'select' ? $inputType : 'text'?>" id="SearchValue" name="SearchValue" class="search-input" placeholder="Type to search" <?php if (!empty($inputType) && $inputType == 'select') echo 'disabled style="display: none;"'; ?> <?php if (!empty($searchValue)) echo 'value="' . $searchValue . '"'; ?>>
            <select id="SearchValueSelect" name="SearchValue" class="search-input" <?php if ((!empty($inputType) && $inputType != 'select') || empty($inputType)) echo 'disabled style="display: none;"'; ?>>
                <option value="Active" <?php if ((!empty($inputType) && $inputType == 'select') && (!empty($searchValue) && $searchValue == 'Active')) echo 'selected'; ?>>Active</option>
                <option value="Inactive" <?php if ((!empty($inputType) && $inputType == 'select') && (!empty($searchValue) && $searchValue == 'Inactive')) echo 'selected'; ?>>Inactive</option>
            </select>
            <button type="submit" class="search-icon">
                <span></span>
            </button>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($customers as $customer) {
                    ?>
                        <tr>
                            <td><?=$customer['CustomerID']?></td>
                            <td><?=$customer['FirstName']?></td>
                            <td><?=$customer['LastName']?></td>
                            <td><?=$customer['DOB']?></td>
                            <td><?=$customer['Email']?></td>
                            <td><?=$customer['PhoneNumber']?></td>
                            <td><?=$customer['Status']?></td>
                            <td><button class="btn btn-primary">Edit</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>