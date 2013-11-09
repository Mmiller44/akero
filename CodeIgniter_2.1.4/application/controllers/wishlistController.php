<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wishlistController extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
			$userID = $this->session->userdata('userID');
			$favorites['items'] = $this->database->get_favorites($userID);
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('wishlistView', $favorites);
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

/* End of file wishlistController.php */