<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addwishlistcontroller extends CI_Controller {

	public function index()
	{
		// Load a model
		// That model will insert the product details to the favorites DB

		// If model returns true, load the product-details page for the same product they were viewing.
	}

	public function addWishList($productName)
	{
		$this->load->model('wishlistModel');

		if($this->wishlistModel->addToWishList($productName))
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_specific_product($productName);
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('product-details', $products);
			$this->load->view('footer');
		}
	}
}

/* End of file products.php */
