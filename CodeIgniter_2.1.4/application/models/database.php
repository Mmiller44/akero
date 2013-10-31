<?php

class database extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }
    
    function get_entries()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

}

?>