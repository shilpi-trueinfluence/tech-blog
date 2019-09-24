<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends BaseController {

    public function __construct() {
        $this->model = new UsersModel();
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('url');
    }

    public function register() {
        $data = array();
        if (!empty($this->request->getvar())) {
            $this->model->save([
                'first_name' => $this->request->getVar('first_name'),
                'last_name' => $this->request->getVar('last_name'),
                'email_id' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'password' => md5($this->request->getPost("password")),
            ]);

            return redirect()->to(base_url() . "login");
        } else {
            echo view('templates/header', $data);
            echo view('users/register', $data);
            echo view('templates/footer');
        }
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
            'js/custom_js/users.js',
        );
        $data['menu']['current_page'] = 'users';
        echo view('templates/header', $data);
        echo view('users/index', $data);
        echo view('templates/footer');
    }

    public function get_users() {

        $users = $this->model->getUsers();
        $data = array();
        $i = 1;
        foreach ($users as $user) {
            $data[] = array(
                'num' => $i++,
                'name' => $user['first_name'] . ' ' . $user['last_name'],
                'phone' => $user['phone'],
                'email_id' => $user['email_id'],
                'actions' => '<div class="col-xs-12 text-center">'
                . "<i class='fa fa-pencil-square-o action-btns action-edit-btns' id='edit-{$user['id']}' data-user-id='{$user['id']}'></i> "
                . "<i class='fa fa-trash-o action-btns action-delete-btns' id='delete-{$user['id']}' data-user-id='{$user['id']}'></i>"
                . '</div>',
            );
        }
        return json_encode(array('data' => $data));
    }

    public function get_user_details() {
        $users = $this->model->getUsers(array(
            'id' => $this->request->getvar('user-id'),
        ));

        return json_encode($users);
    }

    public function delete_user() {
        $status = $this->model->update($this->request->getvar('user-id'), array(
            'status' => 1,
        ));
        return json_encode(array('status' => $status));
    }

    public function update_user() {
        $form_data = $this->request->getvar();
        $user_id = $form_data['user-id'];
        unset($form_data['user-id']);
        $status = $this->model->update($user_id, $form_data);
        return json_encode(array('status' => $status));
    }

    public function create() {
        if (!$this->session->has('logged_in')) {
            $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">You don\'t have access to this page! Please Log-In and try again</div>');
            return redirect()->to(base_url() . "login");
        }
        helper('form');
        $data['js'] = array(
            'js/custom_js/users.js',
        );
        $data['menu']['current_page'] = 'users';
        $validation = \Config\Services::validation();
        $form_data = $this->request->getVar();
        $validation->setRules([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_id' => 'required|valid_email',
            'phone' => 'required',
            'password' => 'required|matches[password]',
            'confirm_password' => 'required',
                ], [
            'first_name' => [
                'required' => 'First Name is required.',
            ], 'last_name' => [
                'required' => 'Last Name is required.'
            ], 'email_id' => [
                'required' => 'Email ID is required.',
                'valid_email' => 'Email ID is not valid',
            ], 'phone' => [
                'required' => 'Contact Number is required.'
            ], 'password' => [
                'required' => 'Password is required.',
            ], 'confirm_password' => [
                'required' => 'Confirm Password is required.',
                'matches' => 'Confirm password not matching password.'
            ]
        ]);
        if (!empty($form_data)) {
            if (!$validation->run($form_data)) {
                $errors = $validation->getErrors();
                $data['errors'] = $errors;
                $data['users'] = $form_data;
            } else {
                try {
                    $this->model->save([
                        'first_name' => $this->request->getVar('first_name'),
                        'last_name' => $this->request->getVar('last_name'),
                        'email_id' => $this->request->getVar('email_id'),
                        'phone' => $this->request->getVar('phone'),
                        'password' => md5($this->request->getPost("password")),
                    ]);
                } catch (\Exception $e) {
                    die($e->getMessage());
                }
            }
        }
        echo view('templates/header', $data);
        echo view('users/create', $data);
        echo view('templates/footer');
    }

    public function auth_user() {
        $this->validation = \Config\Services::validation();
        // get form input
        $form_data['email_id'] = $this->request->getPost("email_id");
        $form_data['password'] = md5($this->request->getPost("password"));
        $data['js'] = array(
            'js/custom_js/users.js',
        );

        $this->validation->setRules([
            'email_id' => 'required',
            'password' => 'required|min_length[5]'
        ]);
        // form validation

        if ($this->validation->run($form_data) == FALSE) {
            // validation fail
            $id['invalid_credential'] = 'Email/Password Required ';
            echo view('templates/header', $data);
            echo view('users/login', $id);
            echo view('templates/footer');
        } else {
            // check for user credentials
            $uresult = $this->model->get_user($form_data);

            if (count($uresult) > 0) {
                // set session
                $sess_data = array('logged_in' => TRUE, 'uname' => $uresult[0]->first_name.' '.$uresult[0]->last_name, 'uemail' => $uresult[0]->email_id, 'uid' => $uresult[0]->id);
                $this->session->set($sess_data);
                return redirect()->to(base_url() . "home");
            } else {
                $this->session->setFlashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
                return redirect()->to(base_url() . "login");
            }
        }
    }

    public function logout() {
        $newdata = array(
            'uname' => '',
            'uid' => '',
            'logged_in' => FALSE,
        );
        $this->session->remove($newdata);
        $this->session->destroy();

        return redirect()->to(base_url() . "login");
    }

}
