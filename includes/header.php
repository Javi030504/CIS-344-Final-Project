<!DOCTYPE html>
<html>
<head>
    <title>Rapture Realty Portal</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>

    <?php if (isset($_SESSION['user'])): ?>
        <a href="dashboard.php">Dashboard</a>
        <a href="properties.php">Properties</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</nav>

<hr>