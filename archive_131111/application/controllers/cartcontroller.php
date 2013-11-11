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

		// $counter = $this->session->userdata('cartItems');
		$sessionData = array(
               	'cartItems' => $this->session->userdata('cartItems') + 1,
         );

        $this->load->model('database');
        $this->session->set_userdata($sessionData);
        $id = $this->input->post('id');
        
        $product = $this->database->get_product_by_id($id);

       // set a default quantity
        $quantity = 1;

        foreach ($this->cart->contents() as $item) {

            if($item['id'] == $this->input->post('id') .$this->input->post('size'))
            {
                $quantity = $item['qty'] + 1;
            }

        }

        $postID = $this->input->post('id');
        $postSize = $this->input->post('size');
        $finalID = $postID.$postSize;

        $productPrice = $product[0]->price;
        $name = $product[0]->name;
        $size = $this->input->post('size');

        $insert = array(
            'id' => $finalID,
            'qty' => $quantity,
            'price' => $productPrice,
            'name' => $name,
            'size' => $size
        );
       
        $this->cart->insert($insert);
        
        if($this->session->userdata('logged_in'))
        {
           $data['items'] = $this->database->get_specific_product($product[0]->name);
             $userEmail['email'] = $this->session->userdata('email');
             $data['reviews'] = $this->database->get_reviews($this->session->userdata('productID'));
             $this->load->view('adminheader', $userEmail);
             $this->load->view('product-details', $data);
             $this->load->view('footer');

        }else
        {
           $data['items'] = $this->database->get_specific_product($product[0]->name);
             $userEmail['email'] = $this->session->userdata('email');
             $data['reviews'] = $this->database->get_reviews($this->session->userdata('productID'));
             $this->load->view('header', $userEmail);
             $this->load->view('product-details', $data);
             $this->load->view('footer');
        }
        
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
}

/* End of file products.php */
