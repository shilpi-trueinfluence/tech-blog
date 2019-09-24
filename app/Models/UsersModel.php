<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table = 'users';
    protected $allowedFields = ['id', 'first_name', 'last_name', 'email_id', 'phone', 'password', 'status'];

    public function getUsers($where = array()) {
        if (empty($where)) {
            return $this->asArray()
                            ->where([
                                'status' => 0,
                            ])->findAll();
        }

        return $this->asArray()
                        ->where($where)
                        ->first();
    }

    public function deleteUser($id) {
        return $this->update(array(
                    'status' => 1
                        ), "id = " . $id);
    }
    
    public function get_user($data) {
        $query = $this->db->table($this->table)->getWhere($data);
//        echo '<pre>';
//        print_r($this->db->getLastQuery());
//        echo '</pre>';
        return $query->getResult();
    }
}
