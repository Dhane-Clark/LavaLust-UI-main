<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .user-details {
            margin: 20px 0;
        }
        .user-details p {
            font-size: 16px;
            color: #555;
        }
        .user-details p strong {
            color: #333;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 14px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            text-align: center;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Details</h1>
        <div class="user-details">
            <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
        </div>
        <a href="<?php echo site_url('users'); ?>" class="back-button">Back to Users List</a>
    </div>
</body>
</html>
