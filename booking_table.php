<?php require (__DIR__ ."/libs/App.php"); ?>
<?php require (__DIR__ ."/includes/header.php"); ?>
<?php require (__DIR__ ."/config/config.php"); ?>
<?php

if(!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href='".APPURL."'</script>";
    exit;
}

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone_number = $_POST["phone_number"];
    $date_booking = $_POST["date_booking"];
    $num_people = $_POST["num_people"];
    $special_request = $_POST["special_request"];
    $status = "Pending";
    $user_id = $_SESSION["user_id"];

    if($date_booking > date("m/d/Y h:i:sa")){


    $query = "INSERT INTO bookings (name, phone_number, date_booking, num_people, special_request, status, user_id) VALUES (:name, :phone_number, :date_booking, :num_people, :special_request, :status, :user_id)";
    $arr = [
        ":name" => $name,
        ":phone_number"=> $phone_number,
        ":date_booking"=> $date_booking,
        "num_people"=> $num_people,
        "special_request"=> $special_request,
        "status"=> $status,
        "user_id"=> $user_id,
    ];

    $path = "index.php";


    $app->insert( query: $query, arr: $arr, path: $path); 
    }else{
        echo "<script>alert('Ngày đặt không hợp lệ')</script>";
        echo "<script>window.location.href='index.php'</script>";
        
    }
}  


?>
<?php require (__DIR__ ."/includes/footer.php"); ?>
