<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Update_item extends CI_Controller {

	public function item_details()
	{   
		if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
        $item_id = $this->uri->segment(3);
	    $this->load->model("item_model");
        $data['item_individual']  = $this->item_model->get_item($item_id);
  
    	$this->load->view('modal_form/update_in_out_item', $data);
	}
	else 
		{
          redirect('login', 'refresh');
        }
	} 

    function update_item_individual()
    {
         $this->load->model('item_model');
         $item_id = $this->input->post('item_id', TRUE);
         $item_quantity = $this->input->post('item_quantity', TRUE);
         $item_quantity1 = $this->input->post('item_quantity1', TRUE);
         $company_name = $this->input->post('company_name', TRUE);


         if($this->input->post('submit') == 'add_qty')
         {
           $this->item_model->do_add_update_item($item_quantity, $item_id,$company_name,$item_quantity1);
         } 
         elseif($this->input->post('submit') == 'sub_qty')
         {
           $this->item_model->do_sub_update_item($item_quantity, $item_id,$company_name, $item_quantity1);
         }
         elseif($this->input->post('submit') == 'update_info')
         {
           $this->item_model->do_update_item_info($item_id);
         }

    }


    function  update_item_info()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
        $item_id = $this->uri->segment(3);
        $this->load->model("item_model");
        $data['item_individual']  = $this->item_model->get_item($item_id);
        $this->load->view('modal_form/update_item_info', $data);
    }
    else 
        {
          redirect('login', 'refresh');
        }
    }


    function delete_item()
    {
         $this->load->model('item_model');
         
           $item_id = $this->uri->segment(3);
           $this->item_model->do_delete_item($item_id);



}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */