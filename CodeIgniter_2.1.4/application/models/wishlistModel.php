<?php

class wishlistModel extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
    }

<<<<<<< HEAD
    function addWishlist($productInfo)
    {

        

=======
    function addToWishList($productName)
    {
        $this->db->select('productID');
        $productID = $this->db->get_where('products', array('name' => $productName))->result()[0]->productID;
        $data = array('userID' => $this->session->userdata('userID'),'productID' => $productID);
        $this->db->insert('favorites', $data);
        return true;
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f
    }

}

?>