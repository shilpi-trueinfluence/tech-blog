<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model {

    protected $table = 'categories';
    protected $allowedFields = ['id', 'name', 'slug', 'status'];

    public function getCategories($where = array()) {
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
        return $query->getResult();
    }
}
