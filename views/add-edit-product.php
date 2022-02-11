<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>
                Add/Edit Product
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
            <form method="post" action="index.php?page=add-edit-product" <?php if (!empty($errors)) echo 'class="was-validated"'; ?>>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="ProductName">Name</label>
                            <input name="ProductName" id="ProductName" placeholder="Toaster..." type="text" class="form-control" required <?php if (!empty($productName)) echo 'value="' . $productName . '"'; ?>>
                            <?php
                            if (!empty($errors['ProductName'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['ProductName']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="Price">Price</label>
                            <input name="Price" id="Price" placeholder="100.00..." type="number" class="form-control" step="0.01" required <?php if (!empty($price)) echo 'value="' . $price . '"'; ?>>
                            <?php
                            if (!empty($errors['Price'])) {
                            ?>
                            <div class="invalid-feedback"><?=$errors['Price']?></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="Description">Description</label>
                    <textarea name="Description" id="Description" class="form-control" placeholder="Lorem ipsum dolor sit amet..."><?php if (!empty($description)) echo $description; ?></textarea>
                    <?php
                    if (!empty($errors['Description'])) {
                    ?>
                    <div class="invalid-feedback"><?=$errors['Description']?></div>
                    <?php
                    }
                    ?>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>