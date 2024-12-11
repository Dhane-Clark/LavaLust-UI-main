<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ServiceModel extends Model {

    public function get_all_services() {
        return $this->db->table('Services')->select('*')->get_all();
    }

    public function get_service_by_id($id) {
        return $this->db->table('Services')->where('id', $id)->get();
    }

    public function add_service($data) {
        $bind = [
            'name' => $data['name'],
            'description' => $data['description'],
            'default_duration' => $data['default_duration'],
            'price' => $data['price']
        ];
        return $this->db->table('Services')->insert($bind);
    }

    public function update_service($id, $data) {
        $bind = [
            'name' => $data['name'],
            'description' => $data['description'],
            'default_duration' => $data['default_duration'],
            'price' => $data['price']
        ];
        return $this->db->table('Services')->where('id', $id)->update($bind);
    }

    public function delete_service($id) {
        return $this->db->table('Services')->where('id', $id)->delete();
    }
}
