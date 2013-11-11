<?php

class registermodel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }
    
    function register($email,$password)
    {
        $data = array('email' => $email,'password' => $password);

        $this->db->like('email', $email);
        $this->db->from('users');

        if($this->db->count_all_results() > 0)
        {
            echo "Email already exists.";
            return false;

        }else
        {
            $this->db->insert('users', $data);
            return true;
        }

    }

}

?>