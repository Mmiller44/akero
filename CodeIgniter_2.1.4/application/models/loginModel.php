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
<<<<<<< HEAD
            return true;
=======
            //This is selecting the userID for the person that is logged in so that the person.
            $this->db->select('userID');
            $userID = $this->db->get_where('users', array('email' => $email));

            // Setting the userID to be a session variable.
            // $sessionData = array(
            //     'userID' => $userID
            // );

            // $this->session->set_userdata($sessionData);
            return $userID;
>>>>>>> 8f72297c2547c815a8f5b34760ae06123b39624f

        }else
        {
            return false;
        }

    }

}

?>