<?php

function requireLogin() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

function requireRole($roles) {
    requireLogin();

    if (!in_array($_SESSION['user']['userType'], $roles)) {
        die("Access denied.");
    }
}
?>