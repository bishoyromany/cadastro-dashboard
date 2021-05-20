<div class="admin-boxes-contaner h-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center boxes-wrapper">
        <div class="admin-box p-3 bg-white mx-1 mb-2">
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

        <div class="admin-box p-3 bg-white mb-2 mx-1">
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
                            <img src="<?php echo $controller::getImage("users-solid.svg") ?>" class="img-fluid" alt="Visitors">
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>