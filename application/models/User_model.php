<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 16/04/2017
 * Time: 15:53
 */
class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //insert into user table
    public function insertUser($data)
    {
        if($data['adv'] == 0)
          $this->cruzarTabelasPartes($data['email'], $data['username']);
        return $this->db->insert('logins', $data);
    }

    //cruzar tabelas para pegar os emails das partes e comparar com os logins criados
    //se o login criado for igual ao email da parte, cadastrar ela no procedimento com o nome de usuario
    //fazer cadastro automatico nos procedimentos que ja existem e
    // mostrar os procedimentos no processo;

    private function cruzarTabelasPartes($email, $user){

      // selecionar o email que está sendo cadastrado e comparar com
      // as tabelas de pessoas fisicas e jurídicas ja cadastradas como partes
      // de processos antes de ser criado o usuário
      $this->db->select('email');
      $this->db->where('email', $email);
      $query = $this->db->get('pessoasfisicas')->result_array();
      if (!empty($query)){
        $dados = array(
            'pautor' => $user
        );
        foreach ($query as $key => $value){
          if($value){
            foreach ($value as $k => $v){
              if ($v):
              $this->db->where('emailAutor', $v);
              $this->db->update('procedimentos', $dados);
            endif;
            }
          }
        }
      }
      else{
        $this->db->select('email');
        $this->db->where('email', $email);
        $querypj = $this->db->get('pessoasjuridicas')->result_array();
        if(!empty($querypj))
          $dados = array(
            'pautor' => $user
          );
          foreach ($query as $key => $value){
            $this->db->where('emailAutor', $value);
            $this->db->update('procedimentos', $dados);
          }
      }

      $this->db->select('email');
      $this->db->where('email', $email);
      $query2 = $this->db->get('pessoasfisicas')->result_array();

      if(!empty($query2)){
        $dados = array(
            'preu' => $user
        );
        foreach ($query as $key => $value){
          if($value){
            foreach ($value as $k => $v){
              if ($v):
              $this->db->where('emailReu', $v);
              $this->db->update('procedimentos', $dados);
            endif;
            }
          }
        }
      }
      else {
        $this->db->select('email');
        $this->db->where('email', $email);
        $querypj = $this->db->get('pessoasjuridicas')->result_array();
        if(!empty($querypj))
          $dados = array(
            'preu' => $user
          );
          foreach ($query as $key => $value){
            $this->db->where('emailReu', $value);
            $this->db->update('procedimentos', $dados);
          }

      }
    }

    function updateUser($data, $id){
        $this->db->where('id', $id);
        return $this->db->update('logins', $data);
    }

    function updateUserFP($data, $code){
        $this->db->where('forgot_password', $code);
        return $this->db->update('logins', $data);
    }

    function getUserFP($email){
        $this->db->where('email', $email);
        if ($this->db->count_all_results('logins') == 1)
            return true;
        else
            return false;
    }

    function FPCode($user ,$code){
        $this->db->where('email', $user);
        $code["forgot_time"] = $this->timeObject->format("Y-m-d H:i:s");
        return $this->db->update('logins', $code);
    }

    function code_match_fp($code){
        $r = $this->db->select('forgot_time')->get_where("logins", ['forgot_password' => $code]);

        if ($r->num_rows() == 1)
        {
            //Existe
            $time = strtotime($r->result_array()[0]['forgot_time']);

            if($time > strtotime($this->timeNow))
                return true;
            else
                return false;
        }
        else
            return false;
    }

    // Verificação de CPF para adicionar usuários ou partes!!

    function verificarCPF($str){
        if (!empty($str)){
            if ($str[0] == $str[1] && $str[1]==$str[2] && $str[2] == $str[3]
                && $str[3] == $str[4] && $str[4]==$str[5] && $str[5] == $str[6] &&
                $str[6]==$str[7] && $str[7]==$str[8] && $str[8]==$str[9] &&
                $str[9]==$str[10]){
                return false;
            }
            else
                return true;
        }
        else
            return false;
    }

    function limparMask($str){
        $replace = array(".", "-", " ");
        $replace1 = str_replace($replace, '', $str);
        return $replace1;
    }

    function validarToken($token, $user){
        $this->db->select('proid');
        $this->db->where('token', $token);
        $resultado = $this->db->get('procedimentos')->row();
        if($resultado != NULL) {
            $this->db->set('advreu', $user);
            $this->db->where('proid', $resultado->proid);
            $this->db->update('procedimentos');
            return TRUE;
        }
        else
            return FALSE;
    }
}
