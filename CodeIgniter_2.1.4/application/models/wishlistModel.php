<?php

class wishlistModel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }

    function addToWishList($productName)
    {
        $this->db->select('id');
        $productID = $this->db->get_where('products', array('name' => $productName))->result()[0]->id;
        $data = array('userID' => $this->session->userdata('userID'),'productID' => $productID);

        $this->db->like('id', $productID);
        $this->db->like('userID', $this->session->userdata('userID'));
        $query = $this->db->from('favorites');

        if($query->count_all_results() > 0)
        {


        }else
        {
            $this->db->insert('favorites', $data);
        }
        return true;
    }

}

?>