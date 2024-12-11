<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminModel extends Model {

    // Function to check admin credentials during login
    public function checkAdminCredentials($email) {
        // Query to get the admin by email
        return $this->db->table('Admins')
                          ->where('email', $email)
                          ->get(); // Returns the admin data if exists, null otherwise
    }

    // Function to register a new admin
    public function registerAdmin($email, $password_hash) {
        // Prepare the data to insert into the database
        $data = [
            'email' => $email,
            'password_hash' => $password_hash
        ];

        // Insert the new admin into the Admins table
        return $this->db->table('Admins')->insert($data);
    }
    // Model method to fetch all appointments
public function get_all_appointments() {
    return $this->db->table('Appointments')
                    ->join('Users', 'Users.id = Appointments.user_id')  // Join with Users table to get user data
                    ->join('Services', 'Services.id = Appointments.service_type')  // Join with Services table to get service type
                    ->select('Appointments.id, Users.name, Users.email, Users.phone, Services.name as service_type, appointment_date, appointment_time, duration, status')
                    ->get();  // Execute the query and return the result
}

}
?>
