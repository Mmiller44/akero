<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wishlistController extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
<<<<<<< HEAD
			$products['items'] = $this->database->get_entries();
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('wishlistView', $products);
=======
			$userID = $this->session->userdata('userID');
			$favorites['items'] = $this->database->get_favorites($userID);
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('wishlistView', $favorites);
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
			$this->load->view('footer');

		}else
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$this->load->view('header');
			$this->load->view('landing', $products);
			$this->load->view('footer');
		}
	}
}

<<<<<<< HEAD
/* End of file products.php */
=======
/* End of file wishlistController.php */
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
