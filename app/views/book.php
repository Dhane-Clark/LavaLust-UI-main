<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f2ff;
            margin: 0;
            padding: 0;
            display: grid;
            place-items: center;
            height: 100vh;
        }

        .reservation-form {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            display: grid;
            gap: 15px;
        }

        .reservation-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }

        .reservation-form label {
            font-size: 14px;
            color: #555;
        }

        .reservation-form input, .reservation-form select, .reservation-form button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .reservation-form button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

        .reservation-form button:hover {
            background-color: #0056b3;
        }

        .back-button {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<div class="reservation-form">
    <h2>Make a Reservation</h2>
    <form method="POST" action="<?php echo site_url('reserve'); ?>">
        <!-- Attendee Details -->
        <label for="name">Attendee Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter attendee name">

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required placeholder="Enter age">

        <!-- Reservation Details -->
        <label for="place">Select Place:</label>
        <select id="place" name="place_id" required>
            <option value="" disabled selected>Select a place</option>
            <!-- Dynamic place options will go here from the database -->
            <option value="1">Place 1</option>
            <option value="2">Place 2</option>
            <option value="3">Place 3</option>
        </select>

        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="number_of_attendees" required placeholder="Enter number of attendees">

        <label for="reservation_datetime">Reservation Date & Time:</label>
        <input type="datetime-local" id="reservation_datetime" name="reservation_datetime" required>

        <label for="payment_status">Payment Status:</label>
        <select id="payment_status" name="payment_status" required>
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
        </select>

        <label for="payment_receipt_email">Payment Receipt Email:</label>
        <input type="email" id="payment_receipt_email" name="payment_receipt_email" required placeholder="Enter email for receipt">

        <button type="submit">Submit Reservation</button>
    </form>

    <!-- Back Button -->
    <button class="back-button" onclick="window.history.back()">Back</button>
</div>

</body>
</html>
