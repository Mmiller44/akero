<?php

class loginModel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }
    
    function login($email,$password)
    {
        $data = array('email' => $email,'password' => $password);

        $this->db->like('email', $email);
        $this->db->from('users');

        if($this->db->count_all_results() > 0)
        {
            return true;

        }else
        {
            return false;
        }

    }

}

?>