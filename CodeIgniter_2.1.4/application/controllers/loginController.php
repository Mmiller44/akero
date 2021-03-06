<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logincontroller extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('login_password', 'Password', 'required|md5');
		$this->form_validation->set_rules('login_email', 'Email', 'required|valid_email');

		$email = $_POST['login_email'];
		$password = md5($_POST['login_password']);

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
			$this->load->model('loginModel');

			if($this->loginModel->login($email,$password))
			{
				$user_result = $this->loginModel->login($email,$password)->result();
				$user_id = $user_result[0]->userID;
				
				$sessionData = array(
                   		'email'     => $email,
                  		'logged_in' => True,
                   		'reviews'   => 'True',
                   		'userID'	=> $user_id
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
