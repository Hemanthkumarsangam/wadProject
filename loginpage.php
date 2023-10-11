<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn =new mysqli('localhost', 'root', '', 'firstdb');
    if($conn->connect_error){
        die('Connection failed :'.conn->connect_error);
    }

    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);
    echo 'number of rows : '.$result->num_rows;
    
    if($result->num_rows > 0){
        header("location: home.html", true, 301);
        die();        
    }else{
        echo 'No existing account on this email do you want to create one !!';
        header("location: regester.html", true, 301);
        exit();
    }
?>