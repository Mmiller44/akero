<<<<<<< HEAD
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cartController extends CI_Controller {

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$userEmail['email'] = $this->session->userdata('email');
			$this->load->view('adminheader', $userEmail);
			$this->load->view('cartView', $products);
			$this->load->view('footer');

		}else
		{
			$this->load->model('database');
			$products['items'] = $this->database->get_entries();
			$this->load->view('header');
			$this->load->view('cartView', $products);
			$this->load->view('footer');
		}
	}
}

/* End of file products.php */
=======
<?php
class CartController extends CI_Controller {
	
	function index() {
		
		$this->load->model('products');
		
		$data['products'] = $this->products->get_all();
		
		$this->load->view('products', $data);
	}
	
	function add() {
		
		$this->load->model('products');
		
		$product = $this->products->get($this->input->post('id'));

		// set a default quantity
		$quantity = 1;

		foreach ($this->cart->contents() as $item) {

			if($item['id'] == $this->input->post('id'))
			{
				$quantity = $item['qty'] + 1;
			}

		}

		$insert = array(
			'id' => $this->input->post('id'),
			'qty' => $quantity,
			'price' => $product->price,
			'name' => $product->product
		);
		// if ($product->option_name) {
		// 	$insert['options'] = array(
		// 		$product->option_name => $product->option_values[$this->input->post($product->option_name)]
		// 	);
		// }
		
		$this->cart->insert($insert);
		$this->load->helper('url');  
		redirect('productsController');
		
	}
	
	function remove($rowid) {

		$quantity = 1;

		foreach ($this->cart->contents() as $item) {

			if($item['rowid'] == $this->input->post('rowid'))
			{
				$quantity = $item['qty'] - 1;
			}

		}
		
		
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => $quantity - 1
		));

		
		$this->load->helper('url');  
		redirect('productsController');
		
	}
	
}
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
