<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Res extends Model{
    public function __construct() {
        parent::__construct();
    }

    public function insert_reservation($data) {
        // Insert reservation data into the database
        $this->db->insert('reservations', $data);
        
        // Return the reservation ID if the insertion is successful
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
}