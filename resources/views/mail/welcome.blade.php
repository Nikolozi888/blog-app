<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Changed Notification</title>
    <style>
        /* Responsive styles for better mobile compatibility */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #007BFF;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            font-size: 16px;
            line-height: 1.5;
        }

        .content p {
            margin: 0 0 15px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #999;
            background-color: #f1f1f1;
        }

        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <h1>Welcome</h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Hello <strong>{{ $mailData['name'] }}</strong>,</p>
            <p>Thank you,<br>The Support Team</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Blog-app. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
