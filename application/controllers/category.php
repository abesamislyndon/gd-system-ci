<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

    public function add_category()
    {    
        $this->load->model('category_model');
        $data['category'] = $this->category_model->show_category();
        
        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('add_new_category',$data);
        $this->load->view('scaffolds/footer');
    }

    public function do_add_category()
    {
         $this->load->model('category_model');   
         $category = $this->input->post('cat_name', TRUE);

         if ($this->input->post('submit')) 
        {  
            $this->category_model->do_insert_category($category);
        }
           
    }

}

/* End of file item.php */
/* Location: ./application/controllers/Category.php */