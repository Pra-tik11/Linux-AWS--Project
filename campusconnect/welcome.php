<?php

session_start();

if (!isset($_SESSION["student_id"])) {
    header("Location: login.php");
    exit();
}

$student_name = $_SESSION["full_name"];

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Welcome | CampusConnect 2026</title>

<style>

body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e40af);
}

.card {
    background: white;
    padding: 50px;
    width: 90%;
    max-width: 600px;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

h1 {
    color: #1e3a8a;
}

p {
    color: #555;
    font-size: 18px;
}

.logout {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background: #dc2626;
    color: white;
    text-decoration: none;
    border-radius: 7px;
}

</style>

</head>

<body>

<div class="card">

    <h1>Welcome to CampusConnect!</h1>

    <p>
        Hello, <?php echo htmlspecialchars($student_name); ?>!
    </p>

    <p>
        You have successfully logged in.
    </p>

    <a class="logout" href="logout.php">
        Logout
    </a>

</div>

</body>

</html>
