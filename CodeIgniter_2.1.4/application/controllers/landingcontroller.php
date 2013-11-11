<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class landingcontroller extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$sessionData = array(
      			'reviews' => 'True'
        	);

			$this->session->set_userdata($sessionData);
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('landingView', $products);				
			$this->load->view('footer');

		}else
		{
			$sessionData = array(
      			'reviews' => 'False'
        	);

			$this->session->set_userdata($sessionData);
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$this->load->view('header');
			$this->load->view('landingView', $products);
			$this->load->view('footer');
		}

		//echo ($this->session->userdata('session_id'));
	}
}

/* End of file landing.php */
