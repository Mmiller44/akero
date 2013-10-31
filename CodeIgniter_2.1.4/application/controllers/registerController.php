<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registerController extends CI_Controller {

	public function index()
	{

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$passConfirm = md5($_POST['passconf']);

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$this->load->model('registerModel');
			$this->registerModel->register($email,$password);
			$this->load->view('landing');
		}
	}
}

/* End of file registerController.php */
