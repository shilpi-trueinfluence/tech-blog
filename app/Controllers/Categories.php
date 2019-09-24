<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use CodeIgniter\Controller;

class Categories extends BaseController {

    public function __construct() {
        $this->model = new CategoriesModel();
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('url');
    }

    public function index() {
        if (!$this->session->has('logged_in')) {
            $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">You don\'t have access to this page! Please Log-In and try again</div>');
            return redirect()->to(base_url() . "login");
        }
        $data['css'] = array(
            'DataTables/datatables.min.css'
        );
        $data['js'] = array(
            'DataTables/datatables.min.js',
            'js/custom_js/categories.js',
        );
        $data['menu'] = array(
            'current_page'  => 'categories',
            'current_menu'  => 'masters',
        );
        echo view('templates/header', $data);
        echo view('categories/index', $data);
        echo view('templates/footer');
    }
    
    public function get_categories() {

        $table_data = $this->model->getCategories();
        $data = array();
        $i = 1;
        foreach ($table_data as $item) {
            $data[] = array(
                'num' => $i++,
                'name' => $item['name'],
                'actions' => '<div class="col-xs-12 text-center">'
                . "<i class='fa fa-pencil-square-o action-btns action-edit-btns' id='edit-{$item['id']}' data-id='{$item['id']}'></i> "
                . "<i class='fa fa-trash-o action-btns action-delete-btns' id='delete-{$item['id']}' data-id='{$item['id']}'></i>"
                . '</div>',
            );
        }
        return json_encode(array('data' => $data));
    }
    
    public function get_details() {
        $details = $this->model->getCategories(array(
            'id' => $this->request->getvar('id'),
        ));

        return json_encode($details);
    }

    public function delete() {
        $status = $this->model->update($this->request->getvar('id'), array(
            'status' => 1,
        ));
        return json_encode(array('status' => $status));
    }
    
    public function update() {
        $form_data = $this->request->getvar();
        $id = $form_data['id'];
        unset($form_data['id']);
        $status = $this->model->update($id, $form_data);
        return json_encode(array('status' => $status));
    }
    
    public function create() {
        $form_data = $this->request->getvar();
        $status = $this->model->save($form_data);
        return json_encode(array('status' => $status));
    }

}