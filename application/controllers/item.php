<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

	public function add_item()
	{    
        $this->load->model('category_model');
        $data['category'] = $this->category_model->show_category();

		$this->load->view('scaffolds/header'); 
		$this->load->view('scaffolds/sidebar');
		$this->load->view('add_new_product',$data);
		$this->load->view('scaffolds/footer');
	}

	public function do_add_item()
	{	
		$this->load->model('item_model');
		$this->load->model('upload_model');
		$item_name    = $this->input->post('item_name', TRUE);
		$item_no    = $this->input->post('item_no', TRUE);
		$item_category  = $this->input->post('item_category', TRUE);
		$item_date  = $this->input->post('item_date', TRUE);
        $item_sell_price = $this->input->post('item_sell_price', TRUE);
        $item_pur_price = $this->input->post('item_pur_price', TRUE);
        $item_quantity = $this->input->post('item_quantity', TRUE);
            
        if ($this->input->post('submit')) 
        {    
      
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '1024';
            $config['max_width']     = '1024';
            $config['max_height']    = '768';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('add_item', $error);
            } 
            else 
            {
                $data = $this->upload->data();
                $this->thumb($data);             
                $this->item_model->do_insert_item($item_name, $item_category, $item_no, $item_date,$item_sell_price,$item_pur_price,$item_quantity, $data);
              
            }
        } 
        else 
        {
            redirect(site_url('upload'));
        } 
    }
    
    function thumb($data)
    {
        $config['image_library']  = 'gd2';
        $config['source_image']   = $data['full_path'];
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = 275;
        $config['height']         = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }


}

/* End of file item.php */
/* Location: ./application/controllers/item.php */