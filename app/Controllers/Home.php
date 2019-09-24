<?php
namespace App\Controllers;
use CodeIgniter\Controller;


class Home extends BaseController {
    public function __construct() {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    
    public function index() {
        $data = array();
        return view('welcome_message', $data);
    }
    
    public function login() {
        $data = array(
            'menu' => array(
                'current_page'  => 'login'
            )
        );
        echo view('templates/header', $data);
        echo view('users/login', $data);
        echo view('templates/footer');
    }
    
    public function contact_us() {
        $data = array(
            'menu' => array(
                'current_page'  => 'contact_us'
            )
        );
        echo view('templates/header', $data);
        echo view('pages/contact_us', $data);
        echo view('templates/footer');
    }
}
