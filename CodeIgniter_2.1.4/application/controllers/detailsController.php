<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detailscontroller extends CI_Controller {

	public function index($productName)
	{
		$this->load->model('database');
	}

	public function details($productName)
	{
		$this->db->select('id');
		$query = $this->db->get_where('products', array('name' => $productName));
		$result = $query->result();
		$id = $result[0]->id;

		$sessionData = array(

            'productName' => $productName,
            'productID'   => $id
        );

		$this->session->set_userdata($sessionData);

		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
			$data['items'] = $this->database->get_specific_product($productName);
			$data['reviews'] = $this->database->get_reviews($this->session->userdata('productID'));
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('product-details', $data);
			$this->load->view('footer');

		}else
		{
			$this->load->model('database');
			$data['items'] = $this->database->get_specific_product($productName);
			$data['reviews'] = $this->database->get_reviews($this->session->userdata('productID'));
			$this->load->view('header');
			$this->load->view('product-details', $data);
			$this->load->view('footer');
			// echo $products['items'];
		}
 
	}
}

/* End of file products.php */
