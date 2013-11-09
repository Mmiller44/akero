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
        $product = $query->result();
        return $product;
    }

    function get_product_by_id($id)
    {
        $query = $this->db->get_where('products', array('id' => $id));
        $product = $query->result()[0];

       

        return $product;

    }

    function get_favorites($userID)
    {
        $this->db->select('name, price, favorites.productID');
        $this->db->join('products', 'products.id = favorites.productID');
        $query = $this->db->get_where('favorites', array('userID' => $userID));
        $favorites = $query->result();
        return $favorites;
    }

     function get_product_for_wishlist($id)
    {
        $query = $this->db->get_where('products', array('productID' =>$id));

        $product = $query->result();

        var_dump($product);
        exit;

        return $product;
        //var_dump($product);
    }
    
    function get_reviews($productID)
    {
        $this->db->join('users', 'users.userID = reviews.userID');
        $query = $this->db->get_where('reviews', array('productID' => $productID));
        return $query->result();
    }

}

?>