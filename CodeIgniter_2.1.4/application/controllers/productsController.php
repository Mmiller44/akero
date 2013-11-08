<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductsController extends CI_Controller {

<<<<<<< HEAD
	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('purchase', $products);
			$this->load->view('footer');

		}else
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$this->load->view('header');
			$this->load->view('purchase', $products);
			$this->load->view('footer');
		}
=======
	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	*/

	public function index()
	{
		$this->load->model('database');
		$products['items'] = $this->database->get_entries();
		$this->load->helper('form');
		$this->load->view('productsView', $products);
>>>>>>> d3450c4d184a0879d3ac6606201b8e2bdae1c05d
	}
}

/* End of file products.php */
