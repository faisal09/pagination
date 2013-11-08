<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();   
        $this->load->model('Products_model','datamodel');     
    }
	 
	public function index($id='')
	{
		 $total = $this->db->get('products');
		 
		//pengaturan pagination
		 $config['base_url'] = base_url().'backend/products/index';
		 $config['total_rows'] = $total->num_rows();
		 $config['per_page'] = '10';
		 $config['uri_segment'] = 4;
		 $config['first_link'] = 'First';
		 $config['last_link'] = 'Last';
		 $config['next_link'] = '&raquo;';
		 $config['prev_link'] = '&laquo;';
	
		//inisialisasi config
		 $this->pagination->initialize($config);
		 $data['title']='List Of Products';	
		
		//buat pagination
		 $data['page'] = $this->pagination->create_links();
		
		//tamplikan data
		 $data['array_produc'] = $this->datamodel->ambil_produc($config['per_page'], $id);
		 $this->mytemplate->loadBackend('products',$data);
	}
	
	
	public function form($mode,$id='')
	{
		$data['title']=($mode=='insert')? 'Add Products' : 'Update Products';				
		$data['products'] = ($mode=='update') ? $this->datamodel->get_products_by_id($id) : '';
		$this->mytemplate->loadBackend('frmproducts',$data);	
	}

	public function process($mode,$id='')
	{
		if(($mode=='insert') || ($mode=='update'))
		{
			$result = ($mode=='insert') ? $this->datamodel->insert_entry() : $this->datamodel->update_entry();
		}else if($mode=='delete'){
			$result = $this->datamodel->hapus($id);			
		}	
		if ($result) redirect(site_url('backend/products'),'location');
	}
	
	private function dependensi($id)
	{
		return $this->datamodel->cek_dependensi($id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
