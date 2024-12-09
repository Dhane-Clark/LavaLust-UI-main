<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password_hash'];

    // Function to check if user exists and verify the password
    public function checkUserCredentials($email, $password)
    {
        // Query the users table
        $user = $this->where('email', $email)->get_one();

        if ($user) {
            // Check if password matches the hashed password
            if (password_verify($password, $user['password_hash'])) {
                return $user;  // Return user data if credentials are correct
            }
        }

        return false;  // Return false if user doesn't exist or credentials are incorrect
    }
}
