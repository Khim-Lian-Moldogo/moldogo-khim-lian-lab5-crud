<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewora Coffee Shop - Create User</title>

    <!-- ================================
         REGISTER PAGE CSS
    ================================= -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* REGISTER BACKGROUND */
        .register-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #2b1b14, #5c3b2e, #8b5e3c);
        }

        /* REGISTER CARD */
        .register-card {
            width: 430px;
            max-width: 100%;
            padding: 40px;
            background: #fffaf5;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        /* LOGO */
        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #6f4e37;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .register-card h1 {
            margin: 0;
            text-align: center;
            color: #3e2723;
        }

        .subtitle {
            margin: 10px 0 30px;
            text-align: center;
            color: #795548;
        }

        /* FORM */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4e342e;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d7ccc8;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #8d6e63;
            box-shadow: 0 0 0 3px rgba(141, 110, 99, 0.15);
        }

        /* BUTTON */
        .register-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #6f4e37;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background: #5d4037;
        }

        /* FOOTER */
        .footer {
            margin-top: 25px;
            text-align: center;
            color: #795548;
        }

        .footer a {
            color: #6f4e37;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- ================================
         REGISTER PAGE
    ================================= -->

    <div class="register-page">

        <div class="register-card">

            <!-- BREWORA LOGO -->
            <div class="logo">
                B
            </div>

            <h1>Create User</h1>

            <p class="subtitle">
                Create an account for Brewora Coffee Shop.
            </p>

            <!-- REGISTER FORM -->
            <form method="POST" action="/register/store">

                <div class="form-group">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Enter username"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="confirm_password">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="confirm_password"
                        name="confirm_password"
                        placeholder="Confirm password"
                        required
                    >
                </div>

                <button type="submit" class="register-button">
                    Create User
                </button>

            </form>

            <!-- LOGIN LINK -->
            <div class="footer">
                Already have an account?
                <a href="/login">Back to Login</a>
            </div>

        </div>

    </div>

</body>
</html>