<?php

namespace App\Controllers;

use App\Models\BlogsModel;
use App\Models\CategoriesModel;
use CodeIgniter\Controller;

class Blogs extends BaseController {

    public function __construct() {
        $this->model = new BlogsModel();
        $this->session = \Config\Services::session();
        $this->session->start();
        if (!$this->session->has('logged_in')) {
            $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">You don\'t have access to this page! Please Log-In and try again</div>');
            return redirect()->to(base_url() . "login");
        }
        helper('url');
    }

    public function index() {
        $data['css'] = array(
            'DataTables/datatables.min.css'
        );
        $data['js'] = array(
            'DataTables/datatables.min.js',
            'js/custom_js/blogs.js'
        );
        $data['menu']['current_page'] = 'blogs';
        echo view('templates/header', $data);
        echo view('blogs/index', $data);
        echo view('templates/footer');
    }
    
    public function get_data() {

        $table_data = $this->model->getBlogs();
        $data = array();
        $i = 1;
        foreach ($table_data as $item) {
            $data[] = array(
                'num' => $i++,
                'title' => $item['title'],
                'category' => $item['categories'],
                'actions' => '<div class="col-xs-12 text-center">'
                . "<a href='".base_url('blogs/edit/'.$item['id'])."' class=''><i class='fa fa-pencil-square-o action-btns action-edit-btns'></i></a> "
                . "<a href='".base_url('blogs/view/'.$item['id'])."' class=''><i class='fa fa-eye action-btns action-view-btns'></i></a> "
                . "<i class='fa fa-trash-o action-btns action-delete-btns' id='delete-{$item['id']}' data-id='{$item['id']}'></i>"
                . '</div>',
            );
        }
        return json_encode(array('data' => $data));
    }

    public function create() {
        $this->categories = new CategoriesModel();
        $data = array(
            'css' => array(
                base_url('plugins/jQueryFiler/css/themes/jquery.filer-dragdropbox-theme.css'),
                base_url('plugins/jQueryFiler/css/jquery.filer.css'),
            ),
            'js' => array(
                base_url('plugins/jQueryFiler/js/jquery.filer.min.js'),
                base_url('js/custom_js/blogs.js'),
            ), 'menu' => array(
                'current_page'  => 'blogs',
                'current_menu'  => 'masters',
            ),
            'categories' => $this->categories->getCategories()
        );
        $validation = \Config\Services::validation();
        $form_data = $this->request->getVar();
        $validation->setRules([
            'title'         => 'required',
            'description'   => 'required',
            'category_id'   => 'required',
        ], [
            'title' => [
                'required' => 'Title is required.',
            ], 'description' => [
                'required' => 'Description is required.'
            ], 'category_id' => [
                'required' => 'Category is required.',
            ],
        ]);
        if (!empty($form_data)) {
            if (!$validation->run($form_data)) {
                $errors = $validation->getErrors();
                $data['errors'] = $errors;
                $data['blogs'] = $form_data;
            } else {
                $tags = (!empty($this->request->getVar('tags'))) ? implode(',',$this->request->getVar('tags')) : '';
                $this->model->save([
                    'title'         => $this->request->getVar('title'),
                    'description'   => $this->request->getVar('description'),
                    'tags'          => $tags,
                    'date_time'     => date('Y-m-d H:i:s')
                ]);
                
                $id = $this->model->insertID();
                if($id) {
                    $categories = $this->request->getVar('category_id');
                    $new_arr = array();
                    foreach($categories as $category) {
                        $new_arr[] = array(
                            'category_id'   => $category,
                            'blog_id'       => $id,
                        );
                    }
                    $this->model->insert_blog_categories($new_arr);
                }
                $return_data    = $this->_upload_doc($id,$_FILES);
                
                if(!isset($return_data['error'])) {
                    $status = $this->model->update($id, array(
                        'image'     => $return_data['blog_img']['file_path'],
                        'document'  => $return_data['document']['file_path'],
                        'blog_tags' => $tags,
                    ));
                }
                return redirect()->to(base_url() . "blogs");
            }
        }
        echo view('templates/header', $data);
        echo view('blogs/create', $data);
        echo view('templates/footer');
    }
    
    private function _upload_doc($id,$upload_files) {
        $data = array();
        if (!file_exists('uploads/'.$id.'/')) {
            mkdir('uploads/'.$id.'/', 0777, true);
        }
        $target_dir = 'uploads/'.$id.'/';
        
        // Upload Image
        $target_file = $target_dir . basename($upload_files['blog_img']["name"]);
         if(!move_uploaded_file($upload_files['blog_img']["tmp_name"], $target_file)) {
            $data['error']['blog_img'] = array(
                'msg'       => 'File could not be uploaded'
            );
        } else {
            $data['blog_img'] = array(
                'file_path' => $target_file,
                'msg'       => 'File is uploaded'
            );
        }
        
        // Upload Document
        $target_file = $target_dir . basename($upload_files['document']["name"]);
         if(!move_uploaded_file($upload_files['document']['tmp_name'], $target_file)) {
            $data['error']['document'] = array(
                'msg'       => 'File could not be uploaded'
            );
        } else {
            $data['document'] = array(
                'file_path' => $target_file,
                'msg'       => 'File is uploaded'
            );
        }
        return $data;
    }

