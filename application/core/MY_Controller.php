<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


    public function __construct() {
        parent::__construct();
        
    }


    public function render($view, $data = null) {
        $this->load->view('layout/header');
        $this->load->view($view, $data);
        $this->load->view('layout/footer');
    }
     public function render1($view, $data = null) {
        $this->load->view('admin/layout/header');
        $this->load->view($view, $data);
        $this->load->view('admin/layout/footer');
    }
} 