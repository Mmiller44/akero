<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class addWishlistController extends CI_Controller {

	public function index()
	{
<<<<<<< HEAD

		// Load a model
		// That model will insert the product details to the favorites DB

		// If model returns true, load the product-details page for the same product they were viewing.


=======
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
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
	}
}

/* End of file products.php */
