<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>
                Add/Edit Invoice
                <?php
                if (!empty($insertError)) {
                ?>
                <div class="page-title-subheading errorText">
                    <?=$insertError?>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="tab-content">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <form method="post" action="index.php?page=add-edit-customer" <?php if (!empty($errors)) echo 'class="was-validated"'; ?>>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="CustomerName">Customer Name</label>
                            <input name="CustomerName" id="CustomerName" placeholder="John Doe..." type="text" class="form-control" required <?php if (!empty($customerName)) echo 'value="' . $customerName . '"'; ?>>
                            <?php
                            if (!empty($errors['CustomerName'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['CustomerName']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="CustomerID">Customer ID</label>
                            <input name="CustomerID" id="CustomerID" type="number" class="form-control" required readonly <?php if (!empty($customerID)) echo 'value="' . $customerID . '"'; ?>>
                            <?php
                            if (!empty($errors['CustomerID'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['CustomerID']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <h5 class="card-title">Products</h5>
                <?php if (!empty($products)) {
                    $index  =   0;
                    foreach ($products as $product) { ?> 
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Product Name</label>
                            <input name="Products[<?=$index?>][ProductName]" placeholder="Toaster..." type="text" class="form-control" required <?php if (!empty($product['ProductName'])) echo 'value="' . $product['ProductName'] . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Quantity</label>
                            <input name="Products[<?=$index?>][Quantity]" type="number" class="form-control" required <?php if (!empty($product['Quantity'])) echo 'value="' . $product['Quantity'] . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Price</label>
                            $<input name="Products[<?=$index?>][Price]" type="number" class="form-control" required readonly <?php if (!empty($product['Price'])) echo 'value="' . $product['Price'] . '"'; ?>>
                        </div>
                    </div>
                </div>
                    <?php 
                    $index++;    
                    }
                }
                else { ?>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Product Name</label>
                            <input name="Products[0][ProductName]" placeholder="Toaster..." type="text" class="form-control" required <?php if (!empty($product['ProductName'])) echo 'value="' . $product['ProductName'] . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Quantity</label>
                            <input name="Products[0][Quantity]" type="number" class="form-control" required <?php if (!empty($product['Quantity'])) echo 'value="' . $product['Quantity'] . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label>Price</label>
                            $<input name="Products[0][Price]" type="number" class="form-control" required readonly <?php if (!empty($product['Price'])) echo 'value="' . $product['Price'] . '"'; ?>>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="DOB">Date of Birth</label>
                            <input name="DOB" id="DOB" type="date" class="form-control" required <?php if (!empty($dob)) echo 'value="' . $dob . '"'; ?>>
                            <?php
                            if (!empty($errors['DOB'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['DOB']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="PhoneNumber">Phone Number</label>
                            <input name="PhoneNumber" id="PhoneNumber" placeholder="123-456-7890" type="text" class="form-control" minlength="12" maxlength="12" <?php if (!empty($phoneNumber)) echo 'value="' . $phoneNumber . '"'; ?>>
                            <?php
                            if (!empty($errors['PhoneNumber'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['PhoneNumber']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
