<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{

    function show_category()
    {
       $this->db->select('*');
       $this->db->from('item_category');
       $query = $this->db->get();
       return $result = $query->result();

    }

    function do_insert_category($category)
      {
				$category = $this->input->post('cat_name', TRUE);
      	  $row = array(
      		'cat_name'=>$category,
      	
      		);
           $this->db->insert('item_category', $row);

           $this->session->set_flashdata('msg', 'category succesfully added');
           redirect('category/add_category');
		 }


    }
/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */
  

