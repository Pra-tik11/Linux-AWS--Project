<?php
session_start();

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM students
            WHERE email = ? OR student_id = ?
            LIMIT 1";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $username, $username);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $student = $result->fetch_assoc();

        if (password_verify($password, $student["password"])) {

            $_SESSION["student_id"] = $student["student_id"];
            $_SESSION["full_name"] = $student["full_name"];

            header("Location: welcome.php");
            exit();

        } else {
            $message = "Invalid username or password.";
        }

    } else {
        $message = "Invalid username or password.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login | CampusConnect 2026</title>

<style>

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0f172a, #1e40af);
}

.login-box {
    width: 90%;
    max-width: 420px;
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

h1 {
    text-align: center;
    color: #1e3a8a;
    margin-bottom: 5px;
}

.subtitle {
    text-align: center;
    color: #666;
    margin-bottom: 30px;
}

label {
    display: block;
    font-weight: bold;
    margin-top: 15px;
    margin-bottom: 7px;
}

input {
    width: 100%;
    padding: 13px;
    border: 1px solid #ccc;
    border-radius: 7px;
    font-size: 15px;
}

button {
    width: 100%;
    padding: 13px;
    margin-top: 25px;
    background: #2563eb;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 7px;
    cursor: pointer;
}

button:hover {
    background: #1d4ed8;
}

.error {
    background: #fee2e2;
    color: #991b1b;
    padding: 12px;
    border-radius: 7px;
    text-align: center;
    margin-bottom: 15px;
}

.register {
    text-align: center;
    margin-top: 20px;
}

.register a {
    color: #2563eb;
    text-decoration: none;
    font-weight: bold;
}

</style>

</head>

<body>

<div class="login-box">

    <h1>STUDENT LOGIN</h1>

    <div class="subtitle">
        CampusConnect 2026
    </div>

    <?php if ($message != ""): ?>

        <div class="error">
            <?php echo htmlspecialchars($message); ?>
        </div>

    <?php endif; ?>

    <form method="POST">

        <label>Email / Student ID</label>

        <input
            type="text"
            name="username"
            placeholder="Enter Email or Student ID"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Enter Password"
            required
        >

        <button type="submit">
            LOGIN
        </button>

    </form>

    <div class="register">
        New student?
        <a href="register.php">Register Now</a>
    </div>

</div>

</body>

</html>
