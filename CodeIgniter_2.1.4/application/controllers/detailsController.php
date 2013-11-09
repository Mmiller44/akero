<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class detailsController extends CI_Controller {

	public function index($productName)
	{
		$this->load->model('database');
	}

	public function details($productName)
	{
<<<<<<< HEAD
=======

		$sessionData = array(

            'productName' => $productName
        );

		$this->session->set_userdata($sessionData);


>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_specific_product($productName);
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('product-details', $products);
			$this->load->view('footer');

		}else
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_specific_product($productName);
			$this->load->view('header');
			$this->load->view('product-details', $products);
			$this->load->view('footer');
			// echo $products['items'];
		}

	}
}

/* End of file products.php */
