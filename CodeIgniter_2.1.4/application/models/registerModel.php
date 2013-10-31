<?php

class registerModel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }
    
    function register($email,$password)
    {
        $data = array('email' => $email,'password' => $password);

		$this->db->insert('users', $data);
    }

}

?>