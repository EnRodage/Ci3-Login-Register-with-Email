<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WelcomeController extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $headers = array(
            'title' => 'Accueil',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            //'flash' => ($this->session->flashdata('success')),
        );
        $this->load->vars($headers);
        $this->render('welcomeView');
    }
}
