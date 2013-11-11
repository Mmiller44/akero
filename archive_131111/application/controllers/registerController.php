<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registerController extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('register_password', 'Password', 'required|matches[register_re_password]|md5');
		$this->form_validation->set_rules('register_re_password', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('register_email', 'Email', 'required|valid_email');

		$email = $_POST['register_email'];
		$password = md5($_POST['register_password']);
		$passConfirm = md5($_POST['register_re_password']);

		if($this->form_validation->run() == FALSE)
		{	
			echo "False";
			$this->load->view('header');
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$this->load->view('landingView', $products);
			$this->load->view('footer');

		}else
		{
			$this->load->model('registerModel');

			if($this->registerModel->register($email,$password))
			{
				$sessionData = array(
                   		'email'     => $email,
                  		'logged_in' => True,
                   		'reviews'   => 'True'
               );

				$this->session->set_userdata($sessionData);

				$userEmail['email'] = $email;
				// Admin landing view will go here.
				$this->load->model('database');
				$products['items'] = $this->database->get_entries();
				$this->load->view('adminheader', $userEmail);
				$this->load->view('landingView', $products);				
				$this->load->view('footer');

			}else
			{
				// Stay on form page to show them email is already in the database.
				$this->load->view('header');
				$this->load->model('database');
				$products['items'] = $this->database->get_entries();
				$this->load->view('landingView', $products);
				$this->load->view('footer');
			}
		}
	}
}

/* End of file registerController.php */
