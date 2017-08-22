<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19/04/2017
 * Time: 10:05
 */
class Pro_database extends CI_Model
{
    public function verificar_procuser($data){
        $condition = "'" . $data['username'] . "'" . "= pautor";
        $this->db->select('*');
        $this->db->from('logins');
        $this->db->join('procedimentos', $condition);
        $query = $this->db->get();
        if ($query->num_rows() == 0)
            return true;
        else return false;
    }
}