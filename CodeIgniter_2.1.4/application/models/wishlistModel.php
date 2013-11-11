<?php

class wishlistmodel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }

    function addToWishList($productName)
    {
        $this->db->select('id');
        $query = $this->db->get_where('products', array('name' => $productName));
        $result = $query -> result();

        $productID = $result[0]->id;

        $data = array('userID' => $this->session->userdata('userID'),'productID' => $productID);

        $query = $this->db->get_where('favorites', array('productID' => $productID, 'userID' => $this->session->userdata('userID')));

        if(count($query -> result()) > 0)
        {
            return false;
        }else
        {
            $this->db->insert('favorites', $data);
            return true;
        }
        
    }

    function removeFromWishlist($productName)
    {
        $this->db->select('id');
        $result = $this->db->get_where('products', array('name' => $productName));
        $product = $result->result();
        $productID = $product[0]->id;

        $data = array('userID' => $this->session->userdata('userID'),'productID' => $productID);

        $this->db->like('id', $productID);
        $this->db->like('userID', $this->session->userdata('userID'));
        $query = $this->db->from('favorites');

        if($query->count_all_results() > 0)
        {
            $this->db->delete('favorites', $data);
            return true;

        }else
        {
            return false;
        }
        
    }

}

?>