<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cartController extends CI_Controller {

	public function index()
	{
		//$data['products'] = $this->products->get_all();

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

	function add() {
		$counter = $this->session->userdata('cartItems');
		$sessionData = array(
                   	'cartItems' => $counter + 1,
             );

        $this->load->model('database');
        
        $product = $this->database->get_product_by_id($this->input->post('id'));

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
            'name' => $product->name
        );
       
        $this->cart->insert($insert);
        // $this->load->helper('url');  
        // redirect('detailsController/details/<?=$this->session->userdata("productName")
        $products['items'] = $this->database->get_specific_product($product->name);
		$userEmail['email'] = $this->session->userdata('email');
		$this->load->view('adminheader', $userEmail);
		$this->load->view('product-details', $products);
		$this->load->view('footer');
        
    }

    function remove($rowid) {

		$cart = $this->cart->contents();

		$qty = $cart[$rowid]['qty'] - 1;

        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => $qty
        ));

        if($qty >= 0){
        	$qty = 0;
        }
        
        // $this->load->helper('url');  
        // redirect('product-details');
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

    function update($rowid) {

		$cart = $this->cart->contents();

		$qty = $cart[$rowid]['qty'] + 1;

        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => $qty
        ));

        // if($qty >= 0){
        // 	$qty = 0;
        // }
        
        // $this->load->helper('url');  
        // redirect('product-details');
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

    function addtoCart($product_id) {
		$counter = $this->session->userdata('cartItems');
		$sessionData = array(
                   	'cartItems' => $counter + 1,
             );

        $this->load->model('database');
        
        $product = $this->database->get_favorites($this->input->post('userID'));
       	$products = $this->database->get_product_for_wishlist($product_id);

       // set a default quantity
        $quantity = 1;

        foreach ($this->cart->contents() as $item) {

            if($item['id'] == $this->input->post('id'))
            {
                $quantity = $item['qty'] + 1;
            }

        }

        var_dump($product);
        exit;

        var_dump($products);
        exit;

        $insert = array(
            'id' => $this->input->post('productID'),
            'qty' => $quantity,
            'price' => $products->price,
            'name' => $products->name
        );
       
        $this->cart->insert($insert);
     
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

/* End of file products.php */
