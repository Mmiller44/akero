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
        $this->db->select('productID');
        $productID = $this->db->get_where('products', array('name' => $productName))->result()[0]->productID;
        $data = array('userID' => $this->session->userdata('userID'),'productID' => $productID);
        $this->db->insert('favorites', $data);
        return true;
    }

}

?>