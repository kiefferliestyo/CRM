<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div>
                Add/Edit Customer
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
            <form method="post" action="index.php?page=add-edit-customer">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="FirstName">First Name</label>
                            <input name="FirstName" id="FirstName" placeholder="John..." type="text" class="form-control" required <?php if (!empty($firstName)) echo 'value="' . $firstName . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="LastName">Last Name</label>
                            <input name="LastName" id="LastName" placeholder="Doe..." type="text" class="form-control" required <?php if (!empty($lastName)) echo 'value="' . $lastName . '"'; ?>>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="Email">Email Address</label>
                    <input name="Email" id="Email" placeholder="john.doe@gmail.com..." type="email" class="form-control" required <?php if (!empty($email)) echo 'value="' . $email . '"'; ?>>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="DOB">Date of Birth</label>
                            <input name="DOB" id="DOB" type="date" class="form-control" required <?php if (!empty($dob)) echo 'value="' . $dob . '"'; ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="PhoneNumber">Phone Number</label>
                            <input name="PhoneNumber" id="PhoneNumber" placeholder="123-456-7890" type="text" class="form-control" maxlength="12" <?php if (!empty($phoneNumber)) echo 'value="' . $phoneNumber . '"'; ?>>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
