```php
<?php
// Database connection
$host = "localhost";
$dbname = "campusconnect";
$username = "campususer";
$password = "Campus@123";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim($_POST["full_name"]);
    $student_id = trim($_POST["student_id"]);
    $email = trim($_POST["email"]);
    $college_name = trim($_POST["college_name"]);
    $location = trim($_POST["location"]);
    $event = trim($_POST["event"]);
    $password = $_POST["password"];

    // Check all fields
    if (
        empty($full_name) ||
        empty($student_id) ||
        empty($email) ||
        empty($college_name) ||
        empty($location) ||
        empty($event) ||
        empty($password)
    ) {
        $message = "Please fill all required fields.";
        $message_type = "error";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
        $message_type = "error";
    } 
    else {

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert student
        $sql = "INSERT INTO students
                (full_name, student_id, email, college_name, location, event, password)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sssssss",
            $full_name,
            $student_id,
            $email,
            $college_name,
            $location,
            $event,
            $hashed_password
        );

        if ($stmt->execute()) {

            $message = "Registration successful! You can now login.";
            $message_type = "success";

        } else {

            if ($conn->errno == 1062) {
                $message = "Student ID or Email already exists.";
            } else {
                $message = "Registration failed. Please try again.";
            }

            $message_type = "error";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration | CampusConnect 2026</title>

<style>

/* =========================
   RESET
========================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* =========================
   BODY
========================= */

body {
    font-family: Arial, Helvetica, sans-serif;

    min-height: 100vh;

    background:
        linear-gradient(
            135deg,
            #0f172a 0%,
            #1e3a8a 50%,
            #2563eb 100%
        );

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 40px 20px;
}


/* =========================
   MAIN CONTAINER
========================= */

.registration-container {

    width: 100%;

    max-width: 700px;

    background: #ffffff;

    border-radius: 20px;

    overflow: hidden;

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.35);
}


/* =========================
   HEADER
========================= */

.header {

    background:
        linear-gradient(
            135deg,
            #1e3a8a,
            #2563eb
        );

    color: white;

    text-align: center;

    padding: 35px 25px;
}

.header h1 {

    font-size: 34px;

    margin-bottom: 8px;

    letter-spacing: 0.5px;
}

.header p {

    font-size: 16px;

    opacity: 0.9;
}


/* =========================
   FORM AREA
========================= */

.form-container {

    padding: 35px;
}


/* =========================
   MESSAGE
========================= */

.message {

    padding: 14px;

    border-radius: 8px;

    margin-bottom: 20px;

    font-size: 15px;

    text-align: center;

    font-weight: 600;
}

.success {

    background: #dcfce7;

    color: #166534;

    border: 1px solid #86efac;
}

.error {

    background: #fee2e2;

    color: #991b1b;

    border: 1px solid #fca5a5;
}


/* =========================
   FORM GROUP
========================= */

.form-group {

    margin-bottom: 20px;
}


/* =========================
   LABEL
========================= */

label {

    display: block;

    margin-bottom: 8px;

    font-size: 15px;

    font-weight: 600;

    color: #1f2937;
}

.required {

    color: #dc2626;
}


/* =========================
   INPUT
========================= */

input,
select {

    width: 100%;

    padding: 13px 15px;

    border: 1px solid #d1d5db;

    border-radius: 9px;

    font-size: 15px;

    outline: none;

    transition: 0.3s;

    background: #f9fafb;
}


/* =========================
   INPUT FOCUS
========================= */

input:focus,
select:focus {

    border-color: #2563eb;

    background: #ffffff;

    box-shadow:
        0 0 0 3px rgba(37, 99, 235, 0.12);
}


/* =========================
   TWO COLUMN LAYOUT
========================= */

.form-row {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 20px;
}


/* =========================
   BUTTON
========================= */

.register-button {

    width: 100%;

    padding: 15px;

    margin-top: 10px;

    border: none;

    border-radius: 9px;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

    color: white;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
}

.register-button:hover {

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(37, 99, 235, 0.3);
}

.register-button:active {

    transform: translateY(0);
}


/* =========================
   LOGIN LINK
========================= */

.login-link {

    text-align: center;

    margin-top: 25px;

    padding-top: 20px;

    border-top: 1px solid #e5e7eb;

    color: #6b7280;

    font-size: 15px;
}

.login-link a {

    color: #2563eb;

    text-decoration: none;

    font-weight: bold;

    margin-left: 5px;
}

.login-link a:hover {

    text-decoration: underline;
}


/* =========================
   FOOTER
========================= */

.footer {

    text-align: center;

    margin-top: 20px;

    color: #9ca3af;

    font-size: 13px;
}


/* =========================
   MOBILE RESPONSIVE
========================= */

@media (max-width: 600px) {

    body {

        padding: 20px 10px;

    }

    .header {

        padding: 28px 20px;

    }

    .header h1 {

        font-size: 27px;

    }

    .form-container {

        padding: 25px 20px;

    }

    .form-row {

        grid-template-columns: 1fr;

        gap: 0;

    }
}

</style>

</head>


<body>


<div class="registration-container">


    <!-- HEADER -->

    <div class="header">

        <h1>CampusConnect 2026</h1>

        <p>Student Registration Portal</p>

    </div>


    <!-- FORM -->

    <div class="form-container">


        <!-- MESSAGE -->

        <?php if ($message != ""): ?>

            <div class="message <?php echo $message_type; ?>">

                <?php echo htmlspecialchars($message); ?>

            </div>

        <?php endif; ?>


        <form method="POST" action="">


            <!-- FULL NAME -->

            <div class="form-group">

                <label>
                    Full Name
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="full_name"
                    placeholder="Enter your full name"
                    required
                >

            </div>


            <!-- STUDENT ID + EMAIL -->

            <div class="form-row">

                <div class="form-group">

                    <label>
                        Student ID
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="student_id"
                        placeholder="Enter Student ID"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Email
                        <span class="required">*</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="student@example.com"
                        required
                    >

                </div>

            </div>


            <!-- COLLEGE -->

            <div class="form-group">

                <label>
                    College Name
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="college_name"
                    placeholder="Enter your college name"
                    required
                >

            </div>


            <!-- LOCATION + EVENT -->

            <div class="form-row">

                <div class="form-group">

                    <label>
                        Location
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="location"
                        placeholder="Enter location"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Event
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="event"
                        placeholder="Enter event name"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label>
                    Password
                    <span class="required">*</span>
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Create a password"
                    minlength="6"
                    required
                >

            </div>


            <!-- REGISTER BUTTON -->

            <button
                type="submit"
                class="register-button"
            >
                REGISTER NOW
            </button>


        </form>


        <!-- LOGIN -->

        <div class="login-link">

            Already registered?

            <a href="login.php">
                Student Login
            </a>

        </div>


        <div class="footer">

            © 2026 CampusConnect | Student Portal

        </div>


    </div>

</div>


</body>

</html>
```
