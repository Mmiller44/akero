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

    function get_specific_product($productName)
    {
        $query = $this->db->get_where('products', array('name' => $productName));
        // echo($query->result()[0]->name);
        $product = $query->result();
        return $product;
    }

    function get_favorites($userID)
    {
        $this->db->select('name, price');
        $this->db->join('products', 'products.productID = favorites.productID');
        $query = $this->db->get_where('favorites', array('userID' => $userID));
        $favorites = $query->result();
        return $favorites;
    }

}

?>