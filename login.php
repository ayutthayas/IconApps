<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0493ae;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            display: flex;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        .login-left {
            background-color: #EAF4FB;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .login-left img.logo {
            max-width: 100%;
            height: auto;
        }

        .login-left p {
            font-size: 18px;
            margin-top: 20px;
            color: #333333;
        }

        .login-right {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333333;
        }

        .login-right p {
            margin-bottom: 30px;
            color: #666666;
        }

        .login-right input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-right button {
            padding: 15px;
            border: none;
            background-color: #007BFF;
            color: #ffffff;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-right button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-left">
            <img src="img/logo.png" alt="IconSen Logo" class="logo">
            <p>Sistem Akses Mudah</p>
        </div>
        <div class="login-right">
            <h2>Welcome Admin!</h2>
            <p>Sign in to your account</p>
            <form action="proses_login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
