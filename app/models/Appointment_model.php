<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Appointment_model extends Model {

    // Get all appointments
    public function get_all_appointments() {
        return $this->db->table('Appointments')->select('*')->get_all();
    }

    // Get appointment by ID
    public function get_appointment_by_id($id) {
        return $this->db->table('Appointments')->where('id', $id)->get();
    }

    // Add a new appointment
        public function add_appointment($data) {
            // Prepare the data for insertion into the database
            $bind = [
                'user_id' => $data['user_id'],
                'service_type' => $data['service_type'],
                'appointment_date' => $data['appointment_date'],
                'appointment_time' => $data['appointment_time'],
                'duration' => $data['duration'],
                'status' => $data['status'],
                'created_at' => date('Y-m-d H:i:s')
            ];
                    
            try {
                // Insert the new appointment into the database
                return $this->db->table('Appointments')->insert($bind);
            } catch (PDOException $e) {
                // Catch the exception thrown due to foreign key violation
                if ($e->getCode() === '23000') {
                    throw new Exception("Foreign key constraint violation: The user_id does not exist in the Users table.");
                }
                throw $e; // Rethrow the exception if it's another error
            }
        }
    
    

    // Update an appointment's details
    public function update_appointment($id, $data) {
        $bind = [
            'user_id' => $data['user_id'],
            'service_type' => $data['service_type'],
            'appointment_date' => $data['appointment_date'],
            'appointment_time' => $data['appointment_time'],
            'duration' => $data['duration'],
            'status' => $data['status']
        ];
        return $this->db->table('Appointments')->where('id', $id)->update($bind);
    }

    // Delete an appointment
    public function delete_appointment($id) {
        return $this->db->table('Appointments')->where('id', $id)->delete();
    }
}
