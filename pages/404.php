<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 – Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Redirect after 5 seconds -->
    <meta http-equiv="refresh" content="5;url=/">

    <style>
        :root {
            --e-global-color-29fdf7d: #8B0000; /* fallback color if not defined */
        }

        body {
            margin: 0;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(
                180deg,
                #E1251B 5.26%,
                var(--e-global-color-29fdf7d) 100%
            );
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-align: center;
        }

        .box {
            padding: 40px;
            max-width: 500px;
        }

        h1 {
            font-size: 80px;
            margin: 0;
            font-weight: bold;
        }

        h2 {
            margin: 10px 0;
            font-size: 28px;
        }

        p {
            font-size: 16px;
            opacity: 0.9;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #ffffff;
            color: #E1251B;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        a:hover {
            background: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>The page you’re trying to reach doesn’t exist.</p>
    <p>You’ll be redirected to the homepage in <strong>5 seconds</strong>.</p>
    <a href="/">Go to Home</a>
</div>

</body>
</html>
