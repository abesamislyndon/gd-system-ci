<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Main extends CI_Controller {

	public function index()
	{   
       $this->load->model("item_model");

        $config = array();
        $config["base_url"] = base_url().'main/index';
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
        $data["item_dashboard_details"] = $this->item_model->fetch_item($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
       // $data["item_dashboard_details"] = $this->item_model->item_dashboard_details();
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
		$this->load->view('scaffolds/header'); 
		$this->load->view('scaffolds/sidebar');
		$this->load->view('main', $data);
		$this->load->view('scaffolds/footer');
		}
		else 
		{
          redirect('login', 'refresh');
        }
	}
     public function item_details($item_id = 0)
	 {   

       $this->load->model("item_model");

		if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
 
        $data['item_individual']  = $this->item_model->get_item($item_id);
  
    	$this->load->view('model_form/update_in_out_item', $data);
		}
	else 
		{
          redirect('login', 'refresh');
        }
	} 

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */