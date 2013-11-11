<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class postReviewController extends CI_Controller {

	public function index($reviewText)
	{
		$this->load->model('database');
		$this->database->post_review($reviewText)
	}
}