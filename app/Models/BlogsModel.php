<?php
namespace App\Models;
use CodeIgniter\Model;

class BlogsModel extends Model {

    protected $table = 'blogs';
    protected $allowedFields = ['id', 'title', 'description', 'category_id', 'image', 'document','tags', 'status'];

    public function getBlogs($where = array()) {
        if (empty($where)) {
            return $this->asArray()
                            ->select('blogs.id,blogs.title,blogs.category_id,c.name as categories')
                            ->join(
                                'categories c','c.id = blogs.category_id'
                            )
                            ->where([
                                'blogs.status' => 0,
                            ])->findAll();
        }

        return $this->asArray()
                        ->where($where)
                        ->first();
    }

    public function deleteBlog($id) {
        return $this->update(array(
                    'status' => 1
                        ), "id = " . $id);
    }
    
    public function get_blog($data) {
        $query = $this->db->table($this->table)->getWhere($data);
//        echo '<pre>';
//        print_r($this->db->getLastQuery());
//        echo '</pre>';
        return $query->getResult();
    }
}
