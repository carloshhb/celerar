<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 19/04/2017
 * Time: 10:36
 */
class Pro_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function inserir($id, $token){
        $this->db->set('token', $token);
        $this->db->where('proid', $id);
        return $this->db->update('procedimentos');
    }

    public function buscarProcessos($data, $ativ) {
        $this->db->select('pautor, preu, advautor, advreu, arb, ativo');
        $this->db->where("(ativo='$ativ' AND (pautor = '$data' OR preu = '$data' OR advautor = '$data' OR advreu = '$data' OR arb = '$data'))");
        return $this->db->get('procedimentos')->num_rows();
    }

    function GetAll($limit = null, $offset = null) {

        if($limit)
            $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function buscarPendentes($id, $user, $limit = null, $offset = null){
        $tipo = $this->getType($id);
        $tipo->adv;
        $data1 = "ativo= '0' AND pautor='$user' OR preu='$user'";
        $data2 = "ativo= '0' AND advautor='$user' OR advreu='$user'";
        switch ($tipo->adv){
            // se 0 então o usuario é uma parte
            case 0:
                $this->db->select('proid, nomeAutor, nomeReu');
                $this->db->where($data1);
                break;
            // se 1 então o usuario é advogado
            case 1:
                $this->db->select('proid, nomeAutor, nomeReu');
                $this->db->where($data2);
                break;
        }
        if($limit)
            $this->db->limit($limit, $offset);
        $info = $this->db->get('procedimentos');
        $quant = $info->num_rows();
        if ($quant > 0)
            return $info->result_array();
        else
            return null;
    }

    function buscarAtivos($userid, $username, $limit = null, $offset = null){
        $tipo = $this->getType($userid);
        $tipo->adv;
        $data1 = "(pautor='$username' OR preu='$username')";
        $data2 = "(advautor='$username' OR advreu='$username')";
        switch ($tipo->adv){
            // se 0 então o usuario é uma parte
            case 0:
                $this->db->select('proid, nomeAutor, nomeReu');
                $this->db->where('ativo', 1);
                $this->db->where($data1);
                if($limit)
                    $this->db->limit($limit, $offset);
                $info = $this->db->get('procedimentos');
                $quant = $info->num_rows();
                break;
            // se 1 então o usuario é advogado
            case 1:
                $this->db->select('proid, nomeAutor, nomeReu');
                $this->db->where('ativo', 1);
                $this->db->where($data2);
                if($limit)
                    $this->db->limit($limit, $offset);
                $info = $this->db->get('procedimentos');
                $quant = $info->num_rows();
                break;
        }

        if ($quant > 0)
            return $info->result_array();
        else
            return null;
    }

    function tipoParte($user){
        $this->db->where('pautor', $user);
        if ($this->db->get('procedimentos')->num_rows() > 0)
            return 1;
        else {
            return 2;
        }
    }

    private function getType($user){
        $this->db->select('adv');
        $this->db->where('id', $user);
        return $this->db->get('logins')->row();
    }

    function infoP($data){
        $this->db->select('pautor, preu, advautor, advreu, arb');
        $this->db->where('proid', $data);
        return $this->db->get('procedimentos')->row_array();
    }

    function infoQDocs($data){
        $this->db->select('ndocs');
        $this->db->where('proid', $data);
        return $this->db->get('procedimentos')->row();
    }

    function setQDocs($data, $id){
        $this->db->set('ndocs', $data+1);
        $this->db->where('proid', $id);
        $this->db->update('procedimentos');
    }

    function infoUser($id){
        $this->db->select('pnome, unome');
        $this->db->where('username', $id);
        return $this->db->get('logins')->row();
    }

    function nomeUser($usr){
       $this->db->select('pnome, unome');
       $this->db->where('username', $usr);
       return $this->db->get('logins')->row();
    }

    function data_entrada(){
        $datestring = '%Y-%d-%m %H:%i:%s';
        $time2 =  now('BRT');
        $date = mdate($datestring, $time2);

        return $date;
    }

    function getDE($data){
        $this->db->select('dataentrada');
        $this->db->where('proid', $data);

        return $this->db->get('procedimentos')->row();
    }

    function getUserType($processId, $user){
        $this->db->select('pautor, preu, advautor, advreu, arb');
        $this->db->where('proid', $processId);
        $query = $this->db->get('procedimentos')->row();
        $type = "";
        if (!empty($query)) {
            switch ($user) {

                case $query->pautor:
                    $type =  "Autor";
                    break;

                case $query->preu:
                    $type = "Reu";
                    break;

                case $query->advautor:
                    $type = "Autor";
                    break;

                case $query->advreu:
                    $type = "Reu";
                    break;

                case $query->arb:
                    $type = "Arb";
                    break;

            }
        }

        return $type;
    }

    function getAdvType($user, $procid){
        $condition = "(advreu='$user' AND proid='$procid')";
        $this->db->where($condition);
        $quant = $this->db->get('procedimentos')->num_rows();
        if ($quant == 1)
            return TRUE;
        else
            return FALSE;
    }

    function __destruct() {
        $this->db->close();
    }
}
