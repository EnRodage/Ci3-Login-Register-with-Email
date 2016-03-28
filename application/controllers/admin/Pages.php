<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller {        
    
    function __construct(){
            parent::__construct();
        
      }      
    
    	public function summernote()
    	{                     
            $this->render1('admin/summernote');
      }
      public function boutons()
    	{                     
            $this->render1('admin/boutons');
      }
       public function grid()
      {                     
            $this->render1('admin/grid');
      }
       public function icones()
      {                     
            $this->render1('admin/icones');
      }
       public function forms()
      {                     
            $this->render1('admin/forms');
      }
       public function typographie()
      {                     
            $this->render1('admin/typographie');
      }
       public function panels()
      {                     
            $this->render1('admin/panels');
      }
       public function tables()
      {                     
            $this->render1('admin/tables');
      }
       public function calendrier()
      {                     
            $this->render1('admin/calendrier');
      }            
        
}
