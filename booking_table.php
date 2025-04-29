<?php require (__DIR__ ."/libs/App.php"); ?>
<?php require (__DIR__ ."/includes/header.php"); ?>
<?php require (__DIR__ ."/config/config.php"); ?>
<?php

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $phone_number = $_POST["phonge_number"];
    $date_booking = $_POST["date_booking"];
    $num_people = $_POST["num_people"];
    $special_request = $_SESSION["special_request"];
    $status = $_POST["status"];
    $user_id = $_POST["user_id"];

    if($date_booking > date("y/m/d")){


    $query = "INSERT INTO cart (name, phone_number, date_booking, special_request, num_people, status, user_id) VALUES (:name, :phone_number, :date_booking, :num_people, :special_request, :status, :user_id)";
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
    }
}  


?>
<?php require (__DIR__ ."/includes/footer.php"); ?>
