<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
</head>
<body>
    <h1>Add a New Appointment</h1>
    <form method="POST" action="<?= site_url('user/addAppointment'); ?>">
        <label for="place_id">Select Place:</label>
        <select name="place_id" required>
            <?php foreach ($places as $place): ?>
                <option value="<?= $place['place_id']; ?>"><?= $place['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="reservation_datetime">Appointment Date and Time:</label>
        <input type="datetime-local" name="reservation_datetime" required>
        <br>
        <label for="number_of_att
