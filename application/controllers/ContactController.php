<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $this->load->library('session');

        $headers = array(
            'title' => 'Contacts',
            'description' => 'Lorem Ipsum is simply dummy text',
        );
        $this->load->vars($headers);
        $this->render('contact/contactView');
    }
    function sendmail(){
        $this->load->library('email');
        $this->load->library('session');

        // set form validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
    if ($this->form_validation->run() == FALSE)
    {
        redirect('contactController');
    }
    else 
    {

        $config = array();
        $config['protocol'] = "smtp";
        $config['smtp_host'] = 'ssl://smtp-enrodage.alwaysdata.net';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'enrodage@alwaysdata.net';
        $config['smtp_pass'] = 'Lasoluad1';
        $config['mailtype'] = 'text';
        $config['charset'] = 'utf-8';

        $this->email->initialize($config);        

        // set email data
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to('enrodage@bluewin.ch');
        //$this->email->reply_to($this->input->post('email'), $this->input->post('name'));
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message'));
        if($this->email->send()){
        $this->session-> set_flashdata('success', 'Merci!');
        redirect('welcomeontroller');
    }
        else 
        {
        echo $this->email->print_debugger();

        }
    }

}
}
