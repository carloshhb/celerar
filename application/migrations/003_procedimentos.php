<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Procedimentos extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'auto_increment' => TRUE,
                'unsigned' => TRUE,
                'null' => false
            ],
            'proid' => [
                'type' => 'varchar',
                'constraint' => 255,
                'unique' => true,
                'null' => false
            ],
            'pacordo' => [
                'type' => 'int',
                'constraint' => 1,
                'null' => false
            ],
            'pautor' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'preu' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'advautor' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'advreu' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'arb' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'emailAutor' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'emailReu' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'dataentrada' => [
                'type' => 'datetime',
                'null' => false
            ],
            'last_update' => [
                'type' => 'datetime',
                'default' => '0000-00-00 00:00:00',
                'null' => false
            ],
            'last_doc' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'nomeAutor' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'nomeReu' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'data_advreu' => [
                'type' => 'datetime',
                'constraint' => '0000-00-00 00:00:00',
                'null' => false
            ],
            'token' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'ativo' => [
                'type' => 'int',
                'constraint' => 1,
                'null' => false
            ],
        ]);

        $this->dbforge->add_key('id');

        $this->dbforge->create_table("procedimentos");
    }

    public function down()
    {
        $this->db_forge->drop_table("procedimentos");
    }
}