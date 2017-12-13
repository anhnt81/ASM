<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        // Prep the query
        $dk1 = $this->db->where('username', $username);
        $dk2 = $this->db->where('password', $password);
        // Run the query
        $query = $this->db->get('users');
        if(($dk1!=NULL) && ($dk2!=NULL )){
            $row = $query->row();
            $data = array(
                'username' => $row->username,
                'password' => $row->password,
                'validated' => true
            );
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
//        // Let's check if there are any results
//        if($query->num_rows > 0)
//        {
//            // If there is a user, then create session data
//            $row = $query->row();
//            $data = array(
//                'username' => $row->username,
//                'password' => $row->password,
//                'validated' => true
//            );
//            $this->session->set_userdata($data);
//            return true;
//        }
//        // If the previous process did not validate
//        // then return false.
//        return false;
    }
}
?>