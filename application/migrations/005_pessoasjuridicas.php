<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pessoasjuridicas extends CI_Migration
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
            'nome_empresa' => [
                'type' => 'varchar',
                'constraint' => 20,
                'unique' => true,
                'null' => false
            ],
            'representante' => [
                'type' => 'varchar',
                'constraint' => 20,
                'null' => false
            ],
            'cnpj' => [
                'type' => 'int',
                'constraint' => 20,
                'null' => false
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'endereco' => [
                'type' => 'varchar',
                'constraint' => 150,
                'null' => false
            ],
            'numero_end' => [
                'type' => 'int',
                'constraint' => 5,
                'null' => false
            ],
            'cep' => [
                'type' => 'int',
                'constraint' => 8,
                'null' => false
            ],
            'estado' => [
                'type' => 'varchar',
                'constraint' => 2,
                'null' => false
            ],
            'cidade' => [
                'type' => 'varchar',
                'constraint' => 20,
                'null' => false
            ]
        ]);

        $this->dbforge->add_key('id');

        $this->dbforge->create_table("pessoasjuridicas");
    }

    public function down()
    {
        $this->db_forge->drop_table("pessoasjuridicas");
    }
}