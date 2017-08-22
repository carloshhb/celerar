<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 29/04/2017
 * Time: 20:56
 */
class Processo extends CI_Model
{
    public $proid;
    public $userId;
    public $last_view;
    public $last_update;

    private $index = "proid";
    private $tableName = "procedimentos";
    private $tableLastView = "last_view";
    private $timeNow;

    public function __construct()
    {
        parent::__construct();

        $this->timeNow = mdate('%Y-%m-%d %H:%i:%s', now('BRT'));
        $this->tempo = new DateTime($this->timeNow);
        $interval = new DateInterval("P10D");
        date_add($this->tempo, $interval);
    }


    public function View($id)
    {
        $q = $this->db
            ->get_where($this->tableName, [$this->index => $id]);

        return $q->result_array();
    }

    public function SetLastView($proid, $uid)
    {
        if(sizeof($this->GetLastView($proid, $uid)) > 0)
        {
            $this->db
                ->set(['last_view' => $this->timeNow], false)
                ->where("proid", $proid)
                ->where("userid", $uid)
                ->update($this->tableLastView);
        }
        else
        {
            $this->db
                ->insert($this->tableLastView, [
                    "proid" => $proid,
                    "userid" => $uid,
                    "last_view" => $this->timeNow
                ]);
        }
    }

    public function GetLastView($proid, $uid)
    {
        $q = $this->db
            ->select('last_view')
            ->get_where($this->tableLastView, ["proid" => $proid, "userid" => $uid])
            ->result_array();
        return (sizeof($q) > 0) ? $q[0]['last_view'] : "";
    }

    public function SetLastUpdate($id)
    {
        $this->db
            ->set(['last_update' => $this->timeNow], false)
            ->where($this->index, $id)
            ->update($this->tableName);
    }

    public function GetLastUpdate($id)
    {
        return $this->db
            ->select('last_update')
            ->get_where($this->tableName, [$this->index => $id])
            ->result_array()[0]['last_update'];
    }

    public function CheckForUpdate($proid, $uid)
    {
        //CONCEPT SIMPLES
        // Update > LastView
        $lv = strtotime($this->GetLastView($proid, $uid));
        $lu = strtotime($this->GetLastUpdate($proid));

        if($lu > $lv)
            return true;
        else
            return false;

    }

    // Aplicação e conferência do prazo de validade do advogado do reu para
    // dar continuidade ao procedimento
    public function SetTimeAdv($procid){
        if (sizeof($this->GetTimeAdv($procid)->data_advreu) == 0)
        {
            $this->db
                ->set(['data_advreu' => $this->timeNow], false)
                ->where('proid', $procid)
                ->update($this->tableName);
        }
    }

    public function GetTimeAdv($procid){
        return $this->db
            ->select('data_advreu')
            ->get_where($this->tableName, $procid)
            ->row();
    }

    public function CheckAdvTime($procid){

        $time = strtotime($this->GetTimeAdv($procid)->data_advreu);
        $tempo2 = strtotime($this->tempo);
        if ($time > $tempo2)
            return true;
        else
            return false;
    }
}
