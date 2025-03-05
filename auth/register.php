
<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>

<div class="register-container">
        <h5 class="register-title">Register</h5>
        <h2>Register for a new user</h2>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">REGISTER</button>
        </form>
    </div>

<?php require "../includes/footer.php"; ?>


