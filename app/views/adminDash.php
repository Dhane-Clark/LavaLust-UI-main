<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 1200px;
            margin: auto;
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f7f7f7;
        }
        .quick-actions ul, .statistics ul {
            list-style-type: none;
            padding: 0;
        }
        .quick-actions li, .statistics li {
            margin: 10px 0;
        }
        .quick-actions a, .statistics a {
            text-decoration: none;
            color: #0066cc;
        }
        .section {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Appointment Dashboard</h1>
        <p>Manage and view all upcoming appointments.</p>
        <li class="nav-item">
            <a class="nav-link" href="<?=site_url('auth/logout');?>">Logout</a>
        </li>

        <!-- Upcoming Appointments Table -->
        <div class="section">
            <h2>Upcoming Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Place</th>
                        <th>Attendees</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= date('Y-m-d', strtotime($appointment['reservation_datetime'])) ?></td>
                        <td><?= date('h:i A', strtotime($appointment['reservation_datetime'])) ?></td>
                        <td><?= $appointment['name'] ?></td>
                        <td><?= $appointment['number_of_attendees'] ?></td>
                        <td><?= $appointment['payment_status'] ?></td>
                        <td>
                            <a href="<?= site_url('user/editAppointment/' . $appointment['reservation_id']); ?>">Edit</a> | 
                            <a href="<?= site_url('user/deleteAppointment/' . $appointment['reservation_id']); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Quick Actions -->
        <div class="section quick-actions">
            <h2>Quick Actions</h2>
            <ul>
                <li><a href="<?= site_url('user/addAppointment'); ?>">Add New Appointment</a></li>
                <li><a href="<?= site_url('user/allAppointments'); ?>">View All Appointments</a></li>
                <li><a href="<?= site_url('user/manageClients'); ?>">Manage Clients</a></li>
            </ul>
        </div>

        <!-- Appointment Statistics -->
        <div class="section statistics">
            <h2>Statistics</h2>
            <ul>
                <li>Total Appointments Today: <?= count($appointments_today) ?></li>
                <li>Total Confirmed Appointments: <?= count($appointments_confirmed) ?></li>
                <li>Total Pending Appointments: <?= count($appointments_pending) ?></li>
            </ul>
        </div>
    </div>
</body>
</html>
