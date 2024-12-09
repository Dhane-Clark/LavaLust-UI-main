<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password_hash'];

    // Function to check if the admin exists and verify the password
    public function checkAdminCredentials($email, $password)
    {
        // Query the admins table
        $admin = $this->where('email', $email)->get_one();

        if ($admin) {
            // Check if password matches the hashed password in the database
            if (password_verify($password, $admin['password_hash'])) {
                return $admin;  // Return admin data if credentials are correct
            }
        }

        return false;  // Return false if admin doesn't exist or credentials are incorrect
    }
}
