<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pessoasfisicas extends CI_Migration
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
            'nome' => [
                'type' => 'varchar',
                'constraint' => 20,
                'unique' => true,
                'null' => false
            ],
            'sobrenome' => [
                'type' => 'varchar',
                'constraint' => 20,
                'null' => false
            ],
            'cpf' => [
                'type' => 'int',
                'constraint' => 11,
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
            ],
            'telefone' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ]
        ]);

        $this->dbforge->add_key('id');

        $this->dbforge->create_table("pessoasfisicas");
    }

    public function down()
    {
        $this->db_forge->drop_table("pessoasfisicas");
    }
}