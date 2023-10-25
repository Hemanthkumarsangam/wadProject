<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'dbconfig.php';
    $sql = "select * from users where email = '$email'";
    $result = $db->query($sql);
    echo 'number of rows : '.$result->num_rows;
    
    if($result->num_rows > 0){
        header("location: veiw.php", true, 301);
        die();        
    }else{
        echo 'No existing account on this email do you want to create one !!';
        header("location: regester.html", true, 301);
        exit();
    }
?>