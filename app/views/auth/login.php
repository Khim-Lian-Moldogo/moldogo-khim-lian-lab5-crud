<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewora Coffee Shop - Login</title>

    <!-- ================================
         LOGIN PAGE CSS
    ================================= -->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* LOGIN BACKGROUND */
        .login-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #2b1b14, #5c3b2e, #8b5e3c);
        }

        /* LOGIN CARD */
        .login-card {
            width: 420px;
            max-width: 100%;
            padding: 40px;
            background: #fffaf5;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        /* BREWORA LOGO */
        .logo {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #6f4e37;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .login-card h1 {
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
            margin-bottom: 20px;
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
        .login-button {
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

        .login-button:hover {
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

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- ================================
         LOGIN PAGE
    ================================= -->

    <div class="login-page">

        <div class="login-card">

            <!-- BREWORA LOGO -->
            <div class="logo">
                B
            </div>

            <h1>Brewora Coffee Shop</h1>

            <p class="subtitle">
                Welcome back! Please login to continue.
            </p>

            <!-- LOGIN FORM -->
            <form method="POST" action="/login/authenticate">

                <div class="form-group">
                    <label for="username">Username</label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Enter your username"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Login
                </button>

            </form>

            <!-- REGISTER LINK -->
            <div class="footer">
                Don't have an account?
                <a href="/register">Create User</a>
            </div>

        </div>

    </div>

</body>
</html>