    public function delete() {
        $status = $this->model->update($this->request->getvar('id'), array(
            'status' => 1,
        ));
        return json_encode(array('status' => $status));
    }

    public function edit() {
        $this->categories = new CategoriesModel();
        $blog_id = $this->request->uri->getSegment(3);
        $details = $this->model->getBlogs(array(
            'blogs.id' => $blog_id,
        ));
        
        $blog_categories = $this->model->getBlogCategories(array(
            'blog_id'   => $blog_id
        ));
        $blog_ids = array_column($blog_categories,'category_id');

        $data = array(
            'blog_data' => $details,
            'categories' => $this->categories->getCategories(),
            'blog_ids'   => $blog_ids,
            'css' => array(
                base_url('plugins/jQueryFiler/css/themes/jquery.filer-dragdropbox-theme.css'),
                base_url('plugins/jQueryFiler/css/jquery.filer.css'),
            ),
            'js' => array(
                base_url('plugins/jQueryFiler/js/jquery.filer.min.js'),
                base_url('js/custom_js/blogs.js'),
            ), 'menu' => array(
                'current_page'  => 'blogs',
                'current_menu'  => 'masters',
            ),
        );
        
        echo view('templates/header', $data);
        echo view('blogs/create', $data);
        echo view('templates/footer');
    }
    
    public function update() {
        $this->categories = new CategoriesModel();
        $form_data = $this->request->getvar();

        $id = $form_data['id'];
 
        $status = $this->model->update($id, [
            'title'         => $this->request->getVar('title'),
            'description'   => $this->request->getVar('description'),
            'tags'          => (!empty($this->request->getVar('tags'))) ? implode(',',$this->request->getVar('tags')) : '',
        ]);
        
        $this->model->delete_blog_categories(array(
            'blog_id'   => $id
        ));
        
        $categories = $this->request->getVar('category_id');
        $new_arr = array();
        foreach($categories as $category) {
            $new_arr[] = array(
                'category_id'   => $category,
                'blog_id'       => $id,
            );
        }
        $this->model->insert_blog_categories($new_arr);
        
        $details = $this->model->getBlogs(array(
            'blogs.id' => $id,
        ));

        $data = array(
            'blog_data' => $details,
            'categories' => $this->categories->getCategories(),
            'css' => array(
                base_url('plugins/jQueryFiler/css/themes/jquery.filer-dragdropbox-theme.css'),
                base_url('plugins/jQueryFiler/css/jquery.filer.css'),
            ),
            'js' => array(
                base_url('plugins/jQueryFiler/js/jquery.filer.min.js'),
                base_url('js/custom_js/blogs.js'),
            ), 'menu' => array(
                'current_page'  => 'blogs',
                'current_menu'  => 'masters',
            ),
        );
        
        echo view('templates/header', $data);
        echo view('blogs/create', $data);
        echo view('templates/footer');
    }

    public function view() {
        $this->categories = new CategoriesModel();
        $blog_id = $this->request->uri->getSegment(3);
        $details = $this->model->getBlogs(array(
            'blogs.id' => $blog_id,
        ));
        $blog_categories = $this->model->getBlogCategories(array(
            'blog_id'   => $blog_id
        ));
        
        $data = array(
            'blog_data' => $details,
            'categories' => $this->categories->getCategories(),
            'blog_categories' => $blog_categories,
            'menu' => array(
                'current_page'  => 'blogs',
                'current_menu'  => 'masters',
            ),
        );
        echo view('templates/header', $data);
        echo view('blogs/view', $data);
        echo view('templates/footer');
    }
    
    public function delete_files() {
        
    }
    
    public function category_blogs() {
        $this->categories = new CategoriesModel();
        $category_id = $this->request->uri->getSegment(3);
        $blogs = $this->model->getBlogs(array(
            'blog_cate.category_id' => $category_id,
        ), array(
            'multiple'  => TRUE
        ));

        $data = array(
            'blogs' => $blogs,
            'menu' => array(
                'current_page'  => 'blogs',
                'current_menu'  => 'masters',
            ),
        );
        
        echo view('templates/header', $data);
        echo view('blogs/all_blogs', $data);
        echo view('templates/footer');
    }
}
