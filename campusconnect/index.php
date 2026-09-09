```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect 2026</title>

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
                    #020617 0%,
                    #0f172a 35%,
                    #1e3a8a 70%,
                    #2563eb 100%
                );

            color: white;

            display: flex;

            justify-content: center;

            align-items: center;

            overflow: hidden;
        }


        /* =========================
           BACKGROUND CIRCLES
        ========================= */

        body::before {

            content: "";

            position: absolute;

            width: 400px;

            height: 400px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.25);

            top: -150px;

            left: -100px;

            filter: blur(5px);
        }


        body::after {

            content: "";

            position: absolute;

            width: 350px;

            height: 350px;

            border-radius: 50%;

            background: rgba(59, 130, 246, 0.20);

            bottom: -150px;

            right: -100px;

            filter: blur(5px);
        }


        /* =========================
           MAIN CONTAINER
        ========================= */

        .main-container {

            position: relative;

            z-index: 2;

            width: 90%;

            max-width: 850px;

            text-align: center;

            padding: 60px 40px;

            background: rgba(255, 255, 255, 0.08);

            border: 1px solid rgba(255, 255, 255, 0.15);

            border-radius: 25px;

            backdrop-filter: blur(12px);

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35);
        }


        /* =========================
           LOGO
        ========================= */

        .logo {

            width: 85px;

            height: 85px;

            margin: 0 auto 20px;

            border-radius: 50%;

            background: white;

            color: #1e3a8a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 32px;

            font-weight: bold;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.25);
        }


        /* =========================
           TITLE
        ========================= */

        h1 {

            font-size: 52px;

            margin-bottom: 12px;

            letter-spacing: 1px;
        }


        .year {

            color: #93c5fd;
        }


        /* =========================
           DESCRIPTION
        ========================= */

        .description {

            max-width: 650px;

            margin: 0 auto 35px;

            font-size: 19px;

            line-height: 1.6;

            color: #dbeafe;
        }


        /* =========================
           FEATURES
        ========================= */

        .features {

            display: flex;

            justify-content: center;

            gap: 15px;

            flex-wrap: wrap;

            margin-bottom: 35px;
        }


        .feature {

            padding: 10px 18px;

            background: rgba(255, 255, 255, 0.10);

            border: 1px solid rgba(255, 255, 255, 0.15);

            border-radius: 50px;

            color: #e0f2fe;

            font-size: 14px;
        }


        /* =========================
           BUTTONS
        ========================= */

        .buttons {

            display: flex;

            justify-content: center;

            gap: 15px;

            flex-wrap: wrap;
        }


        .btn {

            display: inline-block;

            padding: 15px 30px;

            min-width: 190px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 16px;

            font-weight: bold;

            transition: all 0.3s ease;
        }


        /* REGISTER BUTTON */

        .register-btn {

            background: white;

            color: #1e3a8a;
        }


        .register-btn:hover {

            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(255, 255, 255, 0.25);
        }


        /* LOGIN BUTTON */

        .login-btn {

            background: #2563eb;

            color: white;

            border: 1px solid #60a5fa;
        }


        .login-btn:hover {

            background: #1d4ed8;

            transform: translateY(-3px);

            box-shadow:
                0 10px 25px rgba(37, 99, 235, 0.35);
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {

            margin-top: 35px;

            color: #bfdbfe;

            font-size: 13px;
        }


        /* =========================
           MOBILE RESPONSIVE
        ========================= */

        @media (max-width: 600px) {

            body {

                overflow: auto;

                padding: 20px 0;
            }


            .main-container {

                padding: 40px 20px;

            }


            .logo {

                width: 70px;

                height: 70px;

                font-size: 26px;
            }


            h1 {

                font-size: 36px;

            }


            .description {

                font-size: 16px;

            }


            .btn {

                width: 100%;

                max-width: 300px;
            }

        }

    </style>

</head>


<body>


    <div class="main-container">


        <!-- LOGO -->

        <div class="logo">
            CC
        </div>


        <!-- TITLE -->

        <h1>
            CampusConnect <span class="year">2026</span>
        </h1>


        <!-- DESCRIPTION -->

        <p class="description">

            Welcome to CampusConnect 2026 —
            your student platform for connecting,
            registering and participating in exciting
            campus events.

        </p>


        <!-- FEATURES -->

        <div class="features">

            <div class="feature">
                Student Registration
            </div>

            <div class="feature">
                Event Participation
            </div>

            <div class="feature">
                Secure Login
            </div>

        </div>


        <!-- BUTTONS -->

        <div class="buttons">

            <a
                href="register.php"
                class="btn register-btn"
            >
                Student Registration
            </a>


            <a
                href="login.php"
                class="btn login-btn"
            >
                Student Login
            </a>

        </div>


        <!-- FOOTER -->

        <div class="footer">

            © 2026 CampusConnect.
            All Rights Reserved.

        </div>


    </div>


</body>

</html>
```
