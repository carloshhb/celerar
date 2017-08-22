<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @name: Login model
 * @author: Imron Rosdiana
 */
class Login_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function validate_user($data) {
        $result = $this->verify_pwhashed($data['username'], $data['password']);
        if (!empty($result))
            return $result;
        else
            return false;
    }

    private function getUser($user){
        $this->db->select('username');
        $this->db->where("(email = '$user' OR username = '$user')");
        $query = $this->db->get('logins');
        return $query->row;
    }

    private function verify_pwhashed($user, $pw)
    {
        $this->db->where("(email = '$user' OR username = '$user')");
        $query = $this->db->get('logins');
        if ($query->num_rows() > 0) {
            $user_row = $query->row();
            if(password_verify($pw, $user_row->password))
                return $user_row;
        }
        return false;
    }

    function __destruct() {
        $this->db->close();
    }
}
