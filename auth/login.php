
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>



<div class="container-fluid py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>

<div class="register-container mt-5">
    <h5 class="register-title pb-4">Login</h5>
    <form method="POST" action="login.php">
        <div class="mb-3">
            <input name="username" type="text" class="form-control" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password" required>
        </div>
        <button name="submit" type="submit" class="btn btn-custom w-100 mt-4">Login</button>
    </form>
</div>


<?php require "../includes/footer.php"; ?>