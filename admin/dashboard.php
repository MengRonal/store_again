<?php
// logout
session_start();
include "./php/connect.php";
if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
    // endlogou

    include "./include/header.php";
    include "./include/navbar.php";
    include "./include/sidebar.php";
    include "./include/footer.php";
} else {
    header('location: index.php');
}
