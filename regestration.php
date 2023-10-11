<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'firstdb');
    if($conn->connect_error){
        die('Connection failed :'.$conn->connect_error);
    }
     
    $sql = "select * from users where email='$email'";
    $echeck = $conn->query($sql);
    $sql = "select * from users where phno='$phno'";
    $phcheck = $conn->query($sql);
    if($echeck->num_rows > 0){
        die('Account already exists on this email');
    }
    if($phcheck->num_rows > 0){
        die('Account already exists on this phone number');
    }
    $stmt = $conn->prepare("insert into users(fname, lname, email, password, phno) values(?,?,?,?,?)");
    $stmt->bind_param("ssssi", $fname, $lname, $email, $password, $phno);
    $stmt->execute();
    echo "Regestration successful";
    $stmt->close();
    $conn->close();
?>