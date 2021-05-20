<?php
$errors = [];
if (isset($_POST['login'])) {
    $errors = $controller::login($_POST);
    if (empty($errors)) {
        $controller::redirect("admin.php");
    }
}

?>

<div id="login" class="p-4 d-flex align-items-center justify-content-center">
    <form method="POST">
        <div class="logo my-2 mx-auto">
            <img src="<?php echo $controller::getImage("logo.png") ?>" class="img-fluid" alt="Logo">
        </div>

        <div class="title text-center pb-2 mb-3">
            Please enter your user information
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupUsername"><img src="<?php echo $controller::getImage("user.svg"); ?>" width="20" alt="img" class="img-fluid" /></span>
                </div>
                <input type="text" name="username" class="form-control <?php echo isset($errors['username']) ? "is-invalid" : "" ?>" id="validationServerUsername" placeholder="Enter Username" aria-describedby="inputGroupUsername" required>
                <div class="invalid-feedback"><?php echo $errors['username'] ?? null; ?></div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPassword"><img src="<?php echo $controller::getImage("lock.svg"); ?>" width="20" alt="img" class="img-fluid" /></span>
                </div>
                <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? "is-invalid" : "" ?>" id="validationServerPassword" placeholder="Enter password" aria-describedby="inputGroupPassword" required>
                <div class="invalid-feedback"><?php echo $errors['password'] ?? null; ?></div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember_me" value="1" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember me
                </label>
            </div>
        </div>
        <input class="btn btn-purple btn-block" type="submit" name="login" value="Submit Form" />
    </form>
</div>