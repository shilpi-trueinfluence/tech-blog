<?php
namespace App\Models;
use CodeIgniter\Model;

class BlogsModel extends Model {

    protected $table = 'blogs';
    protected $allowedFields = ['id', 'title', 'description', 'category_id', 'image', 'document','tags', 'status'];

    public function getBlogs($where = array(),$args = array()) {
        if (empty($where)) {
            return $this->asArray()
                    ->select('blogs.id,blogs.title,blog_cate.category_id,blogs.description,group_concat(c.name separator ", ") as categories')
                    ->join(
                        'blog_categories blog_cate','blog_cate.blog_id = blogs.id'
                    )
                    ->join(
                        'categories c','c.id = blog_cate.category_id'
                    )
                    ->where([
                        'blogs.status' => 0,
                    ])
                    ->groupBy('blogs.id')->findAll();
        }
        if($args['multiple']) {
            return $this->asArray()
                        ->select('blogs.id,blogs.title,blogs.image,blogs.document,blogs.description,blog_cate.category_id,group_concat(c.name separator ", ") as categories')
                        ->join(
                            'blog_categories blog_cate','blog_cate.blog_id = blogs.id'
                        )
                        ->join(
                            'categories c','c.id = blog_cate.category_id'
                        )
                        ->where($where)
                        ->findAll();
        } else {
            return $this->asArray()
                        ->select('blogs.id,blogs.title,blogs.image,blogs.document,blogs.description,blog_cate.category_id,group_concat(c.name separator ", ") as categories')
                        ->join(
                            'blog_categories blog_cate','blog_cate.blog_id = blogs.id'
                        )
                        ->join(
                            'categories c','c.id = blog_cate.category_id'
                        )
                        ->where($where)
                        ->first();
        }
    }
    
    public function getBlogCategories($where = array()) {
        $query = $this->db->table('blog_categories blog_cate')
                    ->select('blog_cate.category_id,blog_cate.blog_id,c.name')
                    ->join('categories c','c.id = blog_cate.category_id')
                    ->getWhere($where);
        
        return $query->getResult('array');
    }

    public function deleteBlog($id) {
        return $this->update(array(
                    'status' => 1
                        ), "id = " . $id);
    }
    
    public function get_blog($data) {
        $query = $this->db->table($this->table)->getWhere($data);
        return $query->getResult();
    }
    
    public function delete_blog_categories($where) {
        $this->db->table('blog_categories')->delete($where);
    }
    
    public function insert_blog_categories($data) {
        $this->db->table('blog_categories')->insertBatch($data);
    }
}
