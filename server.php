<?php

    $username = "";
    $email = "";
    $error = array();
//connect to the db
$db = mysqli_connect('localhost', 'root', '', 'integration-the-ashwini');

//if the register button is clicked
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($_POST['username']);
    $email = mysqli_real_escape_string($_POST['email']);
    $password = mysqli_real_escape_string($_POST['password']);
    $confirm_password = mysqli_real_escape_string($_POST['confirm_password']);

    //ensure the fields are filled properly
    if (empty($username)){
        array_push($errors, "Username is required");
    } 
    if (empty($email)){
        array_push($errors, "Email is required");
    } 
    if (empty($password)){
        array_push($errors, "Password is required");
    } 
    if (empty($password != $confirm_password)){
        array_push($errors, "The passwords do not match");
    } 

    //no error
    if (count($errors) == 0) {
        $password = md5($password);
        $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";

        mysqli_query($db, $sql);
    }

}

?>