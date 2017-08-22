<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Logins extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE,
                'unique' => TRUE
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE,
                'unique' => TRUE
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'forgot_password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => TRUE
            ],
            'forgot_time' => [
                'type' => 'datetime',
                'null' => TRUE
            ],
            'pnome' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'unome' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'cpf' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'adv' => [
                'type' => 'int',
                'constraint' => 1,
                'null' => FALSE
            ],
            'noab' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE
            ],
            'seccional' => [
                'type' => 'varchar',
                'constraint' => 2,
                'null' => FALSE
            ]
        ]);

        $this->dbforge->add_key("id");

        $this->dbforge->create_table('logins');
    }

    public function down()
    {
        $this->dbforge->drop_table('logins');
    }
}