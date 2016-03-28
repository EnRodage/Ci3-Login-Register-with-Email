<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {
        
        public $status; 
        public $roles;
    
        function __construct(){
            parent::__construct();
            $this->load->model('User_model', 'user_model', TRUE);
            $this->load->library('form_validation');    
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->status = $this->config->item('status'); 
            $this->roles = $this->config->item('roles');
        }      
    
    	public function index()
    	{   
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'/main/login/');
            }  
            /*front page*/
            $data = $this->session->userdata();           
            $this->render1('admin/dashboard1', $data);
        }      
        
        public function register()
        {
             
            $this->form_validation->set_rules('firstname', 'First Name', 'required|trim|min_length[2]|max_length[32]');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim|min_length[2]|max_length[32]');    
            $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[256]|valid_email');    
                       
            if ($this->form_validation->run() == FALSE) { 
                $this->render('register');
            }else{                
                if($this->user_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', 'Cette email existe déjà!');
                    redirect(site_url().'main/login');
                }else{
                    
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->user_model->insertUser($clean); 
                    $token = $this->user_model->insertToken($id);                                        
                    
                    $qstring = base64_encode($token);                    
                    $url = site_url() . 'main/complete/token/'. $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>'; 
                               
                    $message = '';                     
                    $message .= '<strong>Votre inscription sera enregitrée.</strong><br>';
                    $message .= '<strong>Poursuivez en cliquant ce lien:</strong><br> ' . $link;                      

                      // send email
                    $this->load->library('email');
                    $config['protocol'] = 'sendmail';
                    $this->email->initialize($config);
                    $this->email->clear();
                    $this->email->from('', '');
                    /*$this->email->reply_to('enrodage@bluewin.ch', 'Pi2');*/
                    $this->email->subject(sprintf('Nouveau compte %s', $this->input->post('firstname', TRUE)));
                    $this->email->to($this->input->post('email', TRUE));
                    $this->email->message($message);
                    $this->email->send(); 

                   
                    $this->session->set_flashdata('message', sprintf('%s! Consultez votre messagerie pour valider votre compte', $this->input->post('firstname', TRUE)));
                    // redirect home and display message
                    redirect(base_url('main/login'));
                     
                    
                };              
            }
        }
        
        
        protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }
        
        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token invalide ou expiré');
                redirect(site_url().'main/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->render('complete', $data);
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Problème de mise à jour. Désolé!');
                    redirect(site_url().'main/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'main/');
                
            }
        }
        
        public function login()
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            
            if($this->form_validation->run() == FALSE) {
                 $this->render('login');
            }else{
                
                $post = $this->input->post();  
                $clean = $this->security->xss_clean($post);
                
                $userInfo = $this->user_model->checkLogin($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Il y a comme une erreur!');
                    redirect(site_url().'main/login');
                }                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'main/');
            }
            
        }
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(site_url().'welcomeController');
        }
        
        public function forgot()
        {
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
               $this->render('forgot');;
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'Aucun email trouvé à cette adresse!');
                    redirect(site_url().'main/login');
                }   
                
                if($userInfo->status != $this->status[1]){ //if status is not approved
                    $this->session->set_flashdata('flash_message', 'Votre compte n\'est pas encore approuvé');
                    redirect(site_url().'main/login');
                }
                
                //build token 
				
                $token = $this->user_model->insertToken($userInfo->id);                    
                $qstring = base64_encode($token);                    
                $url = site_url() . 'main/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>Vous avez demandé un nouveau mot de passe</strong><br>';
                $message .= '<strong>Cliquer ici:</strong> ' . $link;             

                 // send email
                $this->load->library('email');
                $config['protocol'] = 'sendmail';
                $this->email->initialize($config);
                $this->email->clear();
                $this->email->from('', '');
                $this->email->to($this->input->post('email', TRUE));
                $this->email->message($message);
                $this->email->send(); 


                 $this->session->set_flashdata('message', sprintf('Consultez votre messagerie pour valider votre nouveau mot de passe'));

                // redirect home and display message
                redirect(base_url('main/login'));;
                
            }
            
        }
        
        public function reset_password()
        {
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token invalide ou a expiré!');
                redirect(site_url().'main/login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>base64_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->render('reset_password', $data);
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'Problème de mise à jour du mot de passe!');
                }else{
                    $this->session->set_flashdata('message', 'Votre mot de passe est à nouveau réinitialisé');
                }
                redirect(site_url().'main/login');                
            }
        }       
        
}
