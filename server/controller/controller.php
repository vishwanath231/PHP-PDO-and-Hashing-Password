<?php

session_start();
include "../database/config.php";



if (isset($_POST['register'])) {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password != $cpassword) {

        echo "Password doesn't match! pleace check it";
    } else {

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO info (name, email, password) VALUES (:name, :email, :password)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hash]);

        $_SESSION['msg'] = "Registration Successfull";
        header("location:../../register.php");
    }
}


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM info WHERE (email= :email)";
    $value = [':email' => $email];

    try {
        $res = $pdo->prepare($sql);
        $res->execute($value);
    } catch (PDOException $e) {
        echo 'Query error.';
        die();
    }

    $row = $res->fetch(PDO::FETCH_ASSOC);

    if (is_array($row)) {
        if (password_verify($password, $row['password'])) {
           $_SESSION['loginMsg'] = "You have been Logged In";
           header("location:../../index.php");
        }else {
            $_SESSION['loginMsg'] = "Please check the inputs";
            header("location:../../index.php");
        }
    }

}