<?php
class Products_model extends CI_Model {
    
	
	var $ProductName  = '';
    var $QuantityPerUnit = '';
	var $UnitPrice  = '';
	var $UnitsInStock  = '';
	var $UnitsOnOrder  = '';

    function __construct()
    {        
        parent::__construct();
    }
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }

    function insert_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true);
        $this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true); 
        $this->UnitPrice  = $this->input->post('UnitPrice',true);          
        $this->UnitsInStock  = $this->input->post('UnitsInStock',true);          
        $this->UnitsOnOrder  = $this->input->post('UnitsOnOrder',true);          
        return $this->db->insert('products', $this);
    }

    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->QuantityPerUnit   = $this->input->post('QuantityPerUnit',true); 
        $this->UnitPrice  = $this->input->post('UnitPrice',true);         
        $this->UnitsInStock  = $this->input->post('UnitsInStock',true);         
        $this->UnitsOnOrder  = $this->input->post('UnitsOnOrder',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }

    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
	public function ambil_produk($a, $b)
	{
		$this->db->order_by('ProductName', 'ASC');
		$data = $this->db->get('products', $a, $b);
		return $data->result();
	}
	
	public function ambil_produc($a, $b)
	{
		$this->db->order_by('ProductName', 'ASC');
		$data = $this->db->get('products', $a, $b);
		return $data->result();
	}

}
