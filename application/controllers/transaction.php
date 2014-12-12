<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Transaction extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

    public function transaction_item_details()
    {    
     

        $this->load->model("item_model");
/*
        $config = array();
        $config["base_url"] = base_url().'transaction/transaction_item_details';
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['transaction_details'] = $this->item_model->fetch_history($config["per_page"], $page);
        $data["links1"] = $this->pagination->create_links();

*/

       $item_id = $this->uri->segment(3);
       $data['transaction_details'] = $this->item_model->item_history($item_id);
        
        $this->load->view('modal_form/transaction_history',$data);
    }

}

/* End of file item.php */
/* Location: ./application/controllers/transaction.php */