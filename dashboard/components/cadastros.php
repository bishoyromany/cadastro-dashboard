<div class="contador">
    <div class="admin-boxes-contaner d-flex align-items-center justify-content-center">
        <div class="admin-box p-3 bg-white">
            <a href="cadastros.php">
                <div class="row">
                    <div class="col-8">
                        <div class="info">
                            <div class="title lead">
                                Total Products
                            </div>
                            <div class="value lead mt-2">
                                <?php echo $controller::registrationsCount(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon">
                            <img src="<?php echo $controller::getImage("user-admin.svg") ?>" class="img-fluid" alt="Visitors">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex align-items-center">
            <span class="lead">Product List</span>
        </div>
        <div class="card-body">
            <table id="RecordsTable" class="display responsive nowrap" style="width:100%" data-section="registrations">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Create</th>
                        <th>Full Name</th>
                        <th>CPF</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Purchase Type and Category</th>
                        <th>Request number</th>
                        <th>Month and year of purchase</th>
                        <th>Lucky Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>