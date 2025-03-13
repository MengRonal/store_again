<?php
session_start();  //(vea mean ey te)
include "../config/connect.php";
include "../function/function.php";

if (isset($_POST["email"]) && isset($_POST['password'])) {
    $email = testInput($_POST["email"]);
    $password = testInput($_POST['password']);
    if (empty($email)) {
        header('location: ../index.php');
    } elseif (empty($password)) {
        header('location: ../index.php');
    } else {
        $password = md5($password);
        $sql = "SELECT *FROM users WHERE email = '$email' AND password = '$password' ";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['password'] === $password) {

                if ($row['role'] === 'admin') {

                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    header("location: ../admin/dashboard.php");
                } else {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    header('location: ../admin/dashboard.php');
                }
            } else {
                header('location: ../index.php');
            }
        } else {
            header('location: ../index.php');
        }
    }
} else {
    header('location: ../index.php');
}
