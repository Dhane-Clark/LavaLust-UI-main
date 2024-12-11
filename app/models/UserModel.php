<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {

    public function get_all_users() {
        return $this->db->table('Users')->select('*')->get_all();
    }

    public function get_user_by_id($id) {
        return $this->db->table('Users')->where('id', $id)->get();
    }

    public function add_user($data) {
        $bind = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->table('Users')->insert($bind);
    }

    public function update_user($id, $data) {
        $bind = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ];
        return $this->db->table('Users')->where('id', $id)->update($bind);
    }

    public function delete_user($id) {
        return $this->db->table('Users')->where('id', $id)->delete();
    }
}
