<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logoutController extends CI_Controller {

	public function index()
	{
		$sessionData = array(
   			'email'     => '',
  			'logged_in' => '',
  			'reviews' 	=> '',
   			'cartItems' => '',
   			'userID'	=> ''
       	);

		$this->session->unset_userdata($sessionData);
		$this->session->sess_destroy();

		$this->load->model('database');
		$products['items'] = $this->database->get_entries();
		$this->load->view('header');
		$this->load->view('landingView', $products);
		$this->load->view('footer');
	}
}

/* End of file logoutController.php */
