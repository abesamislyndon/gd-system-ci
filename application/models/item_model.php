<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends CI_Model

    {
      function item_dashboard_details()
      {

        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('uploads', 'item.item_id = uploads.item_id', 'inner');
       
        $query = $this->db->get();
        return $result = $query->result();

      }

      function do_insert_item($item_name, $item_category, $item_no, $item_date,$item_pur_price, $item_sell_price,$item_quantity, $data)
      {
				
        $row = array(
        'item_name'=>$item_name,
        'item_category'=>$item_category,
        'item_no'=>$item_no,
        'item_date'=>$item_date,
        'item_pur_price'=>$item_pur_price,
        'item_sell_price'=>$item_sell_price,
         'item_quantity'=>$item_quantity
        );
        $this->db->insert('item', $row);
        $item_id = $this->db->insert_id();

        $file = array(
        'img_name' => $data['raw_name'],
        'thumb_name' => $data['raw_name'] . '_thumb',
        'ext' => $data['file_ext'],
        'upload_date' => time(),
        'item_id'=>$item_id
        );

        $data = array(
        'upload_data' => $this->upload->data()
        );		

		    $this->db->insert('uploads',$file);
	     	$this->session->set_flashdata('msg', 'item succesfully added');
        redirect('item/add_item');
	  	}

      function get_item($item_id)
      {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('uploads', 'item.item_id = uploads.item_id', 'inner');
        $this->db->where('item.item_id', $item_id);
        $query = $this->db->get();
        return $result = $query->result();
      } 

        public function record_count() {
        return $this->db->count_all("item");
    }
 
  function fetch_item($limit, $start) {
        
        $this->db->from('item');
        $this->db->join('uploads', 'item.item_id = uploads.item_id', 'inner');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       //return $result = $query->result();   


       // $this->db->limit($limit, $start);
       // $query = $this->db->get("item");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
     function fetch_history($limit, $start) {
        
        $this->db->from('item');
        $this->db->join('transaction', 'item.item_id = transaction.item_id', 'inner');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
  function do_add_update_item($item_quantity, $item_id, $company_name,$item_quantity1)
    {
      $this->db->select('*');
      $this->db->from('item');
      $this->db->join('transaction', 'item.item_id = transaction.item_id', 'inner');
      $item_add = "item_quantity +" . $item_quantity; 
      $this->db->set('item.item_quantity', $item_add, FALSE);
      $this->db->where('item.item_id', $item_id);
      $this->db->update('item');
      $action = 'stock in'; 
      $bal = $item_quantity1+$item_quantity;

        $result = array(
        'quantity_in'=>$item_quantity,
        'item_id'=>$item_id,
        'company_name'=>$company_name,
        'action'=>$action,
        'stock_bal'=>$bal
      );
      $this->db->insert('transaction', $result);

      $this->session->set_flashdata('msg', 'quantity updated');
      redirect('main');
    }

    function do_sub_update_item($item_quantity, $item_id, $company_name,$item_quantity1)
    {
      
      $item_add = "item_quantity -" . $item_quantity; 
      $this->db->set('item_quantity', $item_add, FALSE);
      $this->db->where('item_id', $item_id);
      $this->db->update('item');
      $action = 'stock out'; 
      $bal = $item_quantity1-$item_quantity;

      $result = array(
        'quantity_in'=>$item_quantity,
        'item_id'=>$item_id,
        'company_name'=>$company_name,
        'action'=>$action,
             'stock_bal'=>$bal
      );
      $this->db->insert('transaction', $result);

      $this->session->set_flashdata('msg', 'quantity updated');
      redirect('main');
    }

    function item_history($item_id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('transaction', 'item.item_id = transaction.item_id', 'inner');
        $this->db->where('transaction.item_id',$item_id);
      
        $query = $this->db->get();
        return $result = $query->result();

    }

    function do_update_item_info($item_id)
    {
       $this->load->helper('date');
       $item_name = $this->input->post('item_name'); 
       $item_no = $this->input->post('item_no', TRUE);
       $item_category = $this->input->post('item_category', TRUE);
       $item_date = $this->input->post('item_date', TRUE);
       $item_pur_price = $this->input->post('item_pur_price', TRUE);
       $item_sell_price = $this->input->post('item_sell_price', TRUE);

        $row = array(
          'item_name'=>$item_name,
          'item_no'=>$item_no,
          'item_category'=>$item_category,
          'item_date'=>date('Y-m-d H:i:s', now()),
          'item_pur_price'=>$item_pur_price,
          'item_sell_price'=>$item_sell_price,
          );

        $this->db->where('item_id', $item_id);
        $this->db->update('item', $row);

        $this->session->set_flashdata('msg', 'item info updated');
        redirect('main');

    }

      function do_delete_item($item_id)
       {
       $this->db->where('item_id',$item_id);
       $this->db->delete('item');
         
      $this->session->set_flashdata('msg', 'SUCCESFULLY delete');
     redirect('main');
      
       }

    }
/* End of file crud_model.php */
/* Location: ./application/models/item_model.php */
  

