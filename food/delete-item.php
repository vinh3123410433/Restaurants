<?php require (__DIR__ ."/../libs/App.php"); ?>
<?php require (__DIR__ ."/../config/config.php"); ?>
<?php require (__DIR__ ."/../includes/header.php"); ?>


<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM cart WHERE id = '$id'";
        $app = new App;
        $path = "cart.php";
        $app->delete($query, $path);
    }

?>