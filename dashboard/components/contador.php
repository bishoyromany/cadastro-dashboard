<div class="contador">
    <div class="admin-boxes-contaner d-flex align-items-center justify-content-center">
        <div class="admin-box p-3 bg-white">
            <a href="contador.php">
                <div class="row">
                    <div class="col-8">
                        <div class="info">
                            <div class="title lead">
                                Total Visitors
                            </div>
                            <div class="value lead mt-2">
                                <?php echo $controller::visitorsCount(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon">
                            <img src="<?php echo $controller::getImage("eye.svg") ?>" class="img-fluid" alt="Visitors">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <span class="lead">Visitor List</span>
            <form action="contador.php" method="POST">
                <input type="hidden" value="DELETE_ALL_VISITS" name="action">
                <button class="btn-reset"><img class="img-fluid" src="<?php echo $controller::getImage("trash-bin.svg") ?>" alt="Delete"></button>
            </form>
        </div>
        <div class="card-body">
            <table id="RecordsTable" class="display responsive nowrap" style="width:100%" data-section="visitors">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>DATE/TIME</th>
                        <th>IP Address</th>
                        <th>User Agent</th>
                        <th>ASN Code</th>
                        <th>Country</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>