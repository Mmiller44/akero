<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FavoritesController extends CI_Controller {

	public function index()
	{
		//$this->load->model('database');
		//$products['items'] = $this->database->get_entries();
		$this->load->view('favorites');
	}
}